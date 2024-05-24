<h1><?php echo($title); ?></h1>
<span>Filter by type :</span>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/enduro">Enduro</a>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/custom">Custom</a>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/sportive">Sportive</a>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/roadster">Roadster</a>
<?php 
    foreach($motos as $moto) {
        ?>
        <a href="http://localhost/CoppiDanielPOO/index.php/moto/<?php echo($moto->getId()); ?>">
            <div class="">
                <img src="<?php echo("../..".$moto->getImage()); ?>" alt="<?php echo($moto->getBrand()." ".$moto->getModel()); ?>">
                <p><?php echo($moto->getBrand());?> - <?php echo($moto->getModel());?></p>
                <p>Type : <?php echo($moto->getType()); ?></p>
                <p><?php echo($moto->getPrice()); ?> €</p>
            </div>
        </a>
        <?php
    }
?>
