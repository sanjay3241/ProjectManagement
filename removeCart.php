<?php 
include('init.php');
$lv_productID=$_POST['productID'];
$lv_userID=$_SESSION['USERID'];
if(isset($_POST['removeBtn']))
		{
			$qry=oci_parse($conn, "DELETE FROM CART_ORDER WHERE PRODUCTID='$lv_productID' and CUSTOMERID='$lv_userID'");
			oci_execute($qry);
			if($qry)
			{
				echo'<script>alert("Product successfully removed from your Cart")</script>';
			echo'<script>window.location="CartIndex.php"</script>';
			}
			else 
			{
				echo 'error';
			}
		}
		else 
		{
			echo 'not set';
		}
?>