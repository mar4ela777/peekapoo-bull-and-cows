@extends('app')

@section('head')
    @parent
    <title>Peecapoo Game Bulls and Cows</title>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Добре дошли в Peecapoo Game Bulls and Cows</div>

                <div class="panel-body image-backgraund">
                    <div>
                        <h1>
                            Изберете Игра
                        </h1>
                    </div>
                    <ul>
                        <li>
                            <h2>
                            <a class="btn btn-link" href="{{ url('/multiplayer') }}">Multiplayer</a>
                            </h2>
                        </li>
                        <li>
                            <h2>
                             <a class="btn btn-link" href="{{ url('/singleplayer') }}">Singleplayer</a>
                            </h2>
                        </li>
                    </ul>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--
<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			{{--<div class="content">--}}
				{{--<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }} {{--</div>
			</div>--}}
                    <div>
                        <h1>
                            This is the Peecapoo Game Bull and Cows
                        </h1>
                    </div>
                    
                        <div>
                            {!! Form::open([]) !!} 
                                {!! Form::text('number', null, array('placeholder'=>'Моля, въведете вашето число'), Input::old('number')) !!}
                                {!! Form::submit('Опитай') !!}
                            {!! Form::close() !!} 
                        </div>
                    <br />
                        <div>
                            <h2>
                                Вашите предположения:
                            </h2>
                        </div>                
                        <div>
                            <h2>
                                Вашия Резултат:
                            </h2>
                        </div>      
		</div>
	</body>
</html>-->
