<?php 
include 'view/header-admin.php';
require_once('util/valid_admin.php'); ?>
<br><br>
<div id="class_list">
    <h2 class="add">Vehicle Class List</h2>
    <div class="list">
        <?php if ( sizeof($classes) != 0) { ?>
            <table>
                <tr>
                    <th colspan="2">Class Name</th>
                </tr>        
                <?php foreach ($classes as $class) : ?>
                <tr>
                    <td class="table"><?php echo $class['class_name']; ?></td>
                    <td class="table">
                        <form action="admin.php" method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_code"
                                value="<?php echo $class['class_code']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no vehicle classes in your database.
            </p>
        <?php } ?>
    </div>
<br><br>
    <section>
        <h2 class="add">Add Vehicle Class</h2>
        <div class="add">
        <form action="admin.php" method="post" id="add_class_form">
            <input type="hidden" name="action" value="add_class">

            <label class="list">Name:</label>
            <input type="text" name="class_name" max="20" required><br>

            <br>
            <input id="add_type_button" type="submit"  value="Add Class"><br>
        </form>
        </div>
    </section>
</div>
<br>
    <div class="links">
        <p><a href="admin.php">Back to Admin Vehicle List</a></p>
        <p><a href="admin.php?action=show_add_form">Add a Vehicle to Inventory</a></p>
        <p><a href="admin.php?action=list_types">View/Edit Vehicle Types</a></p>
        </div><br>
  

