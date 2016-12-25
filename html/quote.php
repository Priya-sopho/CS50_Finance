<?php 
  //configuration
  require("../includes/config.php");
  
   //if form was submitted
   if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       
       $_POST = lookup($_POST["symbol"]);
       
       //if symbol doesn't exist
       if($_POST === false )
       {
         apologize("No such stock available");
       }
       
       else
       render("quote.php", ["title"=> "Quote"]);
    }
   
   else
   {
       //render quote_form
       render("quote_form.php",["title"=>"Quote"]);
    }         
       
?>       
