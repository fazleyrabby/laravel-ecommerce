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
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Settings</h4>
                        <form class="forms-sample" action="{{ route('admin.settings') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="photo">Profile Photo</label>
                                <input type="file" name="photo" class="form-control mb-2">
                                @if(isset($data->photo)) <img width="150" alt="{{ basename($data->photo) }}" title="{{ basename($data->photo) }}" src="{{ asset($data->photo) }}"/> @endif
                                
                                @error('photo')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name"
                                    required>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                                    id="contact" placeholder="Contact" value="@if(isset($data->contact)) {{ $data->contact }} @endif"
                                    required>
                                @error('contact')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if (Auth::user()->role_id == 2)
                            <h4 class="mb-3">Vendor Details</h4>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                    id="city" placeholder="City" value="@if(isset($data->city)) {{ $data->city }} @endif"
                                    required>
                                @error('city')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                    id="address" placeholder="Address" value="@if(isset($data->address)) {{ $data->address }} @endif"
                                    required>
                                @error('address')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @endif


                            
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Password Update</h4>
                        <form class="forms-sample" action="{{ route('admin.update.password') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password"
                                    class="form-control  @if (Session::has('old_password')) is-invalid @endif"
                                    name="old_password" id="exampleInputPassword1" placeholder="Old Password" 
                                    value="{{ old('old_password') }}"
                                    required>
                                @if (Session::has('old_password'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ Session::get('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    value="{{ old('password') }}"
                                    placeholder="Password" required>
                                
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Re Enter Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Re Enter Password" 
                                    value="{{ old('password_confirmation') }}"
                                    required>
                                <div id="pass_err"></div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" id="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            $('#password').on('input', checkPassword)
            $('#password_confirmation').on('input',checkPassword)
        })

        
        function checkPassword() {
                let pass = $('#password').val();
                let confirm_pass = $('#password_confirmation').val();
                if(pass == '')  $('#password').removeClass('is-valid')
                if(confirm_pass == '') $('#password_confirmation').removeClass('is-valid')

                if (pass != '' && confirm_pass !='' && pass !== confirm_pass) {

                    $('#pass_err').html(`<small class="text-danger">
                                        <strong>Password Not matched!</strong>
                                     </small>`)

                    $('#submit').attr('disabled', true);
                } else {
                    $('#pass_err').html('')
                    if(pass !== '') $('#password').addClass('is-valid')
                    if(confirm_pass !== '') $('#password_confirmation').addClass('is-valid')

                    $('#submit').attr('disabled', false);
                }
            }
    </script>
@endpush
