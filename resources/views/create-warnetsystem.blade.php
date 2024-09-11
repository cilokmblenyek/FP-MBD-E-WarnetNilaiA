@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>

    @include('partials.backbutton')

    <div class="col-lg-7 mx-auto mt-5 mb-5">
        <form action="{{ url('/warnetsystem') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ws_id" class="form-label">Warnet System ID</label>
                <input type="text" class="form-control" id="ws_id" name="ws_id" required>
            </div>
            <div class="mb-3">
                <label for="ws_StartTime" class="form-label">Start Time</label>
                <input type="text" class="form-control" id="ws_StartTime" name="ws_StartTime" required>
            </div>
            <div class="mb-3">
                <label for="ws_EndTime" class="form-label">End Time</label>
                <input type="text" class="form-control" id="ws_EndTime" name="ws_EndTime" required>
            </div>
            <div class="mb-3">
                <label for="ws_BalanceUsed" class="form-label">Balance Used</label>
                <input type="number" class="form-control" id="ws_BalanceUsed" name="ws_BalanceUsed" min="0"
                    step="100" required>
            </div>
            <div class="mb-3">
                <label for="computer_pc_id" class="form-label">Computer</label>
                <select class="form-control" id="computer_pc_id" name="computer_pc_id" required>
                    @foreach ($computers as $computer)
                        <option value="{{ $computer->pc_id }}">{{ $computer->pc_RoomType }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="membership_m_id" class="form-label">Membership</label>
                <select class="form-control" id="membership_m_id" name="membership_m_id" required>
                    @foreach ($memberships as $membership)
                        <option value="{{ $membership->m_id }}">{{ $membership->m_username }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
