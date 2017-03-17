@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            List Match
                        </div>
                        <div class="col-md-6" align="right">
                            <a href="{{route('tournament.create')}}">Add Match</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <br>
                    @foreach($send_tournaments as $tournament)
                        <div class="row">
                            <div class="col-md-9">
                                <a href="{{url('detail/'.$tournament->id)}}">{{$tournament->title}}</a>
                            </div>
                            <div class="col-md-3" align="center">
                                <form class="" action="{{route('tournament.destroy',$tournament->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="{{route('tournament.edit',$tournament->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this match?');" name="name" value="Delete">
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
