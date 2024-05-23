

@foreach($orders as $order)
    {{ $order->id }}
    {{ $order->order_date }}
    {{ $order->customerTable->customer_name }}
@endforeach

