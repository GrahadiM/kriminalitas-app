@extends('layouts.app')

@section('content')
    <div class="card border-0 mb-5">
        <div class="card-header d-flex">
            <h3 class="p-2 text-decoration-underline text-uppercase">{{ __('Data Kriminal Hari Ini') }}</h3>
            <div class="ms-auto p-2">
                {{-- <a href="{{ route('admin.create') }}" class="btn btn-sm btn-outline-success">Buat Data Baru</a> --}}
            </div>
        </div>

        <div class="card-body">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Pasal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ Str::ucfirst($item->place_name) }}</td>
                            <td>{{ $item->pasal }}</td>
                            <td>{{ $item->waktu }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center fw-bold">Hari ini tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
