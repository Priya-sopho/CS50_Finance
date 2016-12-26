<!-- This displays current balance and shares -->
<div>
    
    <div id="message">
       <?php 
           print("Hii! ".$cash[0]["username"].".");
           print("Your current balance is $".sprintf("%.2f",$cash[0]["cash"]));
           print("<br>"."Your shares: ");
        ?>
    </div>
    
    <table id="overview">
      <?php
         print("<tr>");
           print("<th>Name</th>");
           print("<th>Symbol</th>");
           print("<th>Shares</th>");
           print("<th>Price</th>");
           print("<th>Total value</th>");
         print("</tr>");
         
         foreach ($positions as $pos)
         {
           print("<tr>");
              print("<td>".$pos["name"]."</td>");
              print("<td>".$pos["symbol"]."</td>");
              print("<td>".$pos["shares"]."</td>");
              print("<td>"."$".$pos["price"]."</td>");
              print("<td>"."$".$pos["total"]."</td>");
           print("</tr>");
         }
 
       ?>      
   </table>         
</div>
