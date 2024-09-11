@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>
    <p class="text-center">jangan lupa baca bismillah</p>
    <p class="text-center">I love you my bro *fistbump*</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/komputer" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari Transaksi"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-2"><a class="btn btn-primary" href="{{ url('/komputer/create') }}">Tambah Produk</a></div>
    </div>
    @include('partials.backbutton')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">PC ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Specification</th>
                            <th scope="col">Room Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $computer)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="/komputer/{{ $computer->pc_id }}">{{ $computer->pc_id }}</a>
                                </td>
                                <td>{{ $computer->pc_status }}</td>
                                <td>{{ $computer->pc_specification }}</td>
                                <td>{{ $computer->pc_RoomType }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
