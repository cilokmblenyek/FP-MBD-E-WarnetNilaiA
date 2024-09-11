@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>
    <p class="text-center">jangan lupa baca bismillah</p>
    <p class="text-center">I love you my bro *fistbump*</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/pegawai" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari Pegawai"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    @include('partials.backbutton')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawaiku as $pgw)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="/pegawai/{{ $pgw->e_id }}">{{ $pgw->e_name }}</a>
                                </td>
                                <td>{{ $pgw->e_address }}</td>
                                <td>{{ $pgw->e_PhoneNumber }}</td>
                                <td>{{ $pgw->e_email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
