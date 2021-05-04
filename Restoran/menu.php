<?php
  include_once 'header.php'
?>


<?php

$conn = mysqli_connect("localhost", "root", "", "loginsystem");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["cart"]))
	{
		$item_array_id = array_column($_SESSION["cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="menu.php"</script>';
			}
		}
	}
}

if(isset($_GET["submit"]))
{

	echo "wsad";
}

?>




<div class="boox">
<?php
$serverName="localhost";
$dBUserName="root";
$dBPassword="";
$dBName="loginsystem";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
	$query = "SELECT * FROM product ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result))
		{
?>
<div class="col-md-4">
  <form method="post" action="menu.php?action=add&id=<?php echo $row["id"]; ?>">
    <div class="item" style="border:2px solid #ff7720; background-color:#f1f1f1; margin-top:16px; margin-left:30px; border-radius:5px; padding:16px; width:300px; ">
      <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" style="height:150px; width:250px;   border:1px solid #ddd; padding:3px; transition:.5s;" /><br />

      <h4 class="text-info"><?php echo $row["name"]; ?></h4>

      <h4 class="text-danger"><?php echo $row["price"]; ?>kn</h4>

      <input type="text" name="quantity" value="1" class="form-control" style="width: 100px" />

      <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

      <input type="submit" name="add_to_cart" style="margin-top:5px; width: 140px; border-radius:10px; background-color:#ff7720;" class="btn btn-success" value="Add to Cart" />

    </div>
  </form>
</div>
<?php
    }
  }
?>


<br><br>
<div style="clear:both"></div>
<div class="table-responsive">
	<br />
	<br>
	<h1>Order Details</h1><br>
  <table class="table-bordered">
    <tr>
      <th width="40%">Item Name</th>
      <th width="10%">Quantity</th>
      <th width="20%">Price</th>
      <th width="15%">Total</th>
      <th width="5%">Action</th>
    </tr>
    <?php
    if(!empty($_SESSION["cart"]))
    {
      $total = 0;
      foreach($_SESSION["cart"] as $keys => $values)
      {
    ?>
    <tr>
      <td><?php echo $values["item_name"]; ?></td>
      <td><?php echo $values["item_quantity"]; ?></td>
      <td><?php echo $values["item_price"]; ?> kn</td>
      <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> kn</td>
      <td><a href="menu.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
    </tr>
    <?php
        $total = $total + ($values["item_quantity"] * $values["item_price"]);
      }
    ?>
    <tr>
      <td colspan="3" align="right">Total</td>
      <td align="right"><?php echo number_format($total, 2); ?> kn</td>
      <td></td>
    </tr>

    <?php
    }
    ?>

  </table>
	<form action="includes/order.inc.php" method="post">
		<p><i class="fa fa-building" style="font-size:24px"></i><label for="cname"> City </label><input type="text" id="cname" name="city" style="margin-left: 32px; margin-top: 50px;"></p>
		<p><i class="fas fa-house-user" style="font-size:24px"></i><label for="cname"> Address</label><input type="text" id="cname" name="address" style="margin-left:22px;"></p>
	  <p><i class="fa fa-mobile" style="font-size:24px"></i><label for="cname">Number </label><input type="number" id="cname" name="number" style="margin-left: 5px;"></p><br>
	  <button type="submit" name="submit">Checkout</button>
	</form>
	<div class="error">
	<?php
		if(isset($_GET["error"])){
			if($_GET["error"]=="none"){
				echo "<p>Your order is on the way!!!</p>";
			}
		}
		?>
		</div>

</div>
</div>
</div>

<br />
</body>
</html>
