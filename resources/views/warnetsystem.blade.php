@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>
    <p class="text-center">jangan lupa baca bismillah</p>
    <p class="text-center">I love you my bro *fistbump*</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/warnetsystem" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari Histori Pemakaian"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-2"><a class="btn btn-primary" href="{{ url('/warnetsystem/create') }}">Tambah Pemakaian</a>
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
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Balance Used</th>
                            <th scope="col">Computer ID</th>
                            <th scope="col">Computer Status</th>
                            <th scope="col">Membership ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $ws)
                            <tr>
                                <th scope="row">{{ $ws->ws_id }}</th>
                                <td>{{ $ws->ws_StartTime }}</td>
                                <td>{{ $ws->ws_EndTime }}</td>
                                <td>{{ $ws->ws_BalanceUsed }}</td>
                                <td>
                                    <a
                                        href="/komputer/{{ $ws->computer->pc_id ?? 'N/A' }}">{{ $ws->computer->pc_id ?? 'N/A' }}</a>
                                </td>
                                <td>{{ $ws->computer->pc_status ?? 'N/A' }}</td>
                                <td>
                                    <a
                                        href="/membership/{{ $ws->membership->m_id ?? 'N/A' }}">{{ $ws->membership->m_username }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
