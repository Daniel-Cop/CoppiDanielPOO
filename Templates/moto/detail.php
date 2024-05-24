<h1><?php echo($title)?></h1>
<div>
    <img src="<?php echo("../..".$moto->getImage()); ?>" alt="<?php echo($moto->getBrand()." ".$moto->getModel()); ?>">
    <p><?php echo($moto->getBrand());?> - <?php echo($moto->getModel());?></p>
    <p>Type : <?php echo($moto->getType()); ?></p>
    <p><?php echo($moto->getPrice()); ?> €</p>
 </div>

 <a href="http://localhost/CoppiDanielPOO/index.php/moto/edit/<?php echo($moto->getId()) ?>">Edit</a> 
 <a href="http://localhost/CoppiDanielPOO/index.php/moto/delete/<?php echo($moto->getId()) ?>">Delete</a>