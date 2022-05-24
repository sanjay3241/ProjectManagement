
   
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal Payment</title>
    <link href="css/checkoutStyle.css?<?=filemtime("css/checkoutStyle.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php include('header.php');?>
    <h1>CheckOut</h1>
    <h4>Select Collection Slot</h4>
    <div class="slot">
        
        <form method="POST" action="success.php">
        <label for="day">Day</label>
        <select name="day">
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
        </select>
        <label for="time">Time</label>
        <select name="time">
             <option value="10:00-13:00">10:00-13:00</option>
             <option value="13:00-16:00">13:00-16:00</option>
             <option value="16:00-19:00">16:00-19:00</option>
        </select>
        <div id="paypal-payment-button" class="paypal" name="slotSubmit"></div>
    </form>
    </div>
    <?php include('footer.php');?>
        <script src="https://www.paypal.com/sdk/js?client-id=AdoDvXyPZFxSUk_eRjaa1KgwdLv72XLUXZaO96rfuaVC-_tBUvsP8y4cQUfmKR65bUF_tXZMNXXssyXa&disable-funding=credit,card"></script>
        <script>
            
paypal.Buttons({
    style:{
        shape:'pill'
    },
    createOrder:function(data,actions)
    {return actions.order.create({
        purchase_units:[{
            amount:{
                value:'<?php echo $_SESSION['grandTotal'] ?>'
            },
             currency:{
                value:'GBP'
            }
        }]
    });
},
onApprove:function(data,actions)
{
    return actions.order.capture().then(function(details)
    {
        console.log(details)
        window.location.replace("success.php")
    })
},
onCancel:function(data,actions)
{
    window.location.replace("cancel.php")
}
}).render('#paypal-payment-button');

        </script>
</body>
</html>