<?php
namespace App;

class Username
{
    private $username;

    public function setUsername($username='')
    {
        $this->username = $username;
    }

    public function get_strength(){
        $strength = 0;
        if(preg_match('/[A-Za-z]/', $this->username)){
            // LETTER FOUND
            $strength +=1;
        }

        if(strlen($this->username)>5 ){
            //MEET MINIMUM LENGTH
            $strength += 1;
        }
        return $strength;
    }

}