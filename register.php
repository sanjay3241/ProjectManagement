<?php
include('init.php');
$error ="" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/registerStyle.css?<?=filemtime("css/registerStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title>Register  gg</title>
</head>
<body>
	<div class="container">
	<div class="header">
		<a href="index.php"><img src="img/logo.png"></a>
	</div>
	<div class="registerFormContainer">
		<div class="regformLogo"><img src="img/logo.png"></div>
		<?php echo $error ?>
		<form class="registerForm" action="register.php" method="POST">
			<label for="txt_Email" class="reg_label">Email</label><br>
			<input type="text" name="txt_Email" class="reg_input"><br>
			<label for="txt_Fname" class="reg_label">Firstname</label><br>
			<input type="text" name="txt_Fname" class="reg_input"><br>
			<label for="txt_Lname" class="reg_label">Lastname</label><br>
			<input type="text" name="txt_Lname" class="reg_input"><br>
			<label for="txt_Address" class="reg_label">Address</label><br>
			<input type="text" name="txt_Address" class="reg_input"><br>
			<label for="txt_Phone" class="reg_label">Phone Number</label><br>
			<input type="text" name="txt_Phone" class="reg_input"><br>
			<label for="txt_password1" class="reg_label">Password</label><br>
			<input type="password" name="txt_password1" class="reg_input"><br>
			<label for="accountType" class="reg_label">User Type</label><br>
			<select id="registerAccountType" name="account_Type" class="reg_input">
  				<option value="customer">Customer</option>
  				<option value="trader">Trader</option>
  				<option value="admin">Admin</option>
			</select><br><br>
			<input type="submit" name="txt_Register" value="Register" class="reg_submit">
			<a href="index.php">BACK</a>
		</form>

	</div>
	<?php include('footer.php');?>
</div>
</body>
</html>
<?php
if(isset($_POST['txt_Register']))
{
	$lv_email=$_POST['txt_Email'];
	$lv_fname=$_POST['txt_Fname'];
	$lv_lname=$_POST['txt_Lname'];
	$lv_address=$_POST['txt_Address'];
	$lv_phone=$_POST['txt_Phone'];
	$lv_password=$_POST['txt_password1'];
	$lv_account=$_POST['account_Type'];

	if($lv_email==''||$lv_fname==''||$lv_lname==''||$lv_address==''||$lv_phone==''||$lv_password==''||$lv_account=='')
	{
		echo'<script>alert("Please donot leave any field empty")</script>';
	}
	else 
	{
	$sql="INSERT INTO USERS(EMAIL, FIRSTNAME, LASTNAME, ADDRESS, PHONENUMBER, PASSWORD, ACCOUNTTYPE) VALUES ('$lv_email','$lv_fname', '$lv_lname', '$lv_address', '$lv_phone', '$lv_password', '$lv_account')";
	$qry=oci_parse($conn, $sql);
	oci_execute($qry);
	if($qry)
	{
		echo'<script>alert("Registration Successful !!!")</script>';
			echo'<script>window.location="index.php"</script>';
	}
	else
	{
		echo'<script>alert("Registration UnSuccessful !!!")</script>';
	}
	}
}
?>