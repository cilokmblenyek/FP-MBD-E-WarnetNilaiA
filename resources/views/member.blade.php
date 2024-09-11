@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>
    <p class="text-center">jangan lupa baca bismillah</p>
    <p class="text-center">I love you my bro *fistbump*</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/membership" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari Transaksi"
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
                            <th scope="col">Username</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="/membership/{{ $item->m_id }}">{{ $item->m_username }}</a>
                                </td>
                                <td>{{ $item->m_PhoneNumber }}</td>
                                <td>{{ $item->m_email }}</td>
                                <td>{{ $item->m_address }}</td>
                                <td>{{ $item->m_balance }}</td>
                                <td>{{ $item->m_StartDate }}</td>
                                <td>{{ $item->m_EndDate }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
