@extends('layouts.admin')

@section('title', 'halaman paket travel')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
        <a href="{{ route('travel-package.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa- fa-plus-circle fa-sm text-white-50"></i> Menambah data</a>
    </div>



    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>About</th>
                            <th>Featured Event</th>
                            <th>Foods</th>
                            <th>Language</th>
                            <th>Departure Date</th>
                            <th>Duration</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1; ?>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->title}}</td>
                            <td>{{ $item->location}}</td>
                            <td>{{ $item->about}}</td>
                            <td>{{ $item->featured_event}}</td>
                            <td>{{ $item->foods}}</td>
                            <td>{{ $item->language}}</td>
                            <td>{{ $item->departure_date}}</td>
                            <td>{{ $item->duration}}</td>
                            <td>{{ $item->type}}</td>
                            <td>{{ $item->price}}</td>
                            <td>
                                <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-sm fa- fa-edit"></i>
                                </a>

                                <a href="{{ route('travel-package.destroy', $item->id) }}" class="btn btn-sm btn-danger delete-confirm">
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

@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Anda yakin?',
        text: 'Data yang terhapus tidak dapat dikembalikan!',
        icon: 'warning',
        dangerMode: true,
        buttons: ["Tidak", "Hapus!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }else{
            swal("Data Anda Tetap Tersimpan!");
        }
        setTimeout(window.location.reload.bind(window.location), 1500);
    });
});
</script>

<script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}",  'success')
    setTimeout(window.location.reload.bind(window.location), 2000);
    @endif
</script>
@endpush
