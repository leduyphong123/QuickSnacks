@extends('layouts.layout_admin')
@section('title')
    Edit Profile Admin
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Admin Profile</h4>
                </div>
                <div class="card-body">
                    {{-- <div class="col-12 col-sm-9" > --}}
                    <form action="/admin/update" method="get">
                        @foreach ($admin as $ad)
                            <div class="row">
                                <div class="col-12" id="customer_sidebar">
                                    <h3 class="title-detail">Account information</h3>

                                    Username:
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="inputUsername"
                                            value="{{ $ad->admin_username }}">
                                    </div>
                                    Email:
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="inputEmail"
                                            value="{{ $ad->email }}">
                                    </div>

                                    Password:
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" name="inputPass">
                                    </div><br>
                                    <input type="submit" value="Update" name="btnUpdate" class="btn btn-success">

                                </div>
                            </div>
                        @endforeach
                        {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
