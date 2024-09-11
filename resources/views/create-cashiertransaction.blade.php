@extends('layouts.main')

@section('content')
    <h1 class="text-center mt-5">Welcome to {{ $position }}</h1>

    @include('partials.backbutton')

    <div class="col-lg-7 mx-auto mt-5 mb-5">
        <form action="{{ url('/cashiertransaction') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="t_id" class="form-label">Transaction ID</label>
                <input type="text" class="form-control" name="t_id" id="t_id" required>
            </div>
            <div class="mb-3">
                <label for="t_date" class="form-label">Transaction Date</label>
                <input type="date" class="form-control" id="t_date" name="t_date" required>
            </div>
            <div class="mb-3">
                <label for="t_PaymentMethod" class="form-label">Payment Method</label>
                <input type="text" class="form-control" id="t_PaymentMethod" name="t_PaymentMethod" required>
            </div>
            <div class="mb-3">
                <label for="t_TotalAmount" class="form-label">Total Amount</label>
                <input type="number" class="form-control" id="t_TotalAmount" name="t_TotalAmount" required>
            </div>
            <div class="mb-3">
                <label for="employee_e_id" class="form-label">Employee</label>
                <select class="form-control" id="employee_e_id" name="employee_e_id" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->e_id }}">{{ $employee->e_name }}</option>
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
            <div class="mb-3">
                <label for="fnb_items" class="form-label">Food and Beverages</label>
                <div id="fnb_items">
                    @foreach ($fnbItems as $fnb)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $fnb->fb_id }}"
                                id="fnb_{{ $fnb->fb_id }}" name="fnb_items[{{ $fnb->fb_id }}][fnb_fb_id]">
                            <label class="form-check-label" for="fnb_{{ $fnb->fb_id }}">
                                {{ $fnb->fb_name }}
                            </label>
                            <input type="number" name="fnb_items[{{ $fnb->fb_id }}][amount]" min="1"
                                class="form-control d-inline-block w-auto" placeholder="Amount">
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <label for="ab_id" class="form-label">AddBalance ID</label>
                <input type="text" name="ab_id" id="ab_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="add_balance_amount" class="form-label">Add Balance Amount</label>
                <input type="number" class="form-control" id="add_balance_amount" name="add_balance_amount" step="100"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
