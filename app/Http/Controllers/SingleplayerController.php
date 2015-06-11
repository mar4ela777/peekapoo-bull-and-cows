<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input; 

use App\Game;
use App\GuessNumber;

use \Validator, \Redirect;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Support\Facades\Session;

class SingleplayerController extends Controller {
    
        /*
         * Create new singleplayer game
         */
        public function newSingleplayer() {
            // create array 1 to 9
            $range_array = range(1, 9);           
            // flip array
            $array_flip = array_flip($range_array);

            // create our secret number
            $secret_number = implode(array_rand($array_flip, 4));
            
            //save secret number in 
            $game = New Game;
            $game->saveGame($secret_number);
            
            return view('singleplayer')->with('game_id', $game->game_id);
        }
                        
        
        public function singleplayerIndex()
	{
            return view('singleplayer');
	}
      
        public function singleplayerPost()
	{          
            
            $game_id = Input::get('game_id');
            $guess_number = Input::get('player'); 
            
            $validator = Validator::make(Input::all(), Game::$rules, Game::$errors_message);
            
            if ($validator->fails()){                
                return Redirect::to('singleplayer-mistake')->withErrors($validator)->withInput();
            } else{
                $guess = New GuessNumber;  
            
                $guess->checkGuess($game_id, $guess_number);

                $guess->saveGuess($game_id, $guess_number, $guess->bull, $guess->cow);                

                if($guess->bull == 4){
                    return view('win_game')->with('game', $guess->game);
                } else{
                    return view('singleplayer_game')->with('game', $guess->game);
                }
            }

	}
	       
}
