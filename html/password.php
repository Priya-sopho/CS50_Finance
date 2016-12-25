<?php 
 
 //configuration
 require('../includes/config.php');
 
  //if user reach form via POST (submitting form via post)
 if($_SERVER["REQUEST_METHOD"]=="POST")
  {  
     //Validate user input for register form
     if(empty($_POST["password"])||empty($_POST["confirmation"])||$_POST["password"]!= $_POST["confirmation"])
      {
          //Validate submission 
          if(empty($_POST["password"]))
            {
               apologize("Password is required");
            }
          
          if(empty($_POST["confirmation"]))
            {
               apologize("Confirmation is required");
            }
            
                  
         if(empty($_POST["password"])!= $_POST["confirmation"])
            {
               apologize("Comfirm password doesn't match password");
            }
         
       }
     else 
     {
        
          // create new encrypted password
          $hash = crypt($_POST["password"]);
          $id = $_SESSION["id"];
          
          //Update user account with new password
           CS50::query("UPDATE users SET hash = '$hash' WHERE id= $id");
           
          //render password.php
          render("password.php");
      }
      
  }
  
  
 
   //if user reach page via GET i.e. by clicking the link or redirect   {
      //then render to register.php
 else
 {
       
       render("change_password.php",["title"=>"Password"]);
      
  }
      
  
 ?> 
  
