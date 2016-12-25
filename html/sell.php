<?php 
   //configuration
   require("../includes/config.php");
   
   //if form was submitted 
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
       //validate form
      if(empty($_POST["stock"]) || empty($_POST["shares"]) || !preg_match("/^\d+$/",$_POST["shares"]) || ($_POST["shares"]<0))
      {
          
         if (empty($_POST["stock"]))  
          {
             apologize("You have to specify which stock to buy");
          }
          
         else if (empty($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]) || ($_POST["shares"]<0))
         {
             apologize("You have to specify whole amounts of shares");
         
         }
      }
      else
      {
         $id = $_SESSION["id"];
         $stock = strtoupper($_POST["stock"]);
         $shares = CS50::query("SELECT shares FROM portfolio WHERE user_id = $id AND symbol = '$stock'");
          
         //if user doesn't own input stock,error message
         if(!$shares)
         {
           apologize("You don't have any shares of this stock");
         }
         else if($shares[0]["shares"] < $_POST["shares"])
         {
           apologize("You have not enough share to sell. Transaction declined");
         }
 
         else
         {
            $value = lookup($stock);
            $share_present = $shares[0]["shares"];
            $shares = $_POST["shares"];
            $price = $value["price"];
            $profit = $shares*$price;
            $share_present -= $shares;
         
            if($share_present) 
            {
              //Update shares
              CS50::query("UPDATE portfolio SET shares = $share_present 
                  WHERE user_id = $id AND symbol = '$stock'");
            }
            
            else
            {
               //Delete the stock from portfolio
              CS50::query("DELETE FROM portfolio WHERE user_id = $id AND symbol = '$stock'");
            
            }
            
          
            // Update cash
            CS50::query("UPDATE users SET cash = cash + $profit WHERE id = $id");
            
            //Insert into history table for transaction
            CS50::query("INSERT INTO history (user_id, symbol, status, shares, price)
            VALUES ($id, '$stock', 'SELL', $shares, $price)");
            
            //render display sold stock
            render("sell.php", ["title" => "Sell", "value" => $value, "profit" => $profit, "shares" => $shares]);
         }
      }
  }
  
  else
  {
      // render form             
      render("sell_form.php",["title" => "sell"]);
  }
  
?>        
                 
         
