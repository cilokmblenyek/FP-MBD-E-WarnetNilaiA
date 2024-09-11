@extends('layouts.main')

@section('content')
    <article>
        <h1 class="mt-5">Transaction ID: {{ $data->t_id }}</h1>
        <h3 class="">Date: {{ $data->t_date }}</h3>
        <h4 class="">Total Amount: {{ $data->t_TotalAmount }}</h4>
        <h4 class="">Payment Method: {{ $data->t_PaymentMethod }}</h4>
        <h4 class="">Member Name: {{ $data->membership->m_username ?? 'N/A' }}</h4>
        <h4 class="">Employee Name: {{ $data->employee->e_name ?? 'N/A' }}</h4>
    </article>
    <a href="{{ url('/cashiertransaction') }}" class="btn btn-primary mt-3">Back</a>
@endsection
