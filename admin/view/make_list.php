
<?php include('header.php');?>




<table class="table table-info table-striped table-hover table-bordered">
    <caption>Zippy Used Auto Inventory</caption>
    <thead>
        <tr>
        <th scope="col">Make List</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($makes as $make) : ?>
        <tr>
        <td><?php echo $make['Make']; ?></td>
        <td>  <form action="." method="post">
                <input type="hidden" name="action" value="delete_make">
                <input type="hidden" name="make_id" value="<?= $make['ID']?>">
                <button type="submit" class="btn btn-danger">Remove</button>
            </form></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>




    <section id="add" class="add">
    <h2>Add Make:</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_make">
        <div class="add__inputs">
            <label>Make Name:</label>
            <input type="text" name="make_name" maxlength 20 autofocus required>
        </div>
        <div class="add__make">
            <button type="submit" class="add-button bold">Add Make</button>
        </div>
    </form>
</section>

<p><a href= ".?action=list_vehicles">View Vehicles</a></p>
<p><a href=".?action=add_vehicle">Add Vehicle</a></p>
<p><a href=".?action=list_types">View/Edit Types</a></p>
<p><a href=".?action=list_classes">View/Edit Classes</a></p>
<?php include('footer.php');?>