<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\tbl_item_list; 
use App\Models\tbl_add_ons;
use App\Models\tbl_order_items;
use App\Models\tbl_orders;
use App\Models\tbl_order_details;
use App\Models\tbl_payment_details;


class ProductsController extends Controller
{
    public function index()
    {
        $products = tbl_item_list::all();
        return view('products', compact('products'));
    }
 
    public function cart()
    {
        return view('cart');
    }
    
    public function getProductInfo(Request $request)
    {
        $product = tbl_item_list::find($request->id);
        $addons = tbl_add_ons::all();
        return view('products-read-more', compact(['product', 'addons']));
    }

    public function addToCart($id, Request $request)
{
    $product = tbl_item_list::findOrFail($id);
    $cart = session()->get('cart', []);

    // Generate a unique cart key for the product including its addons
    $cartKey = $id;
    $addonIds = $request->addon_ids ?? [];

    if (!empty($addonIds)) {
        sort($addonIds);
        $cartKey .= '-' . implode('-', $addonIds);
    }

    // Check if the item with the same addons is already in the cart
    if (isset($cart[$cartKey])) {
        // If so, increase the quantity
        $cart[$cartKey]['quantity']++;
    } else {
       // If not, add a new item to the cart
        $cart[$cartKey] = [
            "id" => $id, // Use product ID as cart item ID
            "item_name" => $product->item_name,
            "item_price" => $product->item_price,
            "quantity" => $request->input('quantity', 1), 
            "addons" => $addonIds, // Store addon IDs as an array
        ];

    }

    // Update the cart in the session
    session()->put('cart', $cart);
    
    // Redirect back with success message
    return redirect()->back()->with('success', 'Product added to cart successfully!');
}



public function checkout(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart')->with('success', 'No items in cart!');
    }

    // Create a new order
    $currentOrder = tbl_orders::create([
        'customer_id' => 1, 
        'status' => 'pending',
        'order_date' => now(), 
    ]);

    // Get the ID of the newly created order
    $orderId = $currentOrder->id;

    // Iterate over items in the cart and store them as checkouts
    foreach ($cart as $id => $item) {
        // Get the product ID and quantity from the cart item
        $productId = $item['id'];
        $quantity = $item['quantity']; // Use the quantity from the cart

        // Create a new checkout record for the product
        if (tbl_item_list::where('id', $productId)->exists()) {
            $checkout = new tbl_order_items();
            $checkout->order_id = $orderId;
            $checkout->item_list_id = $productId;
            $checkout->quantity = $quantity;

            // Add addons if available
            if (isset($item['addons'])) {
                $checkout->add_on_ids = implode(',', $item['addons']);
            }

            $checkout->save();

            // Calculate subtotal for this item
            $itemPrice = $item['item_price'];
            $addonsTotal = 0;
            if (isset($item['addons'])) {
                foreach ($item['addons'] as $addonId) {
                    $addon = tbl_add_ons::find($addonId);
                    if ($addon) {
                        $addonsTotal += $addon->add_on_price;
                    }
                }
            }
            $subtotal = ($itemPrice + $addonsTotal)* $quantity;

            // Store subtotal and payment details in tbl_order_details
            $orderDetail = new tbl_order_details();
            $orderDetail->order_items_id = $checkout->id; // Use the primary key of tbl_order_items
            $orderDetail->price = $subtotal;
            $orderDetail->save();

            $paymentDetail = new tbl_payment_details();
            $paymentDetail->order_details_id = $checkout->id;
            $paymentDetail->payment_option = $request->input('payment_option');
            $paymentDetail->payment_amount = $request->input('payment_amount');
            $paymentDetail->total = $request->input('total_amount');
            $paymentDetail->save();
        }
    }

    // Clear the cart after storing items in the database
    session()->forget('cart');

    // Redirect to the checkout page with a success message
    return view('checkout', compact('cart'))->with('success', 'Your order has been placed successfully!'); 
}

public function updateCart(Request $request)
{
    try {
        $cart = session()->get('cart', []);
        $cartItemId = $request->id;
        $quantity = $request->quantity;

        // Update quantity in the session cart
        if (isset($cart[$cartItemId])) {
            $cart[$cartItemId]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        // Return a JSON response indicating success
        return response()->json(['success' => 'Quantity updated successfully']);
    } catch (\Exception $e) {
        // Log error message
        Log::error('Error updating cart item quantity:', ['error' => $e->getMessage()]);

        // Return a JSON response indicating failure
        return response()->json(['error' => 'An error occurred while updating cart item quantity'], 500);
    }
}

public function remove(Request $request)
{
    try {
        if ($request->filled('id')) {
            $cart = session()->get('cart', []);

            // Check if the item exists in the cart
            if (isset($cart[$request->id])) {
                // Remove the item from the cart
                unset($cart[$request->id]);

                // Update the session cart
                session()->put('cart', $cart);

                // Return a success message
                return response()->json(['success' => 'Product successfully removed from the cart.']);
            }
        }

        // Return an error response if the item ID is missing or the item doesn't exist in the cart
        return response()->json(['error' => 'Failed to remove product from cart.']);
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error removing product from cart: ' . $e->getMessage());

        // Return an error response
        return response()->json(['error' => 'An error occurred while removing product from cart.'], 500);
    }
}

}
