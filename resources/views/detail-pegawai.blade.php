@extends('layouts.main')

@section('content')
    <article>
        <h1 class="mt-5">{{ $pegawaiku->e_name }}</h1>
        <h3 class="">ID: {{ $pegawaiku->e_id }}</h3>
        <h4 class="">Alamat: {{ $pegawaiku->e_address }}</h4>
        <h4 class="">Nomor Telepon: {{ $pegawaiku->e_PhoneNumber }}</h4>
        <h4 class="">Email: {{ $pegawaiku->e_email }}</h4>
    </article>
    <a href="{{ url('/pegawai') }}" class="btn btn-primary mt-3">Back</a>
@endsection
