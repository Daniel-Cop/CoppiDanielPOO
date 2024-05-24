<h1 class="text-center m-5"><?php echo($title); ?></h1>
<span class="m-3">Filter by type :</span>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/enduro" class="rounded bg-secondary text-light text-decoration-none p-2 m-3 me-3 ">Enduro</a>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/custom" class="rounded bg-secondary text-light text-decoration-none p-2 m-3 me-3">Custom</a>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/sportive" class="rounded bg-secondary text-light text-decoration-none p-2 m-3 me-3">Sportive</a>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/roadster" class="rounded bg-secondary text-light text-decoration-none p-2 m-3 me-3">Roadster</a>
<a href="http://localhost/CoppiDanielPOO/index.php/moto/" class="rounded bg-secondary text-light text-decoration-none p-2 m-3 me-3 pe-4 ps-4">All</a>
<div class="d-flex flex-wrap w-100 mt-3">
    <?php 
        foreach($motos as $moto) {
            ?>
            <a href="http://localhost/CoppiDanielPOO/index.php/moto/<?php echo($moto->getId()); ?>" class="text-decoration-none text-dark">
                <div class="rounded border border-dark m-3 p-1 d-flex flex-column align-items-center justify-content-center " style="background-color: #ededeb;">
                    <img class="img-thumbnail img-fluid rounded" src="<?php echo("../..".$moto->getImage()); ?>" alt="<?php echo($moto->getBrand()." ".$moto->getModel()); ?>" width="300">
                    <p><?php echo($moto->getBrand());?> - <?php echo($moto->getModel());?></p>
                    <p>Type : <?php echo($moto->getType()); ?></p>
                    <p><?php echo($moto->getPrice()); ?> €</p>
                </div>
            </a>
            <?php
        }
    ?>
</div>