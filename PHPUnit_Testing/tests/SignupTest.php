<?php


class SignupTest extends \PHPUnit\Framework\TestCase
{
    //USERNAME VALIDATION
    public function test_Username_Validation()
    {
   
        $usrn = new App\Username;

        //HIGH -- STRENGTH = 2 ->Letter+length>5
        $usrn->setUsername('Amazin123');
        $strength = $usrn->get_strength();

        $this->assertEquals(2,$strength);

        //WEAK -- STRENGTH = 1 ->lengh+digit
        $usrn->setUsername('111111');
        $strength = $usrn->get_strength();

        $this->assertEquals(1,$strength);

        //WEAK -- STRENGTH = 1 -> only letter less than 5
        $usrn->setUsername('ama');
        $strength = $usrn->get_strength();

        $this->assertEquals(1,$strength);

        //WEAK -- STRENGTH = 0 ->
        $usrn->setUsername('');
        $strength = $usrn->get_strength();

        $this->assertEquals(0,$strength);
   }

    //EMAIL VALIDATION
    public function test_Email_Validation()
    {
   
      $mail = new App\Email;
      $mailconf = new App\Email;

      //IDENTICAL EMAIL
      $mail->setEmail("Amazin@example.com");
      $mailconf->setEmailConfirmation("Amazin@example.com");
      $this->assertTrue(true);

       //NOT IDENTICAL EMAIL
       $mail->setEmail("Amazin@example.com");
       $mailconf->setEmailConfirmation("Ama@example.com");
       $this->assertNotTrue(false);
   }

   //PASSWORD VALIDATION
   public function test_Password_Validation()
   {
   
      $pwd = new App\Password;

        //HIGH -- STRENGTH = 3 ->Cap+digit+length>=8
        $pwd->setPassword('Amazin123');
        $strength = $pwd->get_strength();

        $this->assertEquals(3,$strength);

        //MEDIUM -- STRENGTH = 2 ->Cap+length>=8
        $pwd->setPassword('Amaziiin');
        $strength = $pwd->get_strength();

        $this->assertEquals(2,$strength);

        //WEAK -- STRENGTH = 1 ->lengh
        $pwd->setPassword('amaziiin');
        $strength = $pwd->get_strength();

        $this->assertEquals(1,$strength);

        //INVALID -- STRENGTH = 0 ->NOTHING
        $pwd->setPassword('ama');
        $strength = $pwd->get_strength();

        $this->assertEquals(0,$strength);
    }
}