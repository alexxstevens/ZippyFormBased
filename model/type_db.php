<?php 
    function get_types() {
        global $db;
        $query = 'SELECT * FROM types ORDER BY type_code';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    function get_type_name($type_code) {
        global $db;
        $query = 'SELECT * FROM types WHERE type_code = :type_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['type_name'];
        return $type_name;
    }

    function delete_type($type_code) {
        global $db;
        $query = 'DELETE FROM types WHERE type_code = :type_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_type($type_name) {
        global $db;
        $query = 'INSERT INTO types (type_name)
              VALUES
                 (:type_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }
?>