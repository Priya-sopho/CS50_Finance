<?php

    // configuration
    require("../includes/config.php"); 
    
    $id = $_SESSION["id"];
    
    //Retrieve all shares for current user
    
     $rows = CS50::query("SELECT user_id, symbol, shares FROM portfolio WHERE user_id = $id ");
     
     //Position array to store information about share
     $positions = [];
     
     foreach($rows as $row)
      {
        $stock = lookup($row["symbol"]);
        
        if($stock !== false)
         {
            $positions[] = [ "name" => $stock["name"],
                             "price" => $stock["price"],
                             "shares" => $row["shares"],
                             "symbol" => $row["symbol"],
                             "total" => sprintf("%.2f",$row["shares"]*$stock["price"])
                            ];
         }
       }
       
     
     //User other details
    $cash = CS50::query("SELECT username, cash FROM users WHERE id = $id");                           

    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "cash"=> $cash]);

?>
