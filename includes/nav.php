<!-- The navigation bar-->
<?php if(!empty($_SESSION["id"])): ?>
   <ul class="nav nav-pills">
        <li><a href="index.php" class="button">Home</a></li>
        <li><a href="quote.php" class="button">Quote</a></li>
        <li><a href="buy.php" class="button">Buy</a></li>
        <li><a href="sell.php" class="button">Sell</a></li>
        <li><a href="history.php" class="button">History</a></li>
        <li><a href="deposit.php" class="button">Deposit</a></li>
        <li><a href="withdraw.php"class="button">Withdraw</a></li>
        <li><a href="account.php" class="button">Account</a></li>
        <li><a href="logout.php" class="button"><strong>Log Out</strong></a></li>
   </ul>
<?php endif ?>   

  
