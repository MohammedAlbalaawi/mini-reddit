@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    {{ __('My Communities') }}
                    <a class="btn btn-outline-dark btn-sm d-inline-block float-end" href="{{route('communities.index')}}">Dashboard</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('communities.create')}}" class="btn btn-primary btn-sm">New Community</a>
                        <br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($communities as $community)
                                <tr>
                                    <td>
                                        <a href="{{route('communities.show',$community)}}">{{$community->name}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('communities.edit',$community)}}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('communities.destroy',$community) }}" method="POST"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Delete
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
