<?php include '../extra/nav.php'?>

<?php
if ($_SESSION["uid"] == 0) {
//ini_set('display_errors', 1);
    // $uid = $_SESSION["id"];
    // $sql = "SELECT * from users_data where uid = $uid ";
    // $result = $db->query($sql);

    ?>
<br><br>
<style>
.hidden {
    display: none;
}
</style>
<button id="pendingpaymentbutton" class="btn btn-warning">Pending Payment</button>
<button id="approvetablebutton" class="btn btn-success">Approve</button>
<button id="rejecttablebutton" class="btn btn-danger">Reject</button>
<br><br>
<table id="approvetable" class="table hidden table-bordered table-responsive">
    <thead>
        <tr id="lazyTable">
            <th scope="col">Count</th>
            <th scope="col">picture</th>
            <th scope="col">Name</th>
            <th scope="col">batch</th>
            <th scope="col">Children</th>
            <th scope="col">Total Pay</th>
            <th scope="col">Bkash id</th>
            <th scope="col">Status</th>

        </tr>
        <?php

    $sql = "select * from users_data where paymentstatus = 2";
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
            <td><?php echo $row["batch"] ?></td>
            <td><?php echo $row["children"] ?></td>
            <td><?php echo $row["payamount"] ?></td>
            <td><?php echo $row["bkashid"] ?></td>
            <td>
                <p class='badge text bg-primary'>Done</p>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
<table id="pendingpaymentable" class="table hidden table-bordered table-responsive">
    <thead>
        <tr id="lazyTable">
            <th scope="col">Count</th>
            <th scope="col">picture</th>
            <th scope="col">Name</th>
            <th scope="col">batch</th>
            <th scope="col">Children</th>
            <th scope="col">Total Pay</th>
            <th scope="col">Bkash id</th>
            <th scope="col">Status</th>
            <th scope="col">action</th>

        </tr>
        <?php

    $sql = "select * from users_data where paymentstatus = 1";
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
            <td><?php echo $row["batch"] ?></td>
            <td><?php echo $row["children"] ?></td>
            <td><?php echo $row["payamount"] ?></td>
            <td><?php echo $row["bkashid"] ?></td>
            <td>
                <p class='badge text bg-warning'>Pending</p>
            </td>
            <td>
                <form method="post" action="<?php run('/paymentinfo', $routes)?>">
                    <button name="submit" class="btn btn-primary">Make Done</button>
                </form><br>
                <?php
if (isset($_POST["submit"])) {
            $id = $row["uid"];
            $sql = "UPDATE users_data set paymentstatus=2 where uid = $id ";
            $db->insert($sql);
            echo " <meta http-equiv='refresh' content='0'>";
        }
        ?>
                <button class="btn btn-danger" id="makePaymentButton" data-toggle="modal"
                    data-target="#rejectModal">Make reject</button>
                <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <cernter>
                                    <h5 class="modal-title" id="exampleModalLabel">Reject Info</h5>
                                </cernter>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3>পেমেন্ট রিজেক্ট করার কারণ বর্ণনা করুন ক্লায়েন্ট কে <br><br>

                                </h3>
                                <form id="payform" method="post" action="<?php run('/paymentinfo', $routes)?>"
                                    enctype="multipart/form-data" class="px-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tell resone</label>
                                        <textarea class="form-control" required name="whatisreason" id="emailid"
                                            aria-describedby="emailHelp" Name
                                            placeholder="Bkash Transection id"></textarea>
                                    </div>
                                    <button data-bind="" name="rejectsubmit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-body">

                            </div>

                            <?php

        if (isset($_POST["rejectsubmit"])) {
            $id = $row["uid"];
            $resone = $_POST["whatisreason"];
            $sql = "UPDATE users_data set paymentstatus=3,rejectreson='$resone' where uid = $id";
            $db->update($sql);
            echo " <meta http-equiv='refresh' content='0'>";
        }

        ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        <?php }?>
    </tbody>
</table>

<table id="rejecttable" class="table hidden  table-bordered table-responsive">
    <thead>
        <tr id="lazyTable">
            <th scope="col">Count</th>
            <th scope="col">picture</th>
            <th scope="col">Name</th>
            <th scope="col">batch</th>
            <th scope="col">Children</th>
            <th scope="col">Total Pay</th>
            <th scope="col">Bkash id</th>
            <th scope="col">Status</th>
            <th scope="col">Resone</th>

        </tr>
        <?php

    $sql = "select * from users_data where paymentstatus = 3";
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
            <td><?php echo $row["batch"] ?></td>
            <td><?php echo $row["children"] ?></td>
            <td><?php echo $row["payamount"] ?></td>
            <td><?php echo $row["bkashid"] ?></td>
            <td>
                <p class='badge text bg-danger'>Reject</p>
            </td>
            <td><?php echo $row["rejectreson"] ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$("#approvetable").hide();
$("#pendingpaymentable").hide();
$("#rejecttable").hide();

$("#pendingpaymentbutton").click(function() {
    $("#approvetable").hide();
    $("#pendingpaymentable").show();
    $("#rejecttable").hide();
});
$("#approvetablebutton").click(function() {
    $("#approvetable").show();
    $("#pendingpaymentable").hide();
    $("#rejecttable").hide();
});
$("#rejecttablebutton").click(function() {
    $("#approvetable").hide();
    $("#pendingpaymentable").hide();
    $("#rejecttable").show();
});
</script>
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
<?php }
include '../extra/fotter.php';?>