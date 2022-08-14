@extends('layouts.layout_admin')
@section('title')
    Contact Of Customer
@endsection
@section('body')
@if (count($contact) > 0)
@php
   $i = 1
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Contact List</h4>
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
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Content
                          </th><th>
                            Status
                          </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $contact as $conta )
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$conta->Name}}
                        </td>
                        <td>
                            {{$conta->Email}}
                        </td>
                        <td>
                            {{$conta->Phone}}
                        </td>
                        <td>
                            {{$conta->Content}}
                        </td>
                        <td>
                            <a href="/admin/feedback/{{$conta->ID_contact}}" class="btn btn-success">Feedback</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {!! $contact->links() !!}
      </div>
    </div>
@else
<h1>No result</h1>
@endif
@endsection
@section('scripts')
@endsection
