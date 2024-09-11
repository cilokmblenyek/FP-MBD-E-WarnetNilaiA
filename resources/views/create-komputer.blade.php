@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>

    @include('partials.backbutton')

    <div class="mt-5 col-lg-7">
        <form action="/komputer" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pc_id" class="form-label">ID</label>
                <input type="text" class="form-control" id="pc_id" name="pc_id" required>
            </div>
            <div class="mb-3">
                <label for="pc_status" class="form-label">Status</label>
                <select class="form-select" id="pc_status" name="pc_status" required>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pc_specification" class="form-label">Spesifikasi</label>
                <input type="text" class="form-control" id="pc_specification" name="pc_specification" required>
            </div>
            <div class="mb-3">
                <label for="pc_RoomType" class="form-label">Room Type</label>
                <select class="form-select" id="pc_RoomType" name="pc_RoomType" required>
                    <option value="Regular">Regular</option>
                    <option value="VIP">VIP</option>
                    <option value="VVIP">VVIP</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
