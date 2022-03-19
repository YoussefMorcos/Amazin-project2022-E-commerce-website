<?php
namespace App;

use InvalidArgumentException;

//USERNAME VALIDATION
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

//EMAIL VALIDATION
class Email
{
  private $email;
  private $emailconfirmation;
    public function setEmail($email = "")
    {
        $this->email = $email;
    }

    public function setEmailConfirmation($emailconfirmation = "")
    {
        $this->emailconfirmation = $emailconfirmation;
    }

    public function validate_email()
    {
        //EQUAL
        if((strcmp($this->email, $this->emailconfirmation)) == 0){
            return true;
        }
        //NOT EQUAL
        if((strcmp($this->email, $this->emailconfirmation)) < 0){
            return false;
        }
        //NOT EQUAL
        if((strcmp($this->email, $this->emailconfirmation)) > 0){
            return false;
        }   
    }
}

//PASSWORD VALIDATION
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