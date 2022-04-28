@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Settings</h4>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
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
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="exampleInputPassword1"
                                    placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputConfirmPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Re Enter Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="exampleInputConfirmPassword1"
                                    placeholder="Re Enter Password">
                            </div>
                           
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
