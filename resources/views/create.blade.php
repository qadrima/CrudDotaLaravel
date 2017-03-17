@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Match
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{route('tournament.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group{{ ($errors->has('title')) ? $errors->first('title') : '' }}">
                                <input type="text" name="title" class="form-control" placeholder="Match name">
                                {!! $errors->first('title','<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ ($errors->has('description')) ? $errors->first('description') : '' }}">
                                {{--<textarea name="description" class="form-control" placeholder="Enter Description"></textarea>--}}
                                <select name="description" class="form-control">
                                    <option value="All-pick">All-pick</option>
                                    <option value="All-random">All-random</option>
                                    <option value="Captain-mode">Captain-mode</option>
                                </select>
                                {!! $errors->first('description','<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ ($errors->has('date')) ? $errors->first('date') : '' }}">
                                <input type="date" name="date" class="form-control" placeholder="Enter Date">
                                {!! $errors->first('date','<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection