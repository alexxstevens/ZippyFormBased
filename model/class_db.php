<?php 
    function get_classes() {
        global $db;
        $query = 'SELECT * FROM classes ORDER BY class_code';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    function get_class_name($class_code) {
        global $db;
        $query = 'SELECT * FROM classes WHERE class_code = :class_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['class_name'];
        return $class_name;
    }

    function delete_class($class_code) {
        global $db;
        $query = 'DELETE FROM classes WHERE class_code = :class_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_class($class_name) {
        global $db;
        $query = 'INSERT INTO classes (class_name)
              VALUES
                 (:class_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }
?>