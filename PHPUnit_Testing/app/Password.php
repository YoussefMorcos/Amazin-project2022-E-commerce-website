<?php
namespace App;

use InvalidArgumentException;

class Password
{
    private $password;
    public function setPassword($password = "")
    {
        $this->password = $password;
    }

    public function validate(){
        if(strlen($this->password) < 8){
            throw new InvalidPasswordException();
        }
        if($this->get_strength() == 0){
            throw new InvalidPasswordException();
        }
        if($this->get_strength() == 1){
            throw new InvalidPasswordException();
        }
        if($this->get_strength() == 2){
            throw new InvalidPasswordException();
        }
    }

    public function get_strength(){
        $strength = 0;
        if(preg_match('/[A-Z]/', $this->password)){
            // CAPITAL LETTER FOUND
            $strength +=1;
        }
        if(preg_match('/[0-9]/', $this->password)){
            // DIGIT FOUND
            $strength += 1;
        }
        if(strlen($this->password)>=8 ){
            //MEET MINIMUM LENGTH
            $strength += 1;
        }
        return $strength;
    }
}

class InvalidPasswordException {
    public function errorMessage()
    {
       //INVALID
       $errorMsg = 'Invalid password.';
       return $errorMsg;
    }
}