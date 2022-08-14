@extends('layouts.layout_admin')
@section('title')
    View Post
@endsection
@section('body')
    @if (count($products) > 0)
        @php
            $i = 1;
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Post Management</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="">
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Name Product
                                        </th>
                                        <th>
                                            Information
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>

                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $product->NameProduct }}
                                            </td>
                                            <td style="width: 750px">
                                                @php
                                                    echo html_entity_decode($product->Information);
                                                @endphp
                                            </td>
                                            <td>
                                                <a href="/admin/edit-product/{{ $product->ID_product }}"
                                                    class="btn btn-success">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    @else
        <h1>No result</h1>
    @endif
    </head>
@endsection
@section('scripts')
@endsection
