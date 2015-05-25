<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input; // add this to work Input::all()

use App\Game;
use App\GuessNumber;
class GameController extends Controller {
    
    
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
            $game->secret_number = $secret_number;
            $game->save();
            $game_id = $game->id;
            
            return view('singleplayer')->with('game_id', $game_id);
        }

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
            $game_id = Input::get('game_id');
            $guess_number = Input::get('first_player'); 
            $game = Game::find($game_id); 
            $secret_number = $game->secret_number;
            
            $array_number = array_map('intval', str_split($secret_number));
            $array_guess  = str_split($guess_number);
            $bull = 0;
            $cow = 0;
            
            
            foreach($array_number as $key_number => $value_number){                
                foreach ($array_guess as $key_guess => $value_guess){                    
                    if(($value_guess == $value_number) && ($key_guess == $key_number)){
                        $bull++;                        
                    } else if(($value_guess == $value_number) && ($key_guess != $key_number)){
                        $cow++;                       
                    }
                }
            }
                        
            $guess = New GuessNumber;  
            $guess->saveGuess($game_id, $guess_number, $bull, $cow);      
            if($bull == 4){
                return view('win_game')->with('game', $game);
            } else{
                return view('singleplayer_game')->with('game', $game);
            }
	}
	

}
