<?php
$emailErrorMsg="";
$passwordErrorMsg="";

if(isset($_POST["submit"])){
    $emailValue =$_POST["emailName"];
    $passwordValue =$_POST["passName"];
    if($emailValue == ""){
        $emailErrorMsg="email must be filled out!";
    }else if(preg_match("/w+(@emsi.ma){1}$/",$emailValue==0)){
        $emailErrorMsg="please enter a valid emsi email";
    
    }else if($passwordValue == ""){
        $passwordErrorMsg="password must be filled out !";
        
    }else{
        header("Location:home.php");}
}
?>