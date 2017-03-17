@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Tournament
                        <?php $tempType = $tournament->description; ?>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{route('tournament.update',$tournament->id)}}" method="post">
                            <input name="_method" type="hidden" value="PATCH">
                            {{csrf_field()}}
                            <div class="form-group{{ ($errors->has('title')) ? $errors->first('title') : '' }}">
                                <input type="text" name="title" class="form-control" placeholder="Match name" value="{{$tournament->title}}">
                                {!! $errors->first('title','<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ ($errors->has('description')) ? $errors->first('description') : '' }}">
                                {{--<textarea name="description" class="form-control" placeholder="Enter Description Here">{{$tournament->description}}</textarea>--}}
                                <select name="description" class="form-control">
                                    @if($tempType == 'All-random')
                                        <option value="All-pick">All-pick</option>
                                        <option value="All-random" selected>All-random</option>
                                        <option value="Captain-mode">Captain-mode</option>
                                    @elseif($tempType == 'Captain-mode')
                                        <option value="All-pick">All-pick</option>
                                        <option value="All-random">All-random</option>
                                        <option value="Captain-mode" selected>Captain-mode</option>
                                    @else
                                        <option value="All-pick">All-pick</option>
                                        <option value="All-random">All-random</option>
                                        <option value="Captain-mode">Captain-mode</option>
                                    @endif
                                </select>
                                {!! $errors->first('description','<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ ($errors->has('date')) ? $errors->first('date') : '' }}">
                                <input type="date" name="date" class="form-control" value="{{$tournament->date}}">
                                {!! $errors->first('date','<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection