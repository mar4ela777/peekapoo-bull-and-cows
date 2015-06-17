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
                <div class="panel-heading">Ти победи!!!</div>
                <div class="panel-body">                                  
                    <div>
                        <table>
                            <thead>
                                <th>Вашето предположение</th>
                                <th>Бикове</th>
                                <th>Крави</th>
                            </thead>
                            <tbody>
                                @foreach($game->guessNumber as $guess)
                                <tr>
                                    <td>{{$guess->guess_number}}</td>
                                    <td>{{$guess->bulls}}</td>
                                    <td>{{$guess->cows}}</td>
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