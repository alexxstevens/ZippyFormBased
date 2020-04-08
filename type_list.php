<?php 
include 'view/header-admin.php';

require_once('util/valid_admin.php'); ?>
<br><br>
<div id="type_list">
    <h2 class="list">Vehicle Type List</h2>
    <div class="list">
        <?php if ( sizeof($types) != 0) { ?>
            <table>
                <tr>
                    <th colspan="2">Name</th>
                </tr>        
                <?php foreach ($types as $type) : ?>
                <tr>
                    <td class="table"><?php echo $type['type_name']; ?></td>
                    <td class="table">
                        <form action="admin.php" method="post">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="type_code"
                                value="<?php echo $type['type_code']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no vehicle types in your database.
            </p>
        <?php } ?>
    </div>
            <br><br>
    <section>
        <h2 class="list">Add Vehicle Type</h2>
        <div class="add">
        <form action="admin.php" method="post" id="add_type_form">
            <input type="hidden" name="action" value="add_type">

            <label class="list">Type Name:</label>
            <input type="text" name="type_name" max="20" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input id="add_type_button" type="submit" class="button blue" value="Add Type"><br>
        </form>
        </div>
    </section>
</div>
<br>
    <div class="links">
        <p><a href="admin.php">Back to Admin Vehicle List</a></p>
        <p><a href="admin.php?action=show_add_form">Add a Vehicle to Inventory</a></p>
        <p><a href="admin.php?action=list_classes">View/Edit Vehicle Classes</a></p>
        </div>
<br>

