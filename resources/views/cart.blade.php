@extends('master')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Shopping Cart</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $product )
                <tr>
                    <td><img src="{{asset('uploads/products/'.$product->img)}}" alt="Product" width="100"></td>
                    <td>{{ $product->name}}</td>
                    <td>{{ $product->price}}</td>
                    <td><input type="number" class="form-control quantity" value="1" min="1" onchange="updateTotal(this)"></td>
                    <td class="total-price">₹{{ $product->price}}</td>
                    <td><a href="{{ route('deletecart',$product->id) }}" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="text-end">
            <h4>Total: <span id="cart-total"></span></h4>
            <button class="btn btn-success">Proceed to Checkout</button>
        </div>
    </div>
    <script>
        function updateTotal(element) {
            let row = element.closest('tr');
            let price = parseFloat(row.cells[2].innerText.replace('₹', ''));
            let quantity = parseInt(element.value);
            let total = price * quantity;
            row.cells[4].innerText = `₹${total}`;
            updateCartTotal();
        }

        function removeItem(button) {
            button.closest('tr').remove();
            updateCartTotal();
        }

        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('.total-price').forEach(cell => {
                total += parseFloat(cell.innerText.replace('₹', ''));
            });
            document.getElementById('cart-total').innerText = `₹${total}`;
        }
        updateCartTotal();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   @endsection