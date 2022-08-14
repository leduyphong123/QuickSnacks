@extends('layouts.layout_admin')
@section('title')
    Update Snacks
@endsection
@section('body')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Update Snacks</h4>
                    <p class="card-category">Complete your snacks</p>
                </div>
                <div class="card-body">
                    <form action="/admin/update-product/{ID_product}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($products as $product)
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    Name
                                    <input type="text" name="inputName" class="form-control" value="{{ $product->NameProduct }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                Image
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset('uploads/'.$product->ImageProduct) }}" width="100px" height="100px">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    Ingredient
                                    <textarea class="ckeditor form-control" name="inputIngredient" id="inputIngredient">{{ $product->Ingredient }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    CookingRecipe
                                    <textarea class="ckeditor form-control" name="inputCookingRecipe" id="inputCookingRecipe">{{ $product->CookingRecipe }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    Calories
                                    <input type="text" name="inputCalories" class="form-control" value="{{ $product->Calories }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    ID Category
                                    <input type="text" name="inputIDCategory" class="form-control" value="{{ $product->ID_category }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    Information
                                    <textarea class="ckeditor form-control" name="inputIntroduce" id="inputIntroduce">{{ $product->Information }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    Description
                                    <input type="text" name="inputDescription" class="form-control" value="{{ $product->Description }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-success">Update</button>
                        <div class="clearfix"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
    <script>
        CKEDITOR.replace('inputIntroduce', {
            filebrowserBrowseUrl: "{{ route('ckfinder_browser') }}"
        });
    </script>
    @include('ckfinder::setup')
@endsection
