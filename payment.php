<?php 
include 'setting.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $epay_url ?>" method="POST">
    <input value="100" name="tAmt" type="hidden">
    <input value="90" name="amt" type="hidden">
    <input value="5" name="txAmt" type="hidden">
    <input value="2" name="psc" type="hidden">
    <input value="3" name="pdc" type="hidden">
    <input value="<?php echo $merchant_code ?>" name="scd" type="hidden">
    <input value="<?php echo $pid ?>" name="pid" type="hidden">
    <input value="<?php echo $success_url ?>" type="hidden" name="su">
    <input value="<?php echo $failed_url ?>" type="hidden" name="fu">
    <input value="Pay with esewa" type="submit">
</form>
</body>
</html>

<?php


