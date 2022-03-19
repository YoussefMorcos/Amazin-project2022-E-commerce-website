<?php
namespace App;

use function PHPUnit\Framework\throwException;

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
