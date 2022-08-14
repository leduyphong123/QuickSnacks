@extends('layouts.layout_client')
@section('body')
<div class="container mt-5 mb-5 ">
    <div class="row height d-flex justify-content-center align-items-center ">
        <div class="col-md-7 ">

        <div class="input-group rounded">
            <input type="search" id="search"class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </span>
          </div>
          @csrf

        </div>
    </div>
</div>
<div class="container">
    <div class="row "  id="show">
        @foreach ($items as $item)
            <div class="col-12 col-sm-6 col-md-4 p-2 border border-light">
                <img src="{{ asset('uploads/') }}/{{ $item->ImageProduct }}" class="card-img-top"
                    style="max-height: 13rem"alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->NameProduct }}</h5>
                    <p class="card-text"> @php
                        echo html_entity_decode($item->Description);
                    @endphp</p>
                    <a href="/show/{{ $item->ID_product }}" class="btn btn-primary">View</a>
                </div>
            </div>
        @endforeach

    </div>

</div>

@endsection
@section('scripts')
@endsection
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search/product') }}',
                    data: {
                        'search': $value,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#show').html(data);
                    }
                });
            })
        })
    </script>
