<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Success</title>
</head>
<body>
	<?php include('header.php');?>
	<h1>Success</h1>
	<?php
	$lv_userid=$_SESSION['USERID'];
	$sql="INSERT INTO FINALORDER(PRODUCTID, PRODUCTNAME, PRODUCTIMGNAME, PRODUCTPRICE, CUSTOMERID, QUANTITY, SELLERID, SHOPID) SELECT PRODUCTID, PRODUCTNAME, PRODUCTIMGNAME, PRODUCTPRICE, CUSTOMERID, QUANTITY, SELLERID, SHOPID FROM CART_ORDER WHERE CUSTOMERID=$lv_userid";
	$sql2="DELETE FROM CART_ORDER WHERE CUSTOMERID='$lv_userid'";
	$qry=oci_parse($conn, $sql);
		oci_execute($qry);
		if($qry)
		{
			$status="Successfull";
		}
		else
		{
			$status="UnSuccessfull";
		}
		$qry2=oci_parse($conn, $sql2);
		oci_execute($qry2);

	?>

	<?php include('footer.php');?>
</body>
</html>