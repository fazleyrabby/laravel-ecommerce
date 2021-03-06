@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        @if (Session::has('danger') || Session::has('success'))
            <div class="alert alert-{{ Session::has('danger') ? 'danger' : 'success' }} alert-dismissible fade show"
                role="alert">
                {{ Session::get('success') ?? Session::get('danger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Vendor Business Details</h4>
                        <form class="forms-sample" action="{{ route('admin.vendor.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_name">Shop Name</label>
                                        <input type="text" name="shop_name"
                                            class="form-control @error('shop_name') is-invalid @enderror" id="shop_name"
                                            placeholder="Shop Name"
                                            value="@if (isset($data->shop_name)) {{ $data->shop_name }} @endif"
                                            required>
                                        @error('shop_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_address">Shop Address</label>
                                        <input type="text" name="shop_address"
                                            class="form-control @error('shop_address') is-invalid @enderror"
                                            id="shop_address" placeholder="Shop Address"
                                            value="@if (isset($data->shop_address)) {{ $data->shop_address }} @endif"
                                            required>
                                        @error('shop_address')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_country">Shop Country</label>
                                        <input type="text" name="shop_country" id="country"
                                            class="form-control @error('shop_country') is-invalid @enderror"
                                            id="shop_country" placeholder="Shop Country"
                                            value="@if (isset($data->shop_country)) {{ $data->shop_country }} @endif"
                                            required>
                                        @error('shop_country')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_city">Shop City</label>
                                        <input type="text" name="shop_city" id="city"
                                            class="form-control @error('shop_city') is-invalid @enderror" id="shop_city"
                                            placeholder="Shop City"
                                            value="@if (isset($data->shop_city)) {{ $data->shop_city }} @endif"
                                            required>
                                        @error('shop_city')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_state">Shop State</label>
                                        <input type="text" name="shop_state" id="state"
                                            class="form-control @error('shop_state') is-invalid @enderror" id="shop_state"
                                            placeholder="Shop State"
                                            value="@if (isset($data->shop_state)) {{ $data->shop_state }} @endif"
                                            required>
                                        @error('shop_state')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_pincode">Shop Pincode</label>
                                        <input type="text" name="shop_pincode"
                                            class="form-control @error('shop_pincode') is-invalid @enderror"
                                            id="shop_pincode" placeholder="Shop Pincode"
                                            value="@if (isset($data->shop_pincode)) {{ $data->shop_pincode }} @endif"
                                            required>
                                        @error('shop_pincode')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_mobile">Shop Mobile</label>
                                        <input type="text" name="shop_mobile"
                                            class="form-control @error('shop_mobile') is-invalid @enderror" id="shop_mobile"
                                            placeholder="Shop Mobile"
                                            value="@if (isset($data->shop_mobile)) {{ $data->shop_mobile }} @endif"
                                            required>
                                        @error('shop_mobile')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_website">Shop Website</label>
                                        <input type="text" name="shop_website"
                                            class="form-control @error('shop_website') is-invalid @enderror"
                                            id="shop_website" placeholder="Shop Website"
                                            value="@if (isset($data->shop_website)) {{ $data->shop_website }} @endif"
                                            required>
                                        @error('shop_website')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_email">Shop Email</label>
                                        <input type="text" name="shop_email"
                                            class="form-control @error('shop_email') is-invalid @enderror" id="shop_email"
                                            placeholder="Shop Email"
                                            value="@if (isset($data->shop_email)) {{ $data->shop_email }} @endif"
                                            required>
                                        @error('shop_email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="license_number">License Number</label>
                                        <input type="text" name="license_number"
                                            class="form-control @error('license_number') is-invalid @enderror"
                                            id="license_number" placeholder="License Number"
                                            value="@if (isset($data->license_number)) {{ $data->license_number }} @endif"
                                            required>
                                        @error('license_number')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid_photo">NID Photo</label>
                                        <input type="file" name="nid_photo" class="form-control mb-2">
                                        <div class="mb-3">
                                            @if (isset($data->nid_photo))
                                                <img width="150" alt="{{ basename($data->nid_photo) }}"
                                                    title="{{ basename($data->nid_photo) }}"
                                                    src="{{ asset($data->nid_photo) }}" />
                                            @endif
                                        </div>
                                        @error('nid_photo')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid_number">NID Number</label>
                                        <input type="text" name="nid_number"
                                            class="form-control @error('nid_number') is-invalid @enderror" id="nid_number"
                                            placeholder="NID Number"
                                            value="@if (isset($data->nid_number)) {{ $data->nid_number }} @endif"
                                            required>
                                        @error('nid_number')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <h4 class="mb-4 mt-2 card-title">Bank Information</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_holder_name">Account Holder Name</label>
                                        <input type="text" name="account_holder_name"
                                            class="form-control @error('account_holder_name') is-invalid @enderror"
                                            id="account_holder_name" placeholder="Account Holder Name"
                                            value="@if (isset($data->account_holder_name)) {{ $data->account_holder_name }} @endif"
                                            required>
                                        @error('account_holder_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank_name">Bank Name</label>
                                        <input type="text" name="bank_name"
                                            class="form-control @error('bank_name') is-invalid @enderror" id="bank_name"
                                            placeholder="Bank Name"
                                            value="@if (isset($data->bank_name)) {{ $data->bank_name }} @endif"
                                            required>
                                        @error('bank_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_number">Account Number</label>
                                        <input type="text" name="account_number"
                                            class="form-control @error('account_number') is-invalid @enderror"
                                            id="account_number" placeholder="Account Number"
                                            value="@if (isset($data->account_number)) {{ $data->account_number }} @endif"
                                            required>
                                        @error('Bank Name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank_code">Bank Code</label>
                                        <input type="text" name="bank_code"
                                            class="form-control @error('bank_code') is-invalid @enderror" id="bank_code"
                                            placeholder="Bank Code"
                                            value="@if (isset($data->bank_code)) {{ $data->bank_code }} @endif"
                                            required>
                                        @error('bank_code')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
