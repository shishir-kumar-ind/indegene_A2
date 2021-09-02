<?php

class Validation{
    //Declare form input variables
    public $firstName;
    public $lastName;
    public $email;
    public $fileSize;
    public $extensions;
    public $errors=[];

    //Constructor fn
    public function __construct($post,$file){
        $this->firstName=$post['firstName'];
        $this->lastName=$post['lastName'];
        $this->email=$post['email'];
        $this->fileSize=$file['filesTobeUploaded']['size'];
        $this->extensions=explode('.',$file['filesTobeUploaded']['name'])[1];
    }

    //Validate First Name
    public function validateFName(){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$this->firstName)){
            return FALSE;
        }
        return TRUE;
    }

    //Validate Last Name
    public function validateLName(){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$this->lastName)){
            return FALSE;
        }
        return TRUE;
    }

    //Validate email
    public function validateEmail(){
        return TRUE;
        // if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        //     return FALSE;
        // }
        // return TRUE;
    }

    //Validate file size
    public function validateFile(){
        if(!in_array($this->extensions,['pdf','txt','docx'])){
            array_push($this->errors,"Please upload in pdf, txt or docx format !");
        }
        if($this->fileSize>(2*1024*1024)){
            array_push($this->errors,"Maximum limit of 2MB exceeded!");
        }
        return $this->errors;
    }

}




?>