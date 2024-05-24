<h1 class="text-center m-5"><?php echo($title)?></h1>
<div class="d-flex flex-row justify-content-around">
    <div class="d-flex flex-row align-items-center m-5">
        <img src="<?php echo("../..".$moto->getImage()); ?>" alt="<?php echo($moto->getBrand()." ".$moto->getModel()); ?>" class="float-left img-thumbnail img-fluid rounded" width="500">
        <div class="m-5">
            <p>Brand : <span class="fw-bold"><?php echo($moto->getBrand());?></span></p>
            <p>Model : <span class="fw-bold"><?php echo($moto->getModel());?></span></p>
            <p>Type : <span class="fw-bold"><?php echo($moto->getType()); ?></span></p>
            <p>Price : <span class="fw-bold"><?php echo($moto->getPrice()); ?> €</span></p>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="http://localhost/CoppiDanielPOO/index.php/moto/edit/<?php echo($moto->getId()) ?>" class="rounded bg-secondary text-light text-decoration-none p-2 ps-3 pe-3 m-3 me-3 btn">Edit</a> 
        <!-- thanks to this form we don't need a page template to delete -->
        <form action="http://localhost/CoppiDanielPOO/index.php/moto/delete/<?php echo($moto->getId()) ?>" method="DELETE" onsubmit="return confirm('Are you sure you want to delete <?php echo($moto->getBrand()) ?> <?php echo($moto->getModel()) ?>?');">
        <input type="submit" value="Delete" class="rounded bg-danger text-light text-decoration-none p-2 m-3 me-3 btn" >
        </form>
    </div>
</div>