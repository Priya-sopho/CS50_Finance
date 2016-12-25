<?php 
 
 //configuration
 require('../includes/config.php');
 
 //if user reach page via GET i.e. by clicking the link or redirect
  if($_SERVER["REQUEST_METHOD"]== "GET")
   {
      //then render to register.php
      render("register_form.php",["title"=>"register"]);
   }
      
  
  //if user reach form via POST (submitting form via post)
  else if($_SERVER["REQUEST_METHOD"]=="POST")
  {  
     //Validate user input for register form
     if(empty($_POST["username"])||empty($_POST["password"])||$_POST["password"]!=$_POST["confirmation"])
      {
          if(empty($_POST["username"]))
            {
               apologize("Username is required");
            }
         if(empty($_POST["password"]))
            {
               apologize("Password is required");
            }      
         if(empty($_POST["password"])!= $_POST["confirmation"])
            {
               apologize("Comfirm password doesn't match password");
            }
         
       }
     else 
     {
        // If username already exists
       if(CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES (?, ?, 10000.0000)",$_POST["username"],crypt($_POST["password"]))=== false)
        {
           apologize("Username already exist");
               
        }
        
        else
        {
           //new user inserted into database
           $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
           $id = $rows[0]["id"];
           $_SESSION["id"]= $id;
           redirect("index.php");
         }
      }         
  }
  
 ?> 
  
