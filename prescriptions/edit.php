<?php

include "../includes/db.php";

$id = $_GET['id'];



/* =========================
   FETCH PRESCRIPTION
========================= */

$prescription_query = "

SELECT * FROM prescriptions

WHERE prescription_id = '$id'

";

$prescription_result =
mysqli_query($conn, $prescription_query);

$prescription =
mysqli_fetch_assoc($prescription_result);



/* =========================
   FETCH CUSTOMERS
========================= */

$customers_query =
"SELECT * FROM customers";

$customers_result =
mysqli_query($conn, $customers_query);



/* =========================
   FETCH MEDICINES
========================= */

$medicines_query =
"SELECT * FROM medicines";

$medicines_result =
mysqli_query($conn, $medicines_query);



/* =========================
   FETCH ITEMS
========================= */

$items_query = "

SELECT * FROM prescription_items

WHERE prescription_id = '$id'

";

$items_result =
mysqli_query($conn, $items_query);



/* =========================
   UPDATE PRESCRIPTION
========================= */

if(isset($_POST['update_prescription'])){

    $customer_id =
    $_POST['customer_id'];

    $start_date =
    $_POST['start_date'];



    // UPDATE MASTER TABLE

    $update_query = "

    UPDATE prescriptions

    SET

    customer_id = '$customer_id',
    start_date = '$start_date'

    WHERE prescription_id = '$id'

    ";

    mysqli_query($conn, $update_query);



    // DELETE OLD ITEMS

    $delete_items_query = "

    DELETE FROM prescription_items

    WHERE prescription_id = '$id'

    ";

    mysqli_query($conn, $delete_items_query);



    // INSERT UPDATED ITEMS

    $medicine_ids =
    $_POST['medicine_id'];

    $quantities =
    $_POST['quantity'];

    $dosages =
    $_POST['dosage_per_day'];



    for($i = 0; $i < count($medicine_ids); $i++){

        $medicine_id =
        $medicine_ids[$i];

        $quantity =
        $quantities[$i];

        $dosage =
        $dosages[$i];



        // REFILL CALCULATION

        $days =
        ceil($quantity / $dosage);

        $next_refill_date =
        date(
            'Y-m-d',
            strtotime(
                "+$days days",
                strtotime($start_date)
            )
        );



        $insert_item_query = "

        INSERT INTO prescription_items

        (
            prescription_id,
            medicine_id,
            quantity,
            dosage_per_day,
            next_refill_date
        )

        VALUES

        (
            '$id',
            '$medicine_id',
            '$quantity',
            '$dosage',
            '$next_refill_date'
        )

        ";

        mysqli_query($conn, $insert_item_query);

    }



    echo "

    <script>

    alert('Prescription Updated Successfully');

    window.location='view.php';

    </script>

    ";

}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

<?php include "../includes/navbar.php"; ?>

<div class="form-container">

    <h3 class="mb-4">

        Edit Prescription

    </h3>

    <form method="POST">

        <!-- CUSTOMER -->

        <div class="row mb-4">

            <div class="col-md-6">

                <label>Customer</label>

                <select
                    name="customer_id"
                    class="form-control"
                    required>

                    <?php

                    while($customer =
                    mysqli_fetch_assoc($customers_result)){

                    ?>

                    <option

                        value="<?php echo $customer['customer_id']; ?>"

                        <?php

                        if(
                            $customer['customer_id']
                            ==
                            $prescription['customer_id']
                        ){
                            echo "selected";
                        }

                        ?>

                    >

                        <?php echo $customer['name']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="col-md-6">

                <label>Start Date</label>

                <input
                    type="date"
                    name="start_date"
                    class="form-control"
                    value="<?php echo $prescription['start_date']; ?>"
                    required>

            </div>

        </div>

        <!-- ITEMS -->

        <div id="items-container">

            <?php

            while($item =
            mysqli_fetch_assoc($items_result)){

            ?>

            <div class="item-box row mb-4">

                <div class="col-md-4">

                    <label>Medicine</label>

                    <select
                        name="medicine_id[]"
                        class="form-control"
                        required>

                        <?php

                        mysqli_data_seek(
                            $medicines_result,
                            0
                        );

                        while($medicine =
                        mysqli_fetch_assoc($medicines_result)){

                        ?>

                        <option

                            value="<?php echo $medicine['medicine_id']; ?>"

                            <?php

                            if(
                                $medicine['medicine_id']
                                ==
                                $item['medicine_id']
                            ){
                                echo "selected";
                            }

                            ?>

                        >

                            <?php echo $medicine['medicine_name']; ?>

                        </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Quantity</label>

                    <input
                        type="number"
                        name="quantity[]"
                        class="form-control"
                        value="<?php echo $item['quantity']; ?>"
                        required>

                </div>

                <div class="col-md-3">

                    <label>Dosage/Day</label>

                    <input
                        type="number"
                        name="dosage_per_day[]"
                        class="form-control"
                        value="<?php echo $item['dosage_per_day']; ?>"
                        required>

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button
                        type="button"
                        class="btn btn-danger remove-item">

                        Remove

                    </button>

                </div>

            </div>

            <?php } ?>

        </div>

        <!-- ADD ITEM -->

        <button
            type="button"
            id="add-item"
            class="btn btn-success mb-4">

            + Add Item

        </button>

        <br>

        <!-- UPDATE -->

        <button
            type="submit"
            name="update_prescription"
            class="btn btn-primary">

            Update Prescription

        </button>

    </form>

</div>

</div>

<!-- DYNAMIC SCRIPT -->

<script>

const addItemBtn =
document.getElementById("add-item");

const itemsContainer =
document.getElementById("items-container");



addItemBtn.addEventListener("click", () => {

    const itemBox =
    document.querySelector(".item-box");

    const newItem =
    itemBox.cloneNode(true);

    newItem.querySelectorAll("input")
    .forEach(input => input.value = "");

    itemsContainer.appendChild(newItem);

});



document.addEventListener("click", function(e){

    if(e.target.classList.contains("remove-item")){

        const itemBoxes =
        document.querySelectorAll(".item-box");

        if(itemBoxes.length > 1){

            e.target.closest(".item-box").remove();

        }

    }

});

</script>

</body>
</html>