@include('struktur.navbar')

<style>
    img {
        width: 150px;
        height: 170px;
        margin-bottom: 20px;
    }
    @media only screen and (max-width: 770px) {
        img {
            width: 150px;
            height: 200px;
            margin-bottom: 20px;
        }
    }
    table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
        background-color: white; /* Set background color for the entire table */
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        background-color: white; /* Set background color for each cell */
    }
    th {
        background-color: #f2f2f2; /* Set a different background for the header */
    }
    .cart-icon {
        position: relative;
        display: inline-block;
    }
    .cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        height: 10px;
        width: 10px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
    }
</style>

<div class="container">
    <h2>My Cart</h2>
    
    <!-- Form untuk mengupdate kuantitas -->
    <form action="{{ route('updatecart') }}" method="POST">
        @csrf
        
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>
                        <img src="{{ asset('image/' . $item->post->thumbnail) }}" alt="{{ $item->post->nama }}">
                        <p>{{ $item->post->nama }}</p>
                    </td>
                    <td>
                        <input type="hidden" name="cart_id[]" value="{{ $item->id }}">
                        <input type="number" name="kuantitas[]" value="{{ $item->kuantitas }}" min="1">
                    </td>
                    <td>{{ $item->post->price }}</td>
                    <td>{{ $item->post->price * $item->kuantitas }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Kuantitas</button>
    </form>

    <!-- Form untuk checkout -->
    <form action="{{ route('checkout') }}" method="GET" style="margin-top: 20px;">
        <button type="submit" class="btn btn-success">Checkout Now!</button>
    </form>

    <!-- Order History Table -->
    <h2 class="py-4" style="margin-top: 50px">Order History</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Order Code</th>
                <th>Status</th>
                <th>Total</th>
                <th>Payment Method</th>
                <th>Payment Proof</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_code }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->total_harga }}</td>
                <td>{{ $order->metode_pembayaran }}</td>
                <td>
                    @if ($order->bukti_pembayaran)
                        <a href="{{ asset('bukti_pembayaran/' . $order->bukti_pembayaran) }}" target="_blank">View</a>
                    @else
                        Not available
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
