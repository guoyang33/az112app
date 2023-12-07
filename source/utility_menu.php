<ul style="list-style: none">
<li><a href="./cust_gridView.php">Customer</a></li>
<li><a href="./prod_gridView.php">Product</a></li>
<li><a href="./vend_gridView.php">Vendor</a></li>
<li><a href="./purc_gridView.php">Purchase Order</a></li>
<li><a href="./sale_gridView.php">Salse Order</a></li>
<li><a href="./logout.php">Logout</a></li>
<?php
  if (isset($_SESSION["userid"]))
      echo "<li><a href='./logout.php'>Logout</a></li>" ;
 ?>
</ul>