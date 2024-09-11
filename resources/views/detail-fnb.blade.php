@extends('layouts.main')

@section('content')
    <article>
        <h1 class="mt-5">{{ $data->fb_name }}</h1>
        <h3 class="">ID: {{ $data->fb_id }}</h3>
        <h3 class="">Harga: {{ $data->fb_price }}</h3>
        <h4 class="">Stok: {{ $data->fb_stock }}</h4>
    </article>
    <a href="{{ url('/fnb') }}" class="btn btn-primary mt-3">Back</a>
@endsection
