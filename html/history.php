<?php
  //configuration
    require("../includes/config.php");
    
    $id = $_SESSION["id"];
    
    //Retrieve transaction from history table orderd by date
    $history = CS50::query("SELECT symbol, status, shares, price, date FROM history
                            WHERE user_id = $id ORDER BY date DESC");
    
    //render history page
    render("history.php",["title"=> "History", "history" => $history]);
 ?>                           
