<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GuessNumber extends Model {
        
        protected $table = 'guess_numbers';
        
	public function game()
        {
            return $this->belongsTo('App\Game');
        }
        
        public function saveGuess($game_id, $guess_number, $bull, $cow) {
            $guess = new GuessNumber;
            $guess->game_id = $game_id;
            $guess->guess_number = $guess_number;
            $guess->bulls = $bull;
            $guess->cows = $cow;
            $guess->save(); 
        }

}
