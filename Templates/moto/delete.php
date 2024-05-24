<h1>Are you sure you want to delete<?php echo("<br>".$moto->getBrand()." ".$moto->getModel()) ?>?</h1>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/<?php echo($moto->getId()) ?>">Go back</a>
<form action="" method="DELETE">
    <input type="submit" value="Delete">
</form>