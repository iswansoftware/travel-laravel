@extends('layouts.admin')

@section('title', 'halaman galley')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
        <a href="{{ route('gallery.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa- fa-plus-circle fa-sm text-white-50"></i> Menambah data</a>
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
                            <th>destination Travel</th>
                            <th>Images</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1; ?>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->travel_packages->title }}</td>
                            <td>
                                <img src="{{ Storage::url('/gambar/'.$item->image) }}" alt="gambar" width="150" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-sm fa-edit"></i>
                                </a>

                                <a href="{{ route('gallery.destroy', $item->id) }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-sm fa-trash"></i>
                                </a>
                            </td>


                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="12">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
