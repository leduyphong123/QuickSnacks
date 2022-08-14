@extends('layouts.layout_admin')
@section('title')
    Update Category
@endsection
@section('body')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Update Category Snacks</h4>
                    <p class="card-category">Complete your category snacks</p>
                </div>
                <div class="card-body">
                    <form action="/admin/update-category/{ID_category}" method="get">
                        {{csrf_field()}}
                        @foreach ( $category as $cate )
                        
                        Name of category
                        <div class="col-sm-5">
                            <input type="text" name="inputCategory" value="{{$cate->NameCategory}}" class="form-control">
                        </div>
                        <br>
                        @endforeach
                        <input type="submit" value="Update" name="btnUpdate" class="btn btn-success">
                        <br>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
