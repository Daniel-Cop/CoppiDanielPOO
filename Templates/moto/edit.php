<h1 class="text-center m-5">Edit motocycle</h1>
<?php 
    if (isset($error)) {
        ?>
        <p class="text-center text-danger"><?php echo($error) ?></p>
        <?php
    }
?>

<div class="d-flex flex-row justify-content-around">
    <div class="d-flex flex-row align-items-center m-5">
        <img src="<?php echo("../../..".$moto->getImage()); ?>" alt="<?php echo($moto->getBrand()." ".$moto->getModel()); ?>" class="float-left img-thumbnail img-fluid rounded" width="500">
        <div class="m-5">
            <p>Brand : <span class="fw-bold"><?php echo($moto->getBrand());?></span></p>
            <p>Model : <span class="fw-bold"><?php echo($moto->getModel());?></span></p>
            <p>Type : <span class="fw-bold"><?php echo($moto->getType()); ?></span></p>
            <p>Price : <span class="fw-bold"><?php echo($moto->getPrice()); ?> €</span></p>
        </div>
    </div>
    <form action="" method="POST" class="d-flex flex-column justify-content-center align-items-center">
    <label for="brand" class="fs-4 fw-bold">Brand :</label>
    <input id="brand" name="brand" type="text" value="<?php echo($moto->getBrand()) ?>" required>
    <label for="model" class="fs-4 fw-bold">Model :</label>
    <input id="model" name="model" type="text" value="<?php echo($moto->getModel()) ?>" required>
    <label for="type" class="fs-4 fw-bold"> Select a type :</label>
    <select id="type" name="type" required>
        <!-- preselect the type in accord to the moto -->
        <option value="Enduro" <?php if($moto->getType() == "Enduro") { echo("selected");} ?>>Enduro</option>
        <option value="Custom" <?php if($moto->getType() == "Custom") { echo("selected");} ?>>Custom</option>
        <option value="Sportive" <?php if($moto->getType() == "Sportive") { echo("selected");} ?>>Sportive</option>
        <option value="Roadster" <?php if($moto->getType() == "Roadster") { echo("selected");} ?>>Roadster</option>
    </select>
    <label for="price" class="fs-4 fw-bold">Price :</label>
    <input id="price" name="price" type="number" value="<?php echo($moto->getPrice()) ?>" required>
    <label for="image" class="fs-4 fw-bold"> Image :</label>
    <input id="image" name="image"type="text">
    <input type="submit" value="Edit motocycle" class="btn rounded bg-secondary text-light m-3">
</form>
</div>

