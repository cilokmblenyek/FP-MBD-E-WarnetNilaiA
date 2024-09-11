@extends('layouts.main')

@section('content')
    <article>
        <h1 class="mt-5">Computer ID: {{ $data->pc_id }}</h1>
        <h3 class="">Status: {{ $data->pc_status }}</h3>
        <h4 class="">Specification: {{ $data->pc_specification }}</h4>
        <h4 class="">Room Type: {{ $data->pc_RoomType }}</h4>
    </article>
    <a href="{{ url('/komputer') }}" class="btn btn-primary mt-3">Back</a>
@endsection
