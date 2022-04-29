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
                        <form class="forms-sample" action="{{ route('admin.settings') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Name" required>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                    placeholder="Email" value="{{ Auth::user()->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="exampleInputPassword1"
                                    placeholder="Old Password" required> 
                                @if (Session::has('old_password'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ Session::get('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                    id="exampleInputConfirmPassword1" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Re Enter Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="exampleInputConfirmPassword1" placeholder="Re Enter Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
