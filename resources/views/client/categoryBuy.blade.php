@extends('layouts.layout_client')
@section('body')
    @foreach ($show as $item)
        <div class="container">
            <div class="row justity-content-center">
                <h2 class="mb-4 text-center mt-3 fs-1 fw-bolder" style="color: #eb0029">{{ $item->NameProduct }}</h2>
                <img src="{{ asset('uploads/') }}/{{ $item->ImageProduct }}">

                <h4 class="mt-4 mb-2 text-uppercase fs-3">Information</h4>
                <div class="mt-2 fs-5 fw-normal">@php
                    echo html_entity_decode($item->Information);
                @endphp</div>
                {{-- cong thuc mua --}}
                <h4 class="mt-3 mb-2 text-uppercase fs-3 ">CookingRecipe</h4>
                <div class="fs-5 fw-normal">@php
                    echo html_entity_decode($item->CookingRecipe);
                @endphp</div>
                    <h4 class="mt-3 mb-2 text-uppercase fs-3">Ingredient</h4>
                    <div class="fs-5 fw-normal"> @php
                        echo html_entity_decode($item->Ingredient);
                    @endphp
                    </div>
            </div>
        </div>
    @endforeach
    {{-- user buy category --}}

    {{-- comment user --}}
    @if (Session::get('id_user') )
        <div class="container mt-5 mb-5 ">
            <div class="row height d-flex justify-content-center align-items-center ">
                <div class="col-md-7 border">
                    <div class="card_Comment">
                        <div class="p-3 ">
                            <h6 class="fs-2">Comments</h6>
                        </div>
                        <form action="" method="post">
                            <div class="mt-3 d-flex justify-content-around align-items-center p-3 form_color_Comment">

                                {{-- <img src="" width="50" class="rounded-circle mr-2"> --}}
                                <input type="text" class="content form_control_Comment" placeholder="Enter your comment..." style="border-radius: 1rem;">

                                <span class="submit btn btn-primary btn-rounded" style="padding: 9px 35px;
                                font-size: 15px;
                                min-width: 95px;">send</span>

                            </div>
                            @csrf
                        </form>

                        <div class="mt-2" >
                            @if (Session::get('virtual'))
                            <div class="d-flex flex-row p-3 border-bottom">
                                {{-- <img src="#" width="40" height="40" class="rounded-circle mr-3"> --}}
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-row align-items-center">
                                            <span class="mr-2" id="Name">{{ Session::get('virtual')->ID_product }}</span>
                                            <small class="c-badge"></small>
                                        </div>
                                        <small>
                                        @php echo date('d-m-Y', strtotime(Session::get('virtual')->Day ))@endphp</small>
                                    </div>
                                    <p class="text-justify comment_text_Comment mb-0">{{ Session::get('virtual')->Comment }}</p>
                                    {{-- <div class="d-flex flex-row user-feed">
                <span class="wish"><i class="fa fa-heartbeat mr-2"></i>24</span>
                <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
              </div> --}}
                                </div>
                            </div>
                            @endif
                            <div id="Show">
                                @foreach ($comes as $come)
                                <div class="d-flex flex-row p-3 border-bottom">
                                    {{-- <img src="#" width="40" height="40" class="rounded-circle mr-3"> --}}
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span class="mr-2" id="Name">{{ $come->ID_product }}</span>
                                                <small class="c-badge"></small>
                                            </div>
                                            <small>@php
                                            echo date('d-m-Y', strtotime($come->Day));
                                            @endphp</small>
                                        </div>
                                        <p class="text-justify comment_text_Comment mb-0">{{ $come->Comment }}</p>
                                        {{-- <div class="d-flex flex-row user-feed">
                    <span class="wish"><i class="fa fa-heartbeat mr-2"></i>24</span>
                    <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
                  </div> --}}
                                    </div>
                                </div>
                            @endforeach
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection

@section('scripts')
@endsection
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.submit').click(function(e) {
            e.preventDefault();
            var comment = $('.content').val();
            $.ajax({
                url: "/comment",
                type: "post",
                data: {
                    comment: comment,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    $('#Show').html(response);
                }
            });
        })
    })
</script>

