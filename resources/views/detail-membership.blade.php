@extends('layouts.main')

@section('content')
    <article>
        <h1 class="mt-5">{{ $data->m_username }}</h1>
        <h3 class="">ID: {{ $data->m_id }}</h3>
        <h3 class="">Phone Number: {{ $data->m_PhoneNumber }}</h3>
        <h4 class="">Email: {{ $data->m_email }}</h4>
        <h4 class="">Address: {{ $data->m_address }}</h4>
        <h4 class="">Balance: {{ $data->m_balance }}</h4>
        <h4 class="">Start Date: {{ $data->m_StartDate }}</h4>
        <h4 class="">End Date: {{ $data->m_EndDate }}</h4>
    </article>
    <a href="{{ url('/membership') }}" class="btn btn-primary mt-3">Back</a>
@endsection
