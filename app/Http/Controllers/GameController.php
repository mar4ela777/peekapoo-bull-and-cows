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
            $game->createGame($secret_number);
            
            return view('singleplayer')->with('game_id', $game->game_id);
        }
        
        public function newMultiplayer(){
            $secret_number = Input::get('first_player'); 
            $game = New Game;
            $game->saveGame($secret_number);
            return view('multiplayer')->with('game_id', $game->game_id);
        }
        
        public function multiplayerPost() {
            $game_id = Input::get('game_id');
            $guess_number = Input::get('second_player'); 
            
            $guess = New GuessNumber;  
            
            $guess->checkGuess($game_id, $guess_number);
            
            $guess->saveGuess($game_id, $guess_number, $guess->bull, $guess->cow);    
            
            if($guess->bull == 4){
                return view('win_game')->with('game', $guess->game);
            } else{
                return view('singleplayer_game')->with('game', $guess->game);
            }
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
