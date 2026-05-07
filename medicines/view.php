<?php

include "../includes/db.php";

$search = "";

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $query = "

    SELECT * FROM medicines

    WHERE medicine_name LIKE '%$search%'

    OR company_name LIKE '%$search%'

    ORDER BY medicine_id DESC

    ";

} else {

    $query = "

    SELECT * FROM medicines

    ORDER BY medicine_id DESC

    ";

}

$result = mysqli_query($conn, $query);

$result = mysqli_query($conn, $query);

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="table-section">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>All Medicines</h3>
            <form method="GET" class="mb-4">

    <div class="search-box">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by medicine or company"
            value="<?php echo $search; ?>">

        <button
            type="submit"
            class="btn btn-primary">

            Search

        </button>

    </div>

</form>

            <a href="add.php" class="btn btn-primary">
                Add Medicine
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Medicine Name</th>
                        <th>Type</th>
                        <th>Stock</th>
                        <th>Expiry Date</th>
                        <th>Refill Days</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                    ?>

                    <tr>

                        <td><?php echo $row['medicine_id']; ?></td>

                        <td><?php echo $row['medicine_name']; ?></td>

                        <?php echo $row['medicine_type']; ?>

                        <td><?php echo $row['stock_quantity']; ?></td>

                        <td><?php echo $row['expiry_date']; ?></td>

                        <td><?php echo $row['refill_days']; ?></td>

                        <td>₹<?php echo $row['price']; ?></td>

                        <td>

                            <a href="edit.php?id=<?php echo $row['medicine_id']; ?>"
                               class="btn btn-sm btn-warning">

                               Edit

                            </a>

                            <a href="delete.php?id=<?php echo $row['medicine_id']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Delete this medicine?')">

                               Delete

                            </a>

                        </td>

                    </tr>

                    <?php

                        }

                    } else {

                        echo "
                        <tr>
                            <td colspan='7' class='text-center'>
                                No Medicines Found
                            </td>
                        </tr>
                        ";

                    }

                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>