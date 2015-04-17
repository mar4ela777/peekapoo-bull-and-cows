<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GameController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function multiplayerIndex()
	{
            return view('multiplayer');
	}
        
        public function singleplayerIndex()
	{
            return view('singleplayer');
	}
        
        public function singleplayerPost()
	{
            $number = 1234;
            $guess = $_POST['first_player'];
            //$all = Request::all();
            $array_number = array_map('intval', str_split($number));
            $array_guess  = array_map('intval', str_split($guess));
            $bull = 0;
            foreach ($array_guess as $value_guess) {
                //echo $value_guess . '<br/>';
                foreach ($array_number as $value_number) {

                    //echo $value_number . '<br/>';
                    if($value_guess == $value_number){
                        $bull++;
                        echo 'yes '.$value_number .' - '. $value_guess.' - '.$bull . '<br/>';
                    } else {
                        echo 'no '. $value_number .' - '. $value_guess.' - ' . $bull .'<br/>';
                    }
                }
                echo '<br/>';
            }
            
            echo '<br/>';
            
            
            //echo $number;
            echo "<br/>";
            print_r($array_guess);
            
            echo '<br/>';
           // print_r($array_number);
            
            
//            if($number == $guess){
//                echo "<br/>";
//                echo '4 bulls';
//            } else{
//                
//                echo "<br/>";
//                echo 'sorry';
//            }
            
            //print_r($all);
            //return view('singleplayer');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
