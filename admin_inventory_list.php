<?php include 'view/header-admin.php'; ?>
<br>
<main>
        <section class="dropdown">
            <form action="admin.php" method="get" id="inventory_selection">
                <div id="make_dropdown">
                    <?php if ( sizeof($makes) != 0) { ?>

                        <select name="make" lass="custom-select my-1    mr-sm-2" >
                                <option  value="">View a Make of Vehicle</option>
                            <?php foreach ($makes as $make) : ?>
                                <option value="<?php echo $make['make']; ?>">
                                    <?php echo $make['make']; ?>
                                </option>
                            <?php endforeach; ?>
                                <div class="dropdown-divider"></div>
                                <option value="0">View All Makes</option>
                        </select> 
                    <?php } ?>
                </div> 

                <div id="type_dropdown">
                    <?php if ( sizeof($types) != 0) { ?>
                        <select name="type_code">
                        <option  value="">View a Type of Vehicle</option>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?php echo $type['type_code']; ?>">
                                    <?php echo $type['type_name']; ?>
                                </option>
                            <?php endforeach; ?>
                                <div class="dropdown-divider"></div>
                                <option value="0">View All Types</option>
                        </select> 
                    <?php } ?>
                </div>

                <div id="class_dropdown">
                    <?php if ( sizeof($classes) != 0) { ?>
                        <select name="class_code">
                            <option  value="">View a Class of Vehicle</option>
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?php echo $class['class_code']; ?>">
                                    <?php echo $class['class_name']; ?>
                                </option>
                            <?php endforeach; ?>
                            <div class="dropdown-divider"></div>
                            <option value="0">View All Classes</option>
                        </select> 
                    <?php } ?>
                </div>
        </section>
                                <br>
        <section id="sort_by">
                <div>
                    <p class="smaller">Sort By: </p>
                    <div class="form-inline">
                    <input class="pad" type="radio" id="sortByPrice" name="sort" value="price" checked>
                    <label for="sortByPrice" class="radio-inline pad">Price</label> 
                    <input class="pad" type="radio" id="sortByYear" name="sort" value="year">
                    <label for="sortByYear" class="radio-inline pad">Year</label>
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                
        </section>
            </form>
            <br>
   
    <section>
        <?php if( sizeof($vehicles) != 0 ) { ?>
            <div id="table-overflow">
                <table>
                    <thead>
                        <tr>
                            <th class="product_id_hidden">Product ID</th>
                            <th>Year</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Class</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Remove Item</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($vehicles as $vehicle) : ?>
                        <tr>
                            <td class="main"><?php echo $vehicle['year']; ?></td>
                            <td class="main"><?php echo $vehicle['make']; ?></td>
                            <td class="main"><?php echo $vehicle['model']; ?></td>
                            <?php if ($vehicle['type_name'] == null || $vehicle['type_name'] == false) { ?>
                            <td class="main">None</td>
                            <?php } else { ?>
                                <td><?php echo $vehicle['type_name']; ?></td>
                            <?php } ?>
                            <?php if ($vehicle['class_name'] == null || $vehicle['class_name'] == false) { ?>
                                <td>None</td>
                            <?php } else { ?>
                                <td><?php echo $vehicle['class_name']; ?></td>
                            <?php } ?>
                            <td class="main"><?php echo "$".number_format($vehicle['price'], 2); ?></td>
                            <td class="main">
                                <form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_vehicle">
                                    <input type="hidden" name="product_id       "
                                        value="<?php echo $vehicle['product_id       ']; ?>">
                                    <input type="submit" value="Remove">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>  
        <?php } else { ?>
            <p>
                There are no matching vehicles in Zippy&apos;s inventory. 
            </p>     
        <?php } ?>
    </section>
    <br>
    <?php include 'view/zippy-links.php'; ?><br>
</main>
