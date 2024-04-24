@extends('layouts.app')

@section('content')
    <div class="card border-0 mb-5">
        <div class="card-header d-flex">
            <h3 class="p-2 text-decoration-underline text-uppercase">{{ __('Data Kriminal') }}</h3>
            <div class="ms-auto p-2">
                <a href="{{ route('admin.create') }}" class="btn btn-sm btn-outline-success">Buat Data Baru</a>
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
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ Str::ucfirst($item->place_name) }}</td>
                            <td>{{ $item->pasal }}</td>
                            <td>{{ $item->waktu }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ route('admin.detail', $item->id) }}"
                                    class="btn btn-sm btn-outline-info m-1">Detail</a>
                                {{-- <a href="{{ route('admin.destroy', $item->id) }}" class="btn btn-sm btn-outline-danger m-1">Hapus</a> --}}
                                <a class="btn btn-sm btn-outline-danger m-1" href="{{ route('admin.destroy', $item->id) }}"
                                    onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
                                    {{ __('Hapus') }}
                                </a>
                                <form id="destroy-form" action="{{ route('admin.destroy', $item->id) }}" method="POST"
                                    class="d-none">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
