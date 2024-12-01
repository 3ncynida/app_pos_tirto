@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card card-default color-palette-box">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('sekolah.transaction.create') }}"><button class="btn btn-warning">Create
                                Transaction</button></a>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Transaction Id</th>
                                        <th>Customer</th>
                                        <th>Total Belanja</th>
                                        <th>Total Pembayaran</th>
                                        <th>Kasir</th>
                                        <th>Status Transaction</th>
                                        <th>Tanggal Transaction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->transaction_id }}</td>
                                            <td>{{ $transaction->customer->customer_name ?? 'Guest' }}</td>
                                            <td>Rp. {{ number_format($transaction->total_amount, 2) }}</td>
                                            <td>Rp. {{ number_format($transaction->payment->amount ?? 0, 2) }}</td>
                                            <td>{{ $transaction->users->name }}</td>
                                            <td>{{ ucfirst($transaction->status) }}</td>
                                            <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('sekolah.transaction.show', $transaction->transaction_id) }}"
                                                        class="btn btn-default bg-success text-white">
                                                        <i class="nav-icon fas fa-tag"></i>
                                                    </a>
                                                    <!-- Delete Button (Form) -->
                                                    <form
                                                        action="{{ route('sekolah.transaction.destroy', $transaction->transaction_id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-default bg-danger">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
