<form method="POST" action="/addons">
    @csrf

    {{-- add-on name --}}
    <div class="form-group">
        <label for="AddOnName">Item Name</label>
        <input type="text" class="form-control" id="AddOnName" name="AddOnName" placeholder= "Enter Add-On name" required >
      </div>
      
      {{-- item price --}}
      <div class="form-group">
        <label for="AddOnPrice">Item Price</label>
        <input type="number" class="form-control" id="AddOnPrice" name="AddOnPrice" placeholder="Enter Add-On price" step="0.01" required>
    </div>    
    
      <button type="submit" class="btn btn-primary">Create Item</button>
    </form>

    
    {{-- table --}}
  <table class="table">  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Add-On Name</th>
        <th scope="col">Add-On Price</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    @if (count($addons) > 0)
        @foreach ($addons as $add_on)
            <tr>
                <th>{{ $add_on->id }}</th>
                <th>{{ $add_on->add_on_name }}</th>
                <th>{{ $add_on->add_on_price }}</th>
                <th>{{ $add_on->created_at }}</th>
                <th>{{ $add_on->updated_at }}</th>
               
                <th>
                    <a href="{{ route('addons.edit', ['id' => $add_on->id]) }}">Edit</a>
                    <a href="/delete-addons/{{ $add_on->id }}">Delete</a>  </th>
            </tr>
        @endforeach
    @else
        <tr>
            <th>No Data</th>
        </tr>
    @endif
</tbody>
</table>