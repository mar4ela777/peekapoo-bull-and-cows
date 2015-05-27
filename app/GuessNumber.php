<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GuessNumber extends Model {
        
        protected $table = 'guess_numbers';
        public $bull = 0;
        public $cow = 0;
        public $game = 0;
        
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
        
        public function checkGuess($game_id, $guess_number){
            $this->game = Game::find($game_id); 
            $secret_number = $this->game->secret_number;
            
            $array_number = array_map('intval', str_split($secret_number));
            $array_guess  = str_split($guess_number);
            
            foreach($array_number as $key_number => $value_number){                
                foreach ($array_guess as $key_guess => $value_guess){                    
                    if(($value_guess == $value_number) && ($key_guess == $key_number)){
                        $this->bull++;                        
                    } else if(($value_guess == $value_number) && ($key_guess != $key_number)){
                        $this->cow++;                       
                    }
                }
            }
            
        }

}
