@extends('layouts.admin')

@section('title', 'halaman create gallery')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaction</h1>
    </div>

    <a href="{{ route('transaction.back') }}" class="btn  btn-secondary mb-2">
        <i class="fas fa-sm fa-arrow-left"></i>
    </a>

    <div class="card shadow">
        <div class="card-body">
            <table class=" table table-bordered table-hover">
                <tr>
                    <th>ID :</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Paket Travel :</th>
                    <td>{{ $item->travel_package->title }}</td>
                </tr>
                <tr>
                    <th>Customer :</th>
                    <td>{{ $item->users->name }}</td>
                </tr>
                <tr>
                    <th>Additional Visa :</th>
                    <td>{{ $item->additional_visa }}</td>
                </tr>
                <tr>
                    <th>Additional Visa :</th>
                    <td>{{ $item->additional_visa }}</td>
                </tr>
                <tr>
                    <th>Total Transaksi :</th>
                    <td>{{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Status Transaksi :</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>

              <tr>
                  <th>Pembelian</th>
                  <td>
                      <table class="table table-bordered">
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Nasionality</th>
                              <th>Visa</th>
                              <th>DOE Passport</th>
                          </tr>
                          <tr>
                              @foreach ($item->details as $detail)
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->username }}</td>
                                <td>{{ $detail->nationality }}</td>
                                <td>{{ $detail->is_visa }}</td>
                                <td>{{ $detail->doe_passport }}</td>
                              @endforeach
                          </tr>
                      </table>
                  </td>
              </tr>

            </table>
        </div>
    </div>

</div>
@endsection
