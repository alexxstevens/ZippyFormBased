<?php 
    function get_vehicles_by_class($class_code, $sort) {
        global $db;
        if ($sort == 'year'){
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }
        if ($class_code== NULL || $class_code== FALSE) {
            $query = 'SELECT V.year, V.make, V.model, V.price, T.type_name, C.class_name 
            FROM vehicles V  
            LEFT JOIN classes C ON V.class_code= C.class_code
            LEFT JOIN types T ON V.type_code= T.type_code
            ORDER BY ' . $orderby . ' DESC';
        } else {
            $query = 'SELECT V.year, V.make, V.model, V.price, T.type_name, C.class_name 
            FROM vehicles V 
            LEFT JOIN classes C ON V.class_code= C.class_code
            LEFT JOIN types T ON V.type_code= T.type_code
            WHERE V.class_code= :class_code
            ORDER BY ' . $orderby . ' DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_type($type_code, $sort) {
        global $db;
        if ($sort == 'year'){
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }
        if ($type_code== NULL || $type_code== FALSE) {
            $query = 'SELECT V.year, V.make, V.model, V.price, T.type_name, C.class_name 
            FROM vehicles V 
            LEFT JOIN classes C ON V.class_code= C.class_code
            LEFT JOIN types T ON V.type_code= T.type_code
            ORDER BY ' . $orderby . ' DESC';
        } else {
            $query = 'SELECT V.year, V.make, V.model, V.price, T.type_name, C.class_name 
            FROM vehicles V 
            LEFT JOIN classes C ON V.class_code= C.class_code
            LEFT JOIN types T ON V.type_code= T.type_code
            WHERE V.type_code= :type_code
            ORDER BY ' . $orderby . ' DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_make($make, $sort) {
        global $db;
        if ($sort == 'year'){
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }
        if ($make == NULL || $make == FALSE) {
            $query = 'SELECT V.year, V.make, V.model, V.price, T.type_name, C.class_name 
                FROM vehicles V 
                LEFT JOIN classes C ON V.class_code= C.class_code
                LEFT JOIN types T ON V.type_code= T.type_code
                ORDER BY ' . $orderby . ' DESC';
        } else {
            $query = 'SELECT V.year, V.make, V.model, V.price, T.type_name, C.class_name 
                FROM vehicles V 
                LEFT JOIN classes C ON V.class_code= C.class_code
                LEFT JOIN types T ON V.type_code= T.type_code
                WHERE V.make = :make 
                ORDER BY ' . $orderby . ' DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_all_vehicles($sort) {
        global $db;
        if ($sort == 'year'){
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }
        $query = 'SELECT V.product_id, V.year, V.make, V.model, V.price, T.type_name, C.class_name 
            FROM vehicles V 
            LEFT JOIN classes C ON V.class_code= C.class_code
            LEFT JOIN types T ON V.type_code= T.type_code
            ORDER BY ' . $orderby . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicle($product_id) {
        global $db;
        $query = 'SELECT * FROM vehicles WHERE product_id= :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $vehicle = $statement->fetch();
        $statement->closeCursor();
        return $vehicle;
    }

    function delete_vehicle($product_id) {
        global $db;
        $query = 'DELETE FROM vehicles WHERE product_id= :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_vehicle($type_code, $class_code, $year, $make, $model, $price) {
        global $db;
        $query = 'INSERT INTO vehicles (year, make, model, price, type_code, class_code)
              VALUES
                 (:year, :make, :model, :price, :type_code, :class_code)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_code', $type_code);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $statement->closeCursor();
    }
?>