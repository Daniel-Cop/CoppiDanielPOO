<h1>Add a new motocycle</h1>

<form action="" method="POST">
    <label for="brand">Brand :</label>
    <input id="brand" name="brand" type="text" required>
    <label for="model">Model :</label>
    <input id="model" name="model" type="text" required>
    <label for="type"> Select a type :</label>
    <select id="type" name="type" required>
        <option value="Enduro">Enduro</option>
        <option value="Custom">Custom</option>
        <option value="Sportive">Sportive</option>
        <option value="Roadster">Roadster</option>
    </select>
    <label for="price">Price :</label>
    <input id="price" name="price" type="number" required>
    <label for="image"> Image :</label>
    <input id="image" name="image"type="text">
    <input type="submit" value="Add motocycle">
</form>