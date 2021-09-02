<?php

class Validation{
    //Declare form input variables
    public $firstName;
    public $lastName;
    public $email;

    //Constructor fn
    public function __contruct($firstName,$lastName,$email){
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
    }

    //Validate Name
    public function validateName(){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$this->firstName) || 
            !preg_match("/^[a-zA-Z-' ]*$/",$this->lastName)
            ){
            return false;
        }
        return true;
    }

    //Validate email
    public function validateEmail(){
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

}




?>