@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $community->name }}
                        <a class="btn btn-outline-dark btn-sm d-inline-block float-end" href="{{route('communities.index')}}">Dashboard</a>
                    </div>

                    <div class="card-body">
                        sdsd..
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
