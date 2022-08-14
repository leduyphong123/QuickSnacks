@extends('layouts.layout_admin')
@section('title')
    Comment Of Customer
@endsection
@section('body')

@if (count($comes) > 0)
@php
   $i = 1;
@endphp

<div class="row">
    <div class="col-md-12">
<form action="/admin/comment/delete" method="post">
    @csrf
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Comment List</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover border='1' ">
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
                            Name Customer
                          </th>
                          <th>
                            Comment
                          </th>

                          <th>
                            Day
                          </th>
                          <th>
                            Status
                          </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $comes as $come )
                    <tr><td><input type="checkbox" name="ids[{{$come->Id_comment}}]" value="{{$come->Id_comment}}" class="checkbox"></td>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$come->NameProduct}}
                        </td>
                        <td>

                            {{$come->username}}

                        </td>
                        <td>
                            {{$come->Comment}}
                        </td>
                        <td>
                            @php
                            echo date('d-m-Y', strtotime($come->Day));
                            @endphp
                        </td>
                        @if ($come->Accept==1)
                        <td>
                            <a href="/admin/checkCommentNo/{{$come->Id_comment}}" class="btn btn-danger" name="checkCome">No Access</a>
                        </td>

                        @else
                        <td>
                            <a href="/admin/checkComment/{{$come->Id_comment}}" class="btn btn-success" name="checkCome">Accept</a>
                        </td>
                        @endif
                    </tr>

                    @endforeach
                </tbody>
              </table>

            </div>

            <button type="submit" class="btn btn-danger" value="delete" >DELETE</button>

          </div>

        </div>

    </form>
        {!! $comes->links() !!}
      </div>
    </div>



@else
<h1>No result</h1>
@endif
@endsection
@section('scripts')

@endsection

<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
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
