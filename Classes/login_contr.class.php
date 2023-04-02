<?php
  
class LoginContr extends Login{

  private  $Email;
  private  $Password;


  public function  __construct($email, $password){
    $this->Email = $email;
    $this->Password = $password;
  }

  public function loginuser(){
    $this->getUser($this->Email, $this->Password);
  }
  

}