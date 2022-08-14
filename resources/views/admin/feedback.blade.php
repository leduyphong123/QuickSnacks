@extends('layouts.layout_admin')
@section('title')
    Feedback
@endsection
@section('body')
    <form action="/admin/send-contact" method="post">
        @csrf
        @foreach ($contact as $conta)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    Send for email:
                    {{ $conta->Email }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    Feedback content for customers:
                    <input class=" form-control" name="feedbackContent" id="feedbackContent">
                </div>
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn btn-success">Feedback</button>
    </form>

@endsection
@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
    {{-- <script>
        CKEDITOR.replace('feedbackContent', {
            filebrowserBrowseUrl: "{{ route('ckfinder_browser') }}"
        });
    </script> --}}
    @include('ckfinder::setup')
@endsection

