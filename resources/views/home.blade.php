@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $title }} Management System</h1>
    <p class="text-center">Manage your internet cafe with ease</p>
    <p class="text-center">developed by: {{ $name }}</p>
    <p class="text-center">Kamu sedang berada di: {{ $position }}</p>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Employee Management</div>
                <div class="card-body">
                    <p>Manage your staff efficiently.</p>
                    <a href="{{ url('/pegawai') }}" class="btn btn-primary">Manage Employees</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Member Management</div>
                <div class="card-body">
                    <p>Handle member accounts and transactions.</p>
                    <a href="{{ url('/membership') }}" class="btn btn-primary">Manage Members</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Product Management</div>
                <div class="card-body">
                    <p>Manage food and beverage stocks.</p>
                    <a href="{{ url('/fnb') }}" class="btn btn-primary">Manage Products</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Transaction Management</div>
                <div class="card-body">
                    <p>View and manage all transactions.</p>
                    <a href="{{ url('/cashiertransaction') }}" class="btn btn-primary">Manage Transactions</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Computer Management</div>
                <div class="card-body">
                    <p>Track computer usage and quotas.</p>
                    <a href="{{ url('/komputer') }}" class="btn btn-primary">Manage Computers</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Warnet System</div>
                <div class="card-body">
                    <p>Monitor and control the internet cafe system.</p>
                    <a href="{{ url('/warnetsystem') }}" class="btn btn-primary">Manage Warnet System</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
