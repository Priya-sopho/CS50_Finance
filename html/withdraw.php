<?php 
   //configuration
   require("../includes/config.php");
   
   //if form was submitted 
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      //Check if user input anything
      if(empty($_POST["amount"]))
      {
         apologize("You have to specify how much money you want to withdraw");
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
            //Check cash 
            $cash=CS50::query("SELECT cash FROM users WHERE id = $id");
            if($cash[0]["cash"] < $amount)
            {
               apologize("Balance is less than withdrawn promt amount \n Transaction declined");
            }
            
            else   
            {
                     
            // Update cash
            CS50::query("UPDATE users SET cash = cash - $amount WHERE id = $id");
            
            //Insert into history table for transaction
            CS50::query("INSERT INTO history (user_id,status,price)
            VALUES ($id, 'WITHDRAW',$amount)");
            
            //render display message
            render("withdraw.php", ["title" => "Withdraw", "amount" => $amount]);
            } 
         
       }
         
      }
  }
  
  else
  {
      // render form             
      render("withdraw_form.php",["title" => "Withdraw"]);
  }
  
?>        
                 
         
