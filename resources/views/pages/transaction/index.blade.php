@extends('layouts.admin')

@section('title', 'halaman transaction')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction</h1>

    </div>

             @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
              </div>
             @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Travel</th>
                            <th>User</th>
                            <th>Visa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->travel_package->title }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td>{{ $item->additional_visa }}</td>
                            <td>{{ $item->transaction_total }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>
                                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-sm fa-eye"></i>
                                </a>

                                <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-sm fa-edit"></i>
                                </a>

                                <a href="{{ route('transaction.destroy', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?');">
                                    <i class="fas fa-sm fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
