@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>
    <p class="text-center">jangan lupa baca bismillah</p>
    <p class="text-center">I love you my bro *fistbump*</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/fnb" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari Transaksi"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-2"><a class="btn btn-primary" href="{{ url('/fnb/create') }}">Tambah Produk</a></div>
    </div>
    @include('partials.backbutton')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama FnB</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="/fnb/{{ $item->fb_id }}">{{ $item->fb_name }}</a>
                                </td>
                                <td>{{ $item->fb_price }}</td>
                                <td>{{ $item->fb_stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
