@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>
    <p class="text-center">jangan lupa baca bismillah</p>
    <p class="text-center">I love you my bro *fistbump*</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/cashiertransaction" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari Transaksi"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-2"><a class="btn btn-primary" href="{{ url('/cashiertransaction/create') }}">Tambah Transaksi</a>
        </div>
    </div>
    @include('partials.backbutton')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Jumlah Total</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">ID Member</th>
                            <th scope="col">Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $transaction)
                            <tr>
                                <th scope="row"><a
                                        href="/cashiertransaction/{{ $transaction->t_id }}">{{ $transaction->t_id }}</a>
                                </th>
                                <td>
                                    {{ $transaction->t_date }}
                                </td>
                                <td>{{ $transaction->t_TotalAmount }}</td>
                                <td>{{ $transaction->t_PaymentMethod }}</td>
                                <td>
                                    <a
                                        href="/membership/{{ $transaction->membership->m_id ?? 'N/A' }}">{{ $transaction->membership->m_username }}</a>
                                </td>
                                <td><a
                                        href="/pegawai/{{ $transaction->employee->e_id ?? 'N/A' }}">{{ $transaction->employee->e_name ?? 'N/A' }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
