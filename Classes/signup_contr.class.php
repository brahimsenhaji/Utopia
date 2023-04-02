<?php
  
class SignupContr extends Signup{

  private  $Name;
  private  $Email;
  private  $Phone;
  private  $Password;

  public function  __construct($name,  $email, $phone, $password){

    $this->Name = $name;
    $this->Email = $email;
    $this->Phone = $phone;
    $this->Password = $password;
  }

  public function signupuser(){
    if($this->ch() == true){
        header("Location: ..index.php?nameORemail=taken");
        exit();
    }

    $this->setUser($this->Name, $this->Email, $this->Phone ,$this->Password );
  }
  
  //check if the name or email taken alraedy
  private function ch(){
    $ruselt = false;

    if(!$this->CheckUser($this->Name , $this->Email)){
        $ruselt = false;
    }else{
        $ruselt = true;
    }
    return $ruselt;
  }

}