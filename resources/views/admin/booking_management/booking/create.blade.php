@extends('layouts.app')

@section('title', 'Create Booking')
@section('page-title', 'Create Booking')
@section('page-sub', 'Add a new booking reservation')

@section('content')

<div class="create-wrap">

    {{-- Page header --}}
    <div class="create-header">
        <div>
            <h2 class="create-heading">New Booking</h2>
            <p class="create-sub">Fill in the details to create a new reservation</p>
        </div>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn--ghost">
            <i class="fa-solid fa-arrow-left"></i> Back to Bookings
        </a>
    </div>

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="form-errors">
            <div class="form-errors__icon">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div>
                <p class="form-errors__title">Please fix the following errors:</p>
                <ul class="form-errors__list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Form card --}}
    <div class="form-card">

        <div class="form-card__header">
            <div class="form-card__icon">
                <i class="fa-solid fa-ticket"></i>
            </div>
            <div>
                <p class="form-card__title">Booking Information</p>
                <p class="form-card__sub">All fields marked with * are required</p>
            </div>
        </div>

        <form action="{{ route('admin.bookings.store') }}" method="POST" class="booking-form">
            @csrf

            <div class="form-grid">

                {{-- User --}}
                <div class="form-group form-group--full">
                    <label class="form-label" for="user_id">
                        <i class="fa-solid fa-user"></i> User *
                    </label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="" disabled selected hidden>Select a user…</option>
                        @foreach(\App\Models\User::orderBy('name')->get() as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Bus --}}
                <div class="form-group form-group--full">
                    <label class="form-label" for="bus_id">
                        <i class="fa-solid fa-bus"></i> Bus *
                    </label>
                    <select name="bus_id" id="bus_id" class="form-select" required>
                        <option value="" disabled selected hidden>Select a bus…</option>
                        @foreach(\App\Models\Bus::orderBy('bus_name')->get() as $bus)
                            <option value="{{ $bus->id }}" {{ old('bus_id') == $bus->id ? 'selected' : '' }}>
                                {{ $bus->bus_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('bus_id')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Seat Number --}}
                <div class="form-group">
                    <label class="form-label" for="seat_number">
                        <i class="fa-solid fa-chair"></i> Seat Number
                    </label>
                    <input type="text"
                           id="seat_number" name="seat_number"
                           class="form-input"
                           value="{{ old('seat_number') }}"
                           placeholder="e.g. 12A">
                    @error('seat_number')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Seat Type --}}
                <div class="form-group">
                    <label class="form-label" for="seat_type">
                        <i class="fa-solid fa-couch"></i> Seat Type
                    </label>
                    <select name="seat_type" id="seat_type" class="form-select">
                        @foreach(['economy' => 'Economy', 'business' => 'Business'] as $val => $label)
                            <option value="{{ $val }}" {{ old('seat_type') == $val ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('seat_type')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label class="form-label" for="status">
                        <i class="fa-solid fa-flag"></i> Booking Status
                    </label>
                    <select name="status" id="status" class="form-select">
                        @foreach(['pending','confirmed','cancelled','completed'] as $status)
                            <option value="{{ $status }}" {{ old('status', 'pending') == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Payment Status --}}
                <div class="form-group">
                    <label class="form-label" for="payment_status">
                        <i class="fa-solid fa-credit-card"></i> Payment Status
                    </label>
                    <select name="payment_status" id="payment_status" class="form-select">
                        <option value="unpaid" {{ old('payment_status', 'unpaid') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="paid"   {{ old('payment_status') == 'paid'   ? 'selected' : '' }}>Paid</option>
                    </select>
                    @error('payment_status')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Departure Time --}}
                <div class="form-group">
                    <label class="form-label" for="departure_time">
                        <i class="fa-solid fa-plane-departure"></i> Departure Time
                    </label>
                    <input type="datetime-local"
                           id="departure_time" name="departure_time"
                           class="form-input"
                           value="{{ old('departure_time') }}">
                    @error('departure_time')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Arrival Time --}}
                <div class="form-group">
                    <label class="form-label" for="arrival_time">
                        <i class="fa-solid fa-plane-arrival"></i> Arrival Time
                    </label>
                    <input type="datetime-local"
                           id="arrival_time" name="arrival_time"
                           class="form-input"
                           value="{{ old('arrival_time') }}">
                    @error('arrival_time')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

                {{-- Amount Paid --}}
                <div class="form-group">
                    <label class="form-label" for="amount_paid">
                        <i class="fa-solid fa-peso-sign"></i> Amount Paid
                    </label>
                    <input type="number" step="0.01" min="0"
                           id="amount_paid" name="amount_paid"
                           class="form-input"
                           value="{{ old('amount_paid') }}"
                           placeholder="0.00">
                    @error('amount_paid')
                        <span class="field-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                    @enderror
                </div>

            </div>{{-- /.form-grid --}}

            <div class="form-actions">
                <a href="{{ route('admin.bookings.index') }}" class="btn btn--ghost">
                    <i class="fa-solid fa-times"></i> Cancel
                </a>
                <button type="submit" class="btn btn--primary">
                    <i class="fa-solid fa-plus"></i> Create Booking
                </button>
            </div>

        </form>
    </div>{{-- /.form-card --}}

