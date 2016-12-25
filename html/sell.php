<?php 
   //configuration
   require("../includes/config.php");
   
   //if form was submitted 
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
      //Check if user input anything
      if(empty($_POST["stock"]))
      {
         apologize("You have to specify which stock to sell");
      }
      
      else
      {
         $id = $_SESSION["id"];
         $stock = $_POST["stock"];
         $shares = CS50::query("SELECT shares FROM portfolio WHERE user_id = $id AND symbol = '$stock'");
          
         //if user doesn't own input stock,error message
         if(!$shares)
         {
           apologize("You don't have any shares of this stock");
         } 
         
         else
         {
            $value = lookup($stock);
            $shares = $shares[0]["shares"];
            $price = $value["price"];
            $profit = $shares*$price;
         
         
            //Delete the stock from portfolio
            CS50::query("DELETE FROM portfolio WHERE user_id = $id AND symbol = '$stock'");
          
            // Update cash
            CS50::query("UPDATE users SET cash = cash + $profit WHERE id = $id");
            
            //Insert into history table for transaction
            CS50::query("INSERT INTO history (user_id, symbol, status, shares, price)
            VALUES ($id, '$stock', 'SELL', $shares, $price)");
            
            //render display sold stock
            render("sell.php", ["title" => "Sell", "value" => $value, "profit" => $profit]);
         }
      }
  }
  
  else
  {
      // render form             
      render("sell_form.php",["title" => "sell"]);
  }
  
?>        
                 
         
