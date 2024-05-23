<form method="POST" action="{{ route('addons.update', ['id' => $addons->id]) }}">
    @csrf
    @method('PUT')

    {{-- add-on name --}}
    <div class="form-group">
        <label for="AddOnName">Item Name</label>
        <input type="text" class="form-control" id="AddOnName" name="AddOnName" placeholder= "Enter Add-On name"  value="{{$addons->add_on_name}}">
      </div>
      
      {{-- item price --}}
      <div class="form-group">
        <label for="AddOnPrice">Item Price</label>
        <input type="number" class="form-control" id="AddOnPrice" name="AddOnPrice" placeholder="Enter Add-On price" step="0.01" value="{{$addons->add_on_price}}">
    </div>    
    
      <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
