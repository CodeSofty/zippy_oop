<?php include('header.php'); ?>


<main>

<!-- Working on forms here --> 




<form action = "." method="get">
    <input type="hidden" name="action" value = "get_make">
    <select class="select-box" name="make_id">
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
    <button>Go</button>
</form>




<form action = "." method="get">
    <input type="hidden" name="action" value = "get_type">
    <select class="select-box" name="type_id">
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
    <button>Go</button>
</form>



<form action = "." method="get">
    <input type="hidden" name="action" value = "get_class">
    <select class="select-box" name="class_id">
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
    <button>Go</button>
</form>




<!-- Building Data Table --> 

    <table class="table table-info table-striped table-hover table-bordered">
    <caption>Zippy Used Auto Inventory</caption>
    <thead>
        <tr>
        <th scope="col">Year</th>
        <th scope="col">Make</th>
        <th scope="col">Model</th>
        <th scope="col">Type</th>
        <th scope="col">Class</th>
        <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($vehicles as $vehicle) : ?>
        <tr>
        <td><?php echo $vehicle['year']; ?></td>
        <td><?php echo $vehicle['make']; ?></td>
        <td><?php echo $vehicle['model']; ?></td>
        <td><?php echo $vehicle['type']; ?></td>
        <td><?php echo $vehicle['class']; ?></td>
        <td><?php echo $vehicle['price']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>


</main>

<?php include('Location: "." '); ?>

<?php include('footer.php'); ?>