<?php 
   //configuration
   require("../includes/config.php");
   
   //if form was submitted 
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      //Check if user input anything
      if(empty($_POST["amount"]))
      {
         apologize("You have to specify how much money you want to deposit");
      }
      
      else
      {
         $id = $_SESSION["id"];
         $amount = $_POST["amount"];
         
         //If amount is not valid
         if($amount<= 0 || !is_numeric($amount))
          {
             apologize("Not a valid amount");
          }
                        
         else
         {
                     
            // Update cash
            CS50::query("UPDATE users SET cash = cash + $amount WHERE id = $id");
            
            //Insert into history table for transaction
            CS50::query("INSERT INTO history (user_id,status,price)
            VALUES ($id, 'DEPOSIT',$amount)");
            
            //render display message
            render("deposit.php", ["title" => "Deposit", "amount" => $amount]);
         }
      }
  }
  
  else
  {
      // render form             
      render("deposit_form.php",["title" => "Deposit"]);
  }
  
?>        
                 
         
