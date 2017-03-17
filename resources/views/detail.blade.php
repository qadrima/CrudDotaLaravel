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
                                <a href="{{ url('add_match_player/'.$send_tournament->id) }}">Add Player</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <label>Players : </label>
                        <table class="table table-striped">
                            <?php $no=1; ?>
                            @foreach($send_players as $player)
                                    <tr>
                                        <td>{{$no++}}. {{ $player->name }}</td>
                                        <td>{{ $player->email }}</td>
                                        <td align="right"><a href="{{ url('delete_match_player/'.$send_tournament->id.'/'.$player->id) }}" class="text-danger" onclick="return confirm('Are you sure to delete this player?');">Delete</a></td>
                                    </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection