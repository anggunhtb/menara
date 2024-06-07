@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment for Order {{ $order->order_code }}</h2>
    <form action="{{ route('payment.process', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="metode_pembayaran">Payment Method</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Credit Card">Credit Card</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bukti_pembayaran">Upload Payment Proof</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
</div>
@endsection
