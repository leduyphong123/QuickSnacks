@extends('layouts.layout_admin')
@section('title')
    Profile Admin
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Admin Profile</h4>
                </div>
                <div class="card-body">
                    <div class="col-12 col-sm-9">
                        @foreach ($admin as $ad)
                            <div class="row">
                                <div class="col-12" id="customer_sidebar">
                                    <h3 class="title-detail">Account information</h3>
                                    {{-- <div class="d-flex align-items-center justify-content-between"> --}}
                                    <h4 class="name_account">Username: {{ $ad->admin_username }}</h4>
                                    <h4>Email: {{ $ad->email }}</h4>
                                    <a href="/admin/edit-profile" class="btn btn-success">Update information</a>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
