@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">
                                Date : {{ $send_tournament->date }}
                                <br>
                                <b>{{ $send_tournament->title }}</b>
                            </div>
                            <div class="col-md-4" align="right">
                                Type : {{ $send_tournament->description }}
                                <br>
                                <a href="{{ url('detail/'.$send_tournament->id) }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <?php $no=1; ?>
                            @foreach($send_users as $player)
                                <tr>
                                    <td>{{$no++}}. {{ $player->name }}</td>
                                    <td>{{ $player->email }}</td>
                                    <td align="right"><a href="{{ url('add_match_player_action/'.$send_tournament->id.'/'.$player->id) }}" class="text-primary">Add</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection