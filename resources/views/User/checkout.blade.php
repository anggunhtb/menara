@include('struktur.navbar')

<div class="container">
    <h2>Payment</h2>
    <form action="{{ route('processPayment') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="total_harga">Total Price:</label>
            <input type="text" id="total_harga" name="total_harga" class="form-control" value="{{ $totalHarga }}" readonly>
        </div>
        <div class="form-group">
            <label for="metode_pembayaran">Payment Method:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" class="form-control">
                <option value="bank_transfer">Bank Transfer</option>
                <option value="E-Wallet DANA">E-Wallet DANA</option>
                <option value="SeaBank">SeaBank</option>
                <!-- Pilih lainnya -->
            </select>
        </div>
        <div class="form-group">
            <label for="bukti_pembayaran">Upload Your Payment Bill:</label>
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Submit Payment</button>
    </form>
</div>
