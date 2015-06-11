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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/singleplayer') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="game_id" value="{{ $game_id }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Вашето предположение:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="player" autofocus="on" value="{{ old('player') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Опитай</button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

@stop