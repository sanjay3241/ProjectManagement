<?php 
    include('init.php');
    if(isset($_POST['saveShop'])){
 
        $description=$_POST['txt_shopDescription']; 
        $shopName=$_POST['txt_shopName'];
        $trader=$_SESSION['USERID'];
     
        $sql=oci_parse($conn, " INSERT INTO SHOP(SHOPID,SHOPNAME,SHOPDESCRIPTION,USERID) 
        VALUES(4 ,'$shopName','$description',$trader)");
        oci_execute($sql);
        header('Location:viewShopIndex.php');
    }
?>