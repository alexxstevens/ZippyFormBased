<?php
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/type_db.php');
    require('model/class_db.php');
    require('model/make_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_vehicles';
        }
    }

    if ($action == 'list_vehicles') {
        $type_code = filter_input(INPUT_GET, 'type_code', FILTER_VALIDATE_INT);
        $class_code = filter_input(INPUT_GET, 'class_code', FILTER_VALIDATE_INT);
        $make = filter_input(INPUT_GET, 'make');
        $sort = filter_input(INPUT_GET, 'sort');

        if ($sort == NULL || $sort == FALSE) {
            $sort = 'price';
        }

        if ($type_code != NULL && $type_code != FALSE) {
            $type_name = get_type_name($type_code);
            $vehicles = get_vehicles_by_type($type_code, $sort);
        } else if ($class_code != NULL && $class_code != FALSE) {
            $class_name = get_class_name($class_code);
            $vehicles = get_vehicles_by_class($class_code, $sort);
        } else if ($make != NULL && $make != FALSE) {
            $vehicles = get_vehicles_by_make($make, $sort);
        } else {
            $vehicles = get_all_vehicles($sort);
        }
        // use in drop menus 
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        include('admin_inventory_list.php');
        include('view/footer.php');
    } else if ($action == 'list_types') {
        $types = get_types();
        include('type_list.php');
        include('view/footer.php');
    } else if ($action == 'list_classes') {
        $classes = get_classes();
        include('class_list.php');
        include('view/footer.php');
    } else if ($action == 'delete_vehicle') {
        $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
        if ($product_id == NULL || $product_id == FALSE) {
            $error = "Missing or incorrect product id.";
            include('errors/error.php');
        } else {
            delete_vehicle($product_id       );
            header("Location: admin.php"); //Zippys Back End page
        }
    } else if ($action == 'delete_type') {
        $type_code = filter_input(INPUT_POST, 'type_code', FILTER_VALIDATE_INT);
        if ($type_code == NULL || $type_code == FALSE) {
            $error = "Missing or incorrect type code.";
            include('errors/error.php');
        } else {
            delete_type($type_code);
            header("Location: admin.php?action=list_types");
        }
    } else if ($action == 'delete_class') {
        $class_code = filter_input(INPUT_POST, 'class_code', FILTER_VALIDATE_INT);
        if ($class_code == NULL || $class_code == FALSE) {
            $error = "Missing or incorrect class code.";
            include('errors/error.php');
        } else {
            delete_class($class_code);
            header("Location: admin.php?action=list_classes");
        }
    } else if ($action == 'show_add_form') {
        $classes = get_classes();
        $types = get_types();
        include('add_vehicle_form.php');
        include('view/footer.php');
    } else if ($action == 'add_vehicle') {
        $type_code = filter_input(INPUT_POST, 'type_code', FILTER_VALIDATE_INT);
        $class_code = filter_input(INPUT_POST, 'class_code', FILTER_VALIDATE_INT);
        $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
        if ($type_code == NULL || $type_code == FALSE || $class_code == NULL || $class_code == FALSE || $year == NULL || $make == NULL || $model == NULL || $price == NULL ) {
            $error = "Invalid vehicle data. Check all fields and try again.";
            include('errors/error.php');
        } else {
            add_vehicle($type_code, $class_code, $year, $make, $model, $price);
            header("Location: admin.php");
        }
    } else if ($action == 'add_type') {
        $type_name = filter_input(INPUT_POST, 'type_name');
        add_type($type_name);
        header("Location: admin.php?action=list_types");
    } else if ($action == 'add_class') {
        $class_name = filter_input(INPUT_POST, 'class_name');
        add_class($class_name);
        header("Location: admin.php?action=list_classes");
    }
?> 

   