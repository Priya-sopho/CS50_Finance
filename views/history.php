<!-- This template displays table with all history transactions -->
<div>
    
    <table id="overview">
      <?php
         print("<tr>");
           print("<th>Transaction</th>");
           print("<th>Date/Time</th>");
           print("<th>Symbol</th>");
           print("<th>Shares</th>");
           print("<th>Amount</th>");
         print("</tr>");
         
         foreach ($history as $his)
         {
           print("<tr>");
              print("<td>".$his["status"]."</td>");
              print("<td>".$his["date"]."</td>");
              print("<td>".$his["symbol"]."</td>");
              print("<td>".$his["shares"]."</td>");
              print("<td>"."$".sprintf("%.2f",$his["price"])."</td>");
           print("</tr>");
         }
 
     ?>      
   </table>         
</div>