</div>{{-- /.create-wrap --}}

@endsection

@push('head')
<style>
/* ── Layout ─────────────────────────────────────────────────────────────── */
.create-wrap {
    max-width: 860px;
}
.create-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 24px;
    gap: 16px;
    flex-wrap: wrap;
}
.create-heading {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--ink);
}
.create-sub {
    font-size: .78rem;
    color: var(--muted);
    margin-top: 3px;
}

/* ── Error banner ───────────────────────────────────────────────────────── */
.form-errors {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    background: var(--c-red-bg);
    border: 1px solid rgba(220,38,38,.25);
    border-radius: var(--radius-sm);
    padding: 14px 18px;
    margin-bottom: 22px;
}
.form-errors__icon {
    color: var(--c-red);
    font-size: 1.1rem;
    flex-shrink: 0;
    margin-top: 1px;
}
.form-errors__title {
    font-size: .84rem;
    font-weight: 700;
    color: var(--c-red);
    margin-bottom: 6px;
}
.form-errors__list {
    margin: 0;
    padding-left: 18px;
    font-size: .8rem;
    color: var(--c-red);
    line-height: 1.7;
}

/* ── Form card ──────────────────────────────────────────────────────────── */
.form-card {
    background: var(--white);
    border: 1px solid var(--border-dk);
    border-radius: var(--radius);
    overflow: hidden;
}
.form-card__header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 20px 26px;
    background: var(--bg2);
    border-bottom: 1px solid var(--border-dk);
}
.form-card__icon {
    width: 40px; height: 40px;
    border-radius: 9px;
    background: var(--ink);
    color: var(--gold-lt);
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}
.form-card__title {
    font-size: .9rem;
    font-weight: 700;
    color: var(--ink);
}
.form-card__sub {
    font-size: .72rem;
    color: var(--muted);
    margin-top: 2px;
}

/* ── Form internals ─────────────────────────────────────────────────────── */
.booking-form {
    padding: 26px;
    display: flex;
    flex-direction: column;
    gap: 24px;
}
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}
.form-group { display: flex; flex-direction: column; gap: 6px; }
.form-group--full { grid-column: 1 / -1; }

.form-label {
    font-size: .8rem;
    font-weight: 600;
    color: var(--ink);
    display: flex;
    align-items: center;
    gap: 6px;
}
.form-label i { color: var(--gold); font-size: .78rem; width: 14px; }

.form-input,
.form-select {
    padding: 10px 14px;
    border: 1px solid var(--border-dk);
    border-radius: var(--radius-sm);
    font-size: .85rem;
    font-family: 'Outfit', sans-serif;
    background: var(--white);
    color: var(--ink);
    outline: none;
    transition: border-color .18s, box-shadow .18s;
}
.form-input:focus,
.form-select:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 3px var(--gold-bg);
}
.form-input::placeholder { color: var(--muted-lt); }

.field-error {
    font-size: .74rem;
    color: var(--c-red);
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 2px;
}

/* ── Actions ────────────────────────────────────────────────────────────── */
.form-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    padding-top: 20px;
    border-top: 1px solid var(--border-dk);
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 22px;
    border-radius: var(--radius-sm);
    font-family: 'Outfit', sans-serif;
    font-size: .84rem;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all .18s;
    justify-content: center;
}
.btn--primary { background: var(--ink); color: #fff; }
.btn--primary:hover { background: var(--ink-mid); transform: translateY(-1px); }
.btn--ghost {
    background: var(--bg2);
    color: var(--muted);
    border: 1px solid var(--border-dk);
}
.btn--ghost:hover { background: var(--bg3); color: var(--ink); }

/* ── Responsive ─────────────────────────────────────────────────────────── */
@media (max-width: 640px) {
    .form-grid { grid-template-columns: 1fr; }
    .form-group--full { grid-column: 1; }
    .form-actions { flex-direction: column; }
    .btn { width: 100%; }
    .create-header { flex-direction: column; }
}
</style>
@endpush