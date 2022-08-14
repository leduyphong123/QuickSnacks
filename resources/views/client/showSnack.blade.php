@extends('layouts.layout_client')
@section('body')
    <div class="container mb-̀5">
        <div class="row mb-5">
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
            @csrf
        </div>
        <div class="row mb-̀̀5" id="qwe">
            {!! $items->links() !!}
        </div>


    </div>
    {{-- <div class="container"><a href="/load" class="button" id="load_more">LOAD MORE ...</a></div> --}}
@endsection
@section('scripts')
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#load_more').click(function(e) {

            e.preventDefault();
            $.ajax({
                type: "get",
                url: "/load",
                data: {
                    _token: 'csrf_token()'
                },
                success: function(response) {
                    $('#qwe').append(response)
                }

            });
        })
    })
</script> --}}
