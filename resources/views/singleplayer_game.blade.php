@extends('app')

@section('head')
    @parent
    <title>Single Player Peecapoo Game Bull and Cows</title>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Вашето предположение</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/singleplayer') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="game_id" value="{{ $game->id }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Вашето предположение:</label>
                            <div class="col-md-6">
                                <input type="first_player" class="form-control" name="first_player" value="{{ old('first_player') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Опитай</button>
                            </div>
                        </div>
                    </form>
                    <div>
                        <table>
                            <thead>
                                <th>Вашето предположение</th>
                                <th>Бикове и крави</th>
                            </thead>
                            <tbody>
                                @foreach($game->guessNumber as $key => $value)
                                <tr>
                                    <td>{{$value->guess_number}}</td>
                                    <td>Бикове: {{$value->bulls}} Крави: {{$value->cows}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@stop