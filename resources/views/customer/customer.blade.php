<form method="POST" action="/customer">
    @csrf
  
    {{-- customer name --}}
    <div class="form-group">
      <label for="customer_name">Customer Name</label>
      <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder= "Enter customer name" required>
    </div>
  
    {{-- email --}}
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">
    </div>
    
    {{-- phone number --}}
    <div class="form-group">
      <label for="phone_number">Phone Number</label>
      <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number" required pattern="[+0-9\s\-\(\)]*" title="Please enter a valid phone number.">
    </div>    
  
    <button type="submit" class="btn btn-primary">Create Customer</button>
  </form>

{{-- table --}}
  <table class="table">  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    @if (count($customer) > 0)
        @foreach ($customer as $customer)
            <tr>
                <th>{{ $customer->id }}</th>
                <th>{{ $customer->customer_name }}</th>
                <th>{{ $customer->email }}</th>
                <th>{{ $customer->phone_number }}</th>
                <th>{{ $customer->created_at }}</th>
                <th>{{ $customer->updated_at }}</th>
               
                <th>
                    <a href="{{ route('customer.edit', ['id' => $customer->id]) }}">Edit</a>
                    <a href="/delete-customers/{{ $customer->id }}">Delete</a>  </th>
            </tr>
        @endforeach
    @else
        <tr>
            <th>No Data</th>
        </tr>
    @endif
</tbody>
</table>