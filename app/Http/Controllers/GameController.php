<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input; // add this to work Input::all()
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
            //$guess = $_POST['first_player']; change it, becouse this is best practis
            $guess = Input::get('first_player'); 
           
            
            $array_number = array_map('intval', str_split($number));
            $array_guess  = str_split($guess);
            $bull = 0;
            $cow = 0;
////            foreach ($array_guess as $value_guess) {
////                //echo $value_guess . '<br/>';
////                foreach ($array_number as $value_number) {
////
////                    //echo $value_number . '<br/>';
////                    if($value_guess == $value_number){
////                        $bull++;
////                        echo 'yes '.$value_number .' - '. $value_guess.' - '.$bull . '<br/>';
////                    } else {
////                        echo 'no '. $value_number .' - '. $value_guess.' - ' . $bull .'<br/>';
////                    }
////                }
////                echo '<br/>';
////            }
////            
////            echo '<br/>';
            foreach($array_number as $key_number => $value_number){                
                foreach ($array_guess as $key_guess => $value_guess){
                    echo "our number: $value_number - your number: $value_guess </br>";
                    if($value_guess == $value_number && $key_guess == $key_number){
                        $bull++;
                        echo "bull: $bull - $value_guess - $value_number </br>";
                    } else if($value_guess == $value_number && $key_guess != $key_number){
                        $cow++;
                        echo "cow: $cow - $value_guess - $value_number </br>";
                    }
                }
                echo '<br/>';
            }
            echo "cows: $cow bulls: $bull";
//            //echo $number;
            echo "<br/>";
            print_r($array_guess);
            
            echo '<br/>';
            print_r($array_number);
            
            $test = range(1, 9);
            $test_rand = rand(1, 9);
            $secret_number = array();
           $secret= 0;
//            for($i = 0; $i = 4; $i++ ){
//                $secret_number[$i]=rand(1,9);
//                $secret=$secret.$secret_number[$i];
//            }
//           // print_r($secret_number);
//            print_r($secret);
            
            $test_flip = array_flip($test);
            
            $test_array_rand = array_rand($test_flip, 4);
            
            echo '<br/>RANGE';
            print_r($test);
            echo '<br/>rand';
            print_r($test_rand);
            echo '<br/> ARRAY_FLIP';
            print_r($test_flip);
            echo '<br/>';
            print_r($test_array_rand);
            echo '<br/>';
            
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
