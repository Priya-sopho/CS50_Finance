<?php 
   //configuration
   require("../includes/config.php");
   
   //if form was submitted 
   if($_SERVER["REQUEST_METHOD"] == "POST")
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
          
          $symbol = strtoupper($_POST["stock"]);
          
          $stock = lookup($symbol);
          
          //If input stock desn't exist
          if($stock === false)
           {
              apologize($symbol." doesn't exist.");
           }
          else
          {
             $id = $_SESSION["id"];
             $shares = $_POST["shares"];
             $price = $stock["price"];
             $cash = Cs50::query("SELECT cash FROM users WHERE id = $id");
             $cost = $price*$shares;
             
             //if cost is more than present cash
             if($cash[0]["cash"]< $cost)
              {
                 apologize("You don't have enough money to buy ". $shares . " shares of ". $symbol);
              }
             else
             {
                //Insert shares detail in portfolio.
                CS50::query("INSERT INTO portfolio (user_id, symbol, shares) VALUES ($id, '$symbol', $shares)
               ON DUPLICATE KEY UPDATE shares = shares + $shares ");
                
                //Deduct cost from cash
                CS50::query("UPDATE users SET cash = cash - $cost WHERE id = $id");
                
                //render buy.php to display purchase
                render("buy.php", ["title" => "Buy", "stock" => $stock, "cost" => $cost, "shares" => $shares]);
                
             }
                
            }             
       }
  }
    
 else
 {
    // render buy form 
    render("buy_form.php", ["title" => "buy"]);
 }
 
 ?>
        
    
    

