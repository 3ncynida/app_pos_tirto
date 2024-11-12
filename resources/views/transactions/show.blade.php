@extends('layout.main')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="content-header mb-4">
            <h1 class="m-0">Detail Transaksi</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Card Container -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Transaksi #{{ $transaction->transaction_id }}</h3>
                    </div>
                    <div class="card-body">
                        <!-- Status Transaksi -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Status Transaksi</h5>
                                <p class="card-text">{{ $transaction->status }}</p>

                                <h5 class="card-title">Tanggal Pembayaran</h5>
                                <p class="card-text">{{ \Carbon\Carbon::parse($transaction->payment->payment_date)->format('d M Y H:i:s') }}</p>
                            </div>
                        </div>

                        <!-- Informasi Customer -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Customer</h5>
                                <p class="card-text">{{ $transaction->customer->customer_name ?? 'Guest' }}</p>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Metode Pembayaran</h5>
                                <p class="card-text">{{ $transaction->payment->payment_method }}</p>
                            </div>
                        </div>

                        <!-- Diskon -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Diskon</h5>
                                <p class="card-text">Rp. {{ number_format($transaction->discount, 2) }}</p>
                            </div>
                        </div>

                        <!-- Total Harga -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Harga</h5>
                                <p class="card-text">Rp. {{ number_format($transaction->total_amount, 2) }}</p>
                            </div>
                        </div>

                        <!-- Daftar Produk -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Produk yang Dibeli</h5>
                                <ul class="list-group">
                                    @foreach ($transaction->details as $detail)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $detail->product->product_name }}</strong><br>
                                                Harga Satuan: Rp. {{ number_format($detail->product->price, 2) }}<br>
                                                Jumlah: {{ $detail->quantity }}
                                            </div>
                                            <div class="product-img">
                                                @if($detail->product->photo)
                                                    <img src="{{ asset('storage/' . $detail->product->photo) }}" alt="{{$detail->product->product_name}}" class="img-thumbnail" style="max-width: 80px;">
                                                @else
                                                    <img src="https://via.placeholder.com/80" alt="No Image" class="img-thumbnail">
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Pembayaran -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Pembayaran</h5>
                                <p class="card-text">Rp. {{ number_format($transaction->payment->amount, 2) }}</p>
                            </div>
                        </div>

                        <!-- Kembalian -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Kembalian</h5>
                                <p class="card-text">Rp. {{ number_format($transaction->change, 2) }}</p>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <a href="{{ route('transaction.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<!-- Bootstrap CSS CDN (already included above, but for completeness you can add this block if needed) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endpush

@push('scripts')
<!-- Bootstrap JS CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endpush
