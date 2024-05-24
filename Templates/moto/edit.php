<h1>Edit motocycle</h1>
<h2><?php echo($moto->getBrand()." ".$moto->getModel()); ?></h2>

<form action="" method="POST">
    <label for="brand">Brand :</label>
    <input id="brand" name="brand" type="text" value="<?php echo($moto->getBrand()) ?>" required>
    <label for="model">Model :</label>
    <input id="model" name="model" type="text" value="<?php echo($moto->getModel()) ?>" required>
    <label for="type"> Select a type :</label>
    <select id="type" name="type" required>
        <!-- preselect the type in accord to the moto -->
        <option value="Enduro" <?php if($moto->getType() == "Enduro") { echo("selected");} ?>>Enduro</option>
        <option value="Custom" <?php if($moto->getType() == "Custom") { echo("selected");} ?>>Custom</option>
        <option value="Sportive" <?php if($moto->getType() == "Sportive") { echo("selected");} ?>>Sportive</option>
        <option value="Roadster" <?php if($moto->getType() == "Roadster") { echo("selected");} ?>>Roadster</option>
    </select>
    <label for="price">Price :</label>
    <input id="price" name="price" type="number" value="<?php echo($moto->getPrice()) ?>" required>
    <label for="image"> Image :</label>
    <input id="image" name="image"type="text">
    <input type="submit" value="Edit motocycle">
</form>