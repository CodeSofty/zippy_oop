<?php include('header.php');?>





    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_vehicle">



    <select class="select-box" name="make_id" required>
        <option value ="0">View All Makes</option>
        <?php foreach ($makes as $make) : ?>
            <?php if ($make_id == $make['ID']) { ?>
            <option value="<?= $make['ID']?>" selected>
            <?php } else { ?>
            <option value ="<?=$make['ID']?>">
            <?php }?>
            <?= $make['Make'] ?>
            </option>
        <?php endforeach; ?>
        </select>

        <br>




    <select class="select-box" name="type_id" required>
        <option value ="0">View All Types</option selected>
        <?php foreach ($types as $type) : ?>
            <?php if ($type_id == $type['ID']) { ?>
            <option value="<?= $type['ID']?>" >
            <?php } else { ?>
            <option value ="<?=$type['ID']?>">
            <?php }?>
            <?= $type['Type'] ?>
            </option>
        <?php endforeach; ?>
        </select>

        <br>



    <select class="select-box" name="class_id" required>
        <option value ="0">View All Classes</option>
        <?php foreach ($classes as $class) : ?>
            <?php if ($class_id == $class['ID']) { ?>
            <option value="<?= $class['ID']?>" selected>
            <?php } else { ?>
            <option value ="<?=$class['ID']?>">
            <?php }?>
            <?= $class['Class'] ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>




        <div class="add__inputs">
            <label>Year:</label>
            <input type="text" name="vehicle_year" maxlength 20 autofocus required> 
            <br>
            <label>Model:</label>
            <input type="text" name="vehicle_model" maxlength 20 autofocus required>
            <br>
            <label>Price:</label>
            <input type="text" name="vehicle_price" maxlength 20 autofocus required>
        </div>
        <div class="add__type">
            <button type="submit" class="add-button bold">Add Vehicle</button>
        </div>
    </form>
</section>


<p><a href= ".?action=list_vehicles">View Vehicles</a></p>
<p><a href=".?action=list_types">View/Edit Types</a></p>
<p><a href=".?action=list_makes">View/Edit Makes</a></p>
<p><a href=".?action=list_classes">View/Edit Classes</a></p>
<?php include('footer.php');?>