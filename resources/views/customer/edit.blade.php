<form method="POST" action="{{ route('customer.update', ['id' => $customer->id]) }}">
  @csrf
  @method('PUT')

  {{-- customer name --}}
    <div class="form-group">
      <label for="customer_name">Customer Name</label>
      <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{$customer->customer_name}}" placeholder= "Enter customer name" required>
    </div>
  
    {{-- email --}}
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" value="{{$customer->email}}" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">
    </div>
    
    {{-- phone number --}}
    <div class="form-group">
      <label for="phone_number">Phone Number</label>
      <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{$customer->phone_number}}" placeholder="Enter your phone number" required pattern="[+0-9\s\-\(\)]*" title="Please enter a valid phone number.">
    </div>    
  

    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>