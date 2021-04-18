@extends('layouts.admin')

@section('title', 'halaman create gallery')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menambah data</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                <div class="form-group">
                    <label for="">Destination Travel</label>
                    <select name="travel_packages_id" class="form-control">
                        <option value="{{ $item->travel_packages_id }}">{{ $item->travel_packages->title }}</option>
                        @foreach ($travel_packages as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <button class="btn btn-block  btn-warning" type="submit">
                        <i class="fas fa-sm  fa-edit"> Ubah</i>
                </button>

            </form>
        </div>
    </div>

</div>
@endsection
