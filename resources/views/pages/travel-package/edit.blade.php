@extends('layouts.admin')

@section('title', 'halaman create paket traveel')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mengubah data</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('travel-package.update', $item->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Ketikan Title" value="{{ $item->title }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Ketikan Location" value="{{ $item->location }}">
                    @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="">About</label>
                    <textarea name="about" class="form-control @error('about') is-invalid @enderror" cols="30" rows="10">{{ $item->about }}</textarea>
                    @error('about')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Featured  Event</label>
                    <input type="text" name="featured_event" class="form-control @error('featured_event') is-invalid @enderror" placeholder="Ketikan Featured  Event" value="{{ $item->featured_event }}">
                    @error('featured_event')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Foods</label>
                    <input type="text" name="foods" class="form-control @error('foods') is-invalid @enderror" placeholder="Ketikan Foods" value="{{ $item->foods }}">
                    @error('foods')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Language</label>
                    <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" placeholder="Ketikan Language" value="{{ $item->language }}">
                    @error('language')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Departure Date</label>
                    <input type="date" name="departure_date" class="form-control @error('departure_date') is-invalid @enderror" placeholder="Ketikan Departure Date" value="{{ $item->departure_date }}">
                    @error('departure_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Duration</label>
                    <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Ketikan Duration" value="{{ $item->duration }}">
                    @error('duration')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" name="type" class="form-control  @error('type') is-invalid @enderror" placeholder="Ketikan Type" value="{{ $item->type }}">
                    @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Ketikan Price" value="{{ $item->price }}">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <button class="btn btn-block  btn-warning" type="submit">
                        <i class="fas fa-sm  fa-edit"> Ubah</i>
                </button>

            </form>
        </div>
    </div>

</div>
@endsection
