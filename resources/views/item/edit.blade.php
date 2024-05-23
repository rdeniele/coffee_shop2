<form method="POST" action="{{ route('items.update', ['id' => $items->id]) }}">
    @csrf
    @method('PUT')

    {{-- item name --}}
    <div class="form-group">
        <label for="ItemName">Item Name</label>
        <input type="text" class="form-control" id="ItemName" name="ItemName" value="{{$items->item_name}}" placeholder= "Enter item name" >
      </div>
      
      {{-- item description --}}
    <div class="form-group">
      <label for="ItemDescription">Item Description</label>
      <input type="text" class="form-control" id="ItemDescription" name="ItemDescription" value="{{$items->item_description}}" placeholder= "Enter item description" >
    </div>
    
      {{-- Item amount --}}
      <div class="form-group">
        <label for="ItemAmount">Item Quantity/Servings</label>
        <input type="number" class="form-control" id="ItemAmount" name="ItemAmount" value="{{$items->item_amount}}" placeholder="Enter Item Servings/Quantity">
      </div>
      
      {{-- item price --}}
      <div class="form-group">
        <label for="ItemPrice">Item Price</label>
        <input type="number" class="form-control" id="ItemPrice" name="ItemPrice" value="{{$items->item_price}}" placeholder="Enter item price" step="0.01">
    </div>      
      
      <button type="submit" class="btn btn-primary">Update</button>
    </form>