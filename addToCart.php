<?php
include('init.php');
if(isset($_POST['addtocart']))
{
	$lv_productName=$_POST['productName'];
		$lv_productPrice=$_POST['productPrice'];
		$lv_productImgName=$_POST['productImgName'];
		$lv_productID=$_POST['productID'];
		$lv_userID=$_SESSION['USERID'];
		$lv_quantity=$_POST['qty'];
		$lv_sellerID=$_POST['sellerID'];
		$lv_shopID=$_POST['shopID'];
	if(isset($_SESSION['email']))
	{
		$qry1=oci_parse($conn, "DELETE FROM CART_ORDER WHERE PRODUCTID='$lv_productID' and CUSTOMERID='$lv_userID'");
		oci_execute($qry1);
		$sql="INSERT INTO CART_ORDER(PRODUCTID, PRODUCTNAME, PRODUCTIMGNAME, PRODUCTPRICE, QUANTITY, CUSTOMERID, SELLERID, SHOPID) VALUES ('$lv_productID', '$lv_productName', '$lv_productImgName', '$lv_productPrice', '$lv_quantity', '$lv_userID', '$lv_sellerID', '$lv_shopID')";
		$qry=oci_parse($conn, $sql);
		oci_execute($qry);

		if($qry)
		{
			echo'<script>alert("Successfully added to your Cart")</script>';
			echo'<script>window.location="index.php"</script>';
		}
	}
	else
	{
		echo'<script>alert("Please login first")</script>';
		echo'<script>window.location="index.php"</script>';
	}
}
else 
{
} 

?>