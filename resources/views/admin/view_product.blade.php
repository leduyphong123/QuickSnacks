@extends('layouts.layout_admin')
@section('title')
    View Snacks
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
@endsection
@section('body')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Search" name="search" id="search">
        </div>
    </nav>
    @if (count($products) > 0)
    @php
        $i=1
    @endphp
        <div class="row">
            <div class="col-md-12">
                <form action="/admin/product/delete" method="get">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Snacks List</h4>
                        <p class="card-category">All data from the snacks</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="">
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="select-all" id="select-all" />
                                        </th>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Name Product
                                        </th>
                                        <th>
                                            Image Product
                                        </th>
                                        <th>
                                            Ingredient
                                        </th>
                                        <th>
                                            CookingRecipe
                                        </th>
                                        <th>
                                            Calories
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product)
                                        <tr>
                                            <td><input type="checkbox" name="ids[{{$product->ID_product}}]" value="{{$product->ID_product}}" class="checkbox"></td>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $product->NameProduct }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('uploads/') }}/{{ $product->ImageProduct }}"
                                                    style="width: 100px; height: 100px">
                                            </td>
                                            <td>
                                                @php
                                                    echo html_entity_decode($product->Ingredient);
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    echo html_entity_decode($product->CookingRecipe);
                                                @endphp
                                            </td>
                                            <td>
                                                {{ $product->Calories }}
                                            </td>
                                            <td style="width: 200px">
                                                    {{$product->Description}}

                                            </td>
                                            <td>
                                                <a href="/admin/edit-product/{{ $product->ID_product }}"
                                                    class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-product/{{ $product->ID_product }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-danger" value="DELETE" >DELETE</button>
                    </div>
                </div>
            </form>
            {!! $products->links() !!}
            </div>
        </div>
    @else
        <h1>No result</h1>
    @endif
    </head>


@endsection
@section('scripts')
<script src="{{ asset('https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {

       $('#select-all').click(function(event) {
       if(this.checked) {

           $('.checkbox').each(function() {
               this.checked = true;
           });
       } else {
           $('.checkbox').each(function() {
               this.checked = false;
           });
       }
   })
        });
   </script>
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('admin/product/search') }}',
                    data: {
                        'search': $value,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            })
        })
    </script>
@endsection
