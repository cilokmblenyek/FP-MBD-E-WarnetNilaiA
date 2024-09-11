@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>

    @include('partials.backbutton')

    <div class="mt-5 col-lg-7">
        <form action="/fnb" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fb_id" class="form-label">ID</label>
                <input type="text" class="form-control" id="fb_id" name="fb_id" required>
            </div>
            <div class="mb-3">
                <label for="fb_name" class="form-label">Nama </label>
                <input type="text" class="form-control" id="fb_name" name="fb_name" required>
            </div>
            <div class="mb-3">
                <label for="fb_price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="fb_price" name="fb_price" step="100" required>
            </div>
            <div class="mb-3">
                <label for="fb_stock" class="form-label">Stok</label>
                <input type="number" class="form-control" id="fb_stock" name="fb_stock" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
