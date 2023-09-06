@extends('layouts.dashboard.dashboard')
@section('title', 'Edit Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <x-alert type="success" />
            <div class="card shadow-none border">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-1 mt-1">Edit Profile</h5>
                    <div class="col-md-6 float-end">
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-primary w-22 float-end">
                            Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-row">
                            <div class="col-md-6">
                                <x-form.input name="first_name" label="First name" :value="$user->profile->first_name" />
                            </div>
                            <div class="col-md-6">
                                <x-form.input name="last_name" label="Last name" :value="$user->profile->last_name" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <x-form.input name="birthday" type="date" label="Birthday" :value="$user->profile->birthday" />
                            </div>
                            <div class="col-md-6">
                                <x-form.radio name="gender" label="Gender" :options="['male' => 'Male', 'female' => 'Female']" :checked="$user->profile->gender" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <x-form.input name="street_address" label="Street Address" :value="$user->profile->street_address" />
                            </div>
                            <div class="col-md-4">
                                <x-form.input name="city" label="City" :value="$user->profile->city" />
                            </div>
                            <div class="col-md-4">
                                <x-form.input name="state" label="State" :value="$user->profile->state" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <x-form.input name="postal_code" label="Postal Code" :value="$user->profile->postal_code" />
                            </div>
                            <div class="col-md-4">
                                <x-form.select name="country" :options="$countries" label="Country" :selected="$user->profile->country" />
                            </div>
                            <div class="col-md-4">
                                <x-form.select name="locale" :options="$locales" label="Locale" :selected="$user->profile->locale" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
