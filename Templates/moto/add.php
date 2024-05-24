<h1 class="text-center m-5">Add a new motocycle</h1>
<?php 
    if (isset($error)) {
        ?>
        <p class="text-center text-danger"><?php echo($error) ?></p>
        <?php
    }
?>

<form action="" method="POST" class="d-flex flex-column justify-content-center align-items-center">
    <label for="brand" class="fs-4 fw-bold">Brand :</label>
    <input id="brand" name="brand" type="text" required>
    <label for="model" class="fs-4 fw-bold">Model :</label>
    <input id="model" name="model" type="text" required>
    <label for="type" class="fs-4 fw-bold"> Select a type :</label>
    <select id="type" name="type" required>
        <option value="Enduro">Enduro</option>
        <option value="Custom">Custom</option>
        <option value="Sportive">Sportive</option>
        <option value="Roadster">Roadster</option>
    </select>
    <label for="price" class="fs-4 fw-bold">Price :</label>
    <input id="price" name="price" type="number" required>
    <label for="image" class="fs-4 fw-bold"> Image :</label>
    <input id="image" name="image" type="text">
    <input type="submit" value="Add motocycle" class="btn rounded bg-secondary text-light m-3">
</form>