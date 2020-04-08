<?php include 'view/header-admin.php'; ?>
<main>
    <br>
    <h2 class="add">ADD VEHICLE</h2><br>
    <div class="add">
        <form action="admin.php" method="post" id="add_vehicle_form">
            <input type="hidden" name="action" value="add_vehicle">
            <label>Type:</label>
            <select name="type_code">
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['type_code']; ?>">
                    <?php echo $type['type_name']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Class:</label>
            <select name="class_code">
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['class_code']; ?>">
                    <?php echo $class['class_name']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label for="year">Year:</label>
            <input type="text" name="year" min="1920" max="2100" maxlength="4" pattern="[0-9]{1,5}" required><br>

            <label for="make">Make:</label>
            <input type="text" name="make" maxlength="50" required><br>

            <label for="model">Model:</label>
            <input type="text" name="model" maxlength="50" required><br>

            <label for="price">Price:</label>
            <input type="number" name="price" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input type="submit" value="Add Vehicle" class="button blue"><br>
        </form>
    </div>
<br>

    <div class="links">
        <p><a href="admin.php">Back to Admin Vehicle List</a></p>
        <p><a href="admin.php?action=list_types">View/Edit Vehicle Types</a></p>
        <p><a href="admin.php?action=list_classes">View/Edit Vehicle Classes</a></p>
            </div><br>
</main>
