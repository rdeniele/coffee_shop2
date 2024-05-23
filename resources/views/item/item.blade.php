<form method="POST" action="/items">
    @csrf

    {{-- Item name --}}
    <div class="form-group">
        <label for="ItemName">Item Name</label>
        <input type="text" class="form-control" id="ItemName" name="ItemName" placeholder= "Enter item name" >
      </div>

      {{-- Item description --}}
      <div class="form-group">
        <label for="ItemDescription">Item Description</label>
        <input type="text" class="form-control" id="ItemDescription" name="ItemDescription" placeholder= "Enter item description" >
      </div>
    
      {{-- Item amount --}}
      <div class="form-group">
        <label for="ItemAmount">Item Quantity/Servings</label>
        <input type="number" class="form-control" id="ItemAmount" name="ItemAmount" placeholder="Enter Item Servings/Quantity">
      </div>
      
      {{-- item price --}}
      <div class="form-group">
        <label for="ItemPrice">Item Price</label>
        <input type="number" class="form-control" id="ItemPrice" name="ItemPrice" placeholder="Enter item price" step="0.01">
    </div>    
    
      <button type="submit" class="btn btn-primary">Create Item</button>
    </form>

    {{-- table --}}
  <table class="table">  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Item Name</th>
        <th scope="col">Item Description</th>
        <th scope="col">Item Amount</th>    
        <th scope="col">Item Price</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    @if (count($items) > 0)
        @foreach ($items as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->item_name }}</th>
                <th>{{ $item->item_description }}</th>
                <th>{{ $item->item_amount }}</th>
                <th>{{ $item->item_price }}</th>
                <th>{{ $item->created_at }}</th>
                <th>{{ $item->updated_at }}</th>
               
                <th>
                    <a href="{{ route('items.edit', ['id' => $item->id]) }}">Edit</a>
                    <a href="/delete-items/{{ $item->id }}">Delete</a>  </th>
            </tr>
        @endforeach
    @else
        <tr>
            <th>No Data</th>
        </tr>
    @endif
</tbody>
</table>