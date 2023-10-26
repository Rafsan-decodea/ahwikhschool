<?php include '../extra/nav.php'?>

<?php
if ($_SESSION["uid"] == 0) {
    // ini_set('display_errors', 1);
    ?>
<br><br>
<table class="table  table-bordered table-responsive">
    <thead>
        <tr id="lazyTable">
            <th scope="col">Count</th>
            <th scope="col">picture</th>
            <th scope="col">Name</th>
            <th scope="col">Father Name</th>
            <th scope="col">gender</th>
            <th scope="col">batch</th>
            <th scope="col">Present Address</th>
            <th scope="col">Parmanent Address</th>
            <th scope="col">Children</th>
            <th scope="col">Current Job</th>
        </tr>
        <?php

    $id = $_SESSION["id"];
    $sql = "select * from users_data ";
    $result = $db->query($sql);
    ?>
    </thead>
    <tbody id="tableBody">
        <?php while ($row = $result->fetch_assoc()) {?>
        <tr>
            <th scope="row"><?php echo $number += 1; ?></th>
            <td><img height="80" width="80" src="/dashboard/images/<?php echo $row["picture"] ?>" alt="Profile 1"
                    class="rounded-profile"></td>
            <td><?php $id = $row["uid"];
        $data = $db->query("select name from users where id = $id ");while ($row1 = $data->fetch_assoc()) {echo $row1["name"];}
        $data->free();?>
            </td>
            <td><?php echo $row["fathername"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["batch"] ?></td>
            <td><?php echo $row["presentaddress"] ?></td>
            <td><?php echo $row["parmanentaddress"] ?></td>
            <td><?php echo $row["children"] ?></td>
            <td><?php echo $row["currentjob"] ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<script>
const table = document.getElementById('lazyTable');
const tableBody = document.getElementById('tableBody');
let currentPage = 1; // Track the current page of data
const itemsPerPage = 5; // Number of items to load per page

// Function to load more data when the user scrolls
function loadMoreData() {
    if (table.clientHeight + table.scrollTop >= table.scrollHeight) {
        // User has scrolled to the bottom, load more data
        $.ajax({
            url: `load_data.php?page=${currentPage}&items=${itemsPerPage}`, // Replace with your data source URL
            method: 'GET',
            success: function(data) {
                // Append the loaded data to the table
                tableBody.innerHTML += data;
                currentPage++;
            },
        });
    }
}

// Attach the loadMoreData function to the table's scroll event
table.addEventListener('scroll', loadMoreData);

// Initial data load
loadMoreData();
</script>
<?php }?>

<?php include '../extra/fotter.php';?>