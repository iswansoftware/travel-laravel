@extends('layouts.admin')

@section('title', 'halaman dashboard')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaction</h1>

    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Status Transaksi :</label>
                    <select name="transaction_status" class="form-control">
                        <option value="{{ $item->transaction_satatus }}">Data Sebelumnya({{ $item->transaction_status }})</option>
                        <option value="in_cart">in cart</option>
                        <option value="pending">pending</option>
                        <option value="success">success</option>
                        <option value="cancel">cancel</option>
                        <option value="failed">failed</option>
                    </select>
                </div>

                <button class="btn btn-block btn-warning">
                    <i class="fas fa-sm fa-edit"> Ubah</i>
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
