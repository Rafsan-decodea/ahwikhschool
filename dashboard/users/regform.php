<?php include '../extra/nav.php'?>

<?php
if ($_SESSION["uid"] == 1) {
//ini_set('display_errors', 1);
    $uid = $_SESSION["id"];
    $sql = "SELECT * from users_data where uid = $uid ";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        ?>
<br><br>
<table class="table table-striped table-bordered table-responsive">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">mobilenumber</th>
            <th scope="col">Father Name</th>
            <th scope="col">gender</th>
            <th scope="col">batch</th>
            <th scope="col">Present Address</th>
            <th scope="col">Parmanent Address</th>
            <th scope="col">Children</th>
            <th scope="col">Current job</th>
            <th scope="col">Pay Amount</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Action/Trasection ID</th>
        </tr>
        <?php

        $id = $_SESSION["id"];
        $sql = "select * from users_data  where uid = $id";
        $result = $db->query($sql);
        ?>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) {?>
        <tr>

            <th scope="row"><?php echo $number += 1; ?></th>
            <td><?php echo $_SESSION["phone"]; ?></td>
            <td><?php echo $row["fathername"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["batch"]; ?></td>
            <td><?php echo $row["presentaddress"]; ?></td>
            <td><?php echo $row["parmanentaddress"]; ?></td>
            <td><?php echo $row["children"]; ?></td>
            <td><?php echo $row["currentjob"]; ?></td>
            <td><?php echo $row["payamount"]; ?></td>
            <td>
                <?php if ($row["paymentstatus"] == 3) {?>
                <center>
                    <p class='badge text bg-danger'>Reject</p>
                </center>
            <td> <button class="btn btn-primary " id="rejectresone" data-toggle="modal" data-target="#rejectresone">See
                    Resone</button>
            </td>
            <div class="modal fade" id="rejectresone" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <cernter>
                                <h5 class="modal-title" id="exampleModalLabel">Payment Rejected</h5>
                            </cernter>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Bkash_Payment_Reject_Resone
                            </h3><br>
                            <center>
                                <h4><?php echo $row["rejectreson"]; ?></h4>
                            </center>
                            <br>

                        </div>
                        <div class="modal-body">
                            <form id="payform" method="post" action="/dashboard/users/regform.php"
                                enctype="multipart/form-data" class="px-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ReSubmit Bkash Transection ID</label>
                                    <input class="form-control" required name="bkashid" id="emailid"
                                        aria-describedby="emailHelp" Name placeholder="Bkash Transection id">
                                </div>
                                <button data-bind="" name="bikassubmit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                        <?php

            if (isset($_POST["bikassubmit"])) {
                $getid = $_SESSION["id"];
                $bkashid = $_POST["bkashid"];
                $sql = "UPDATE users_data set bkashid='$bkashid',paymentstatus=1 where uid = $getid";
                $db->insert($sql);
                echo " <meta http-equiv='refresh' content='0'>";
            }

            ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            document.getElementById("makePaymentButton").addEventListener("click", function() {
                $('#paymentModal').modal('show');
            });
            </script>
            <?php }?>

            <?php if ($row["paymentstatus"] == 2) {?>
            <center>
                <p class='badge text bg-primary'>Done</p>
            </center>
            <td> <a href="<?php run('/userinvoice', $routes)?>"><button class="btn btn-primary">Download
                        Form</button></a>
            </td>
            <?php }?> <?php

            if ($row["paymentstatus"] == 1) {
                ?> <center>
                <p class='badge text bg-warning'>Pending</p>
                <td><?php echo $row["bkashid"]; ?></td>
            </center>

            <?php }if ($row["paymentstatus"] == 0) {?>
            <button class="badge makepayment bg-info" id="makePaymentButton" data-toggle="modal"
                data-target="#paymentModal">Make Payment</button>
            <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <cernter>
                                <h5 class="modal-title" id="exampleModalLabel">Payment info</h5>
                            </cernter>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Bkash_Payment_INFO
                                জামাল উদ্দিন আহাম্মদ (সহকারী প্রধান শিক্ষক) : <br><br>
                                <center><mark>01927163143</mark></center>
                            </h3><br>
                            <center>
                                <h4><?php echo $row["payamount"]; ?>/- এই নম্বর এ বিকাশ করে ট্রান্সেকশন আইডি টি সাবমিট
                                    করুন । </h4>
                            </center>
                            <br>
                            <h4>
                                <p style="color:red">উল্লেখ : পেমেন্ট সম্পূর্ণ করার পরে আপনি আপনার ইনফরমেশন আর
                                    এডিট
                                    করতে
                                    পারবেন না ।</p>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form id="payform" method="post" action="/dashboard/users/regform.php"
                                enctype="multipart/form-data" class="px-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bkash Transection ID</label>
                                    <input class="form-control" required name="bkashid" id="emailid"
                                        aria-describedby="emailHelp" Name placeholder="Bkash Transection id">
                                </div>
                                <button data-bind="" name="bikassubmit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <script>
                        function showConfirmation() {
                            var isConfirmed = window.confirm("Are you sure you want to submit this form?");
                            if (isConfirmed) {
                                var form = document.getElementById("payform");
                                form.submit();
                            } else {
                                // If the user clicks "Cancel" in the confirmation dialog, do nothing or take any other action.
                            }
                        }
                        </script>
                        <?php

                if (isset($_POST["bikassubmit"])) {
                    $getid = $_SESSION["id"];
                    $bkashid = $_POST["bkashid"];
                    $sql = "UPDATE users_data set bkashid='$bkashid',paymentstatus=1 where uid = $getid";
                    $db->insert($sql);
                    echo " <meta http-equiv='refresh' content='0'>";
                }

                ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            document.getElementById("makePaymentButton").addEventListener("click", function() {
                $('#paymentModal').modal('show');
            });
            </script>

            </td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Edit Data
                </button></td>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/dashboard/users/regform.php" enctype="multipart/form-data"
                                class="px-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input class="form-control" value="<?php echo $_SESSION["name"] ?>" name="name"
                                        id="emailid" aria-describedby="emailHelp" Name placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Father Name</label>
                                    <input class="form-control" value="<?php echo $row["fathername"] ?>"
                                        name="fathername" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CurrentJob</label>
                                    <input class="form-control" value="<?php echo $row["currentjob"] ?>"
                                        name="currentjob" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Your Job">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Batch</label>
                                    <input class="form-control" value="<?php echo $row["batch"] ?>" name="batch"
                                        id="emailid" aria-describedby="emailHelp" Name placeholder="Your batch">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Present Address</label>
                                    <input class="form-control" value="<?php echo $row["presentaddress"]; ?>"
                                        name="presentaddress" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Your Present Address">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Parmanent Address</label>
                                    <input class="form-control" value="<?php echo $row["parmanentaddress"]; ?>"
                                        name="parmanentaddress" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Parmanent Address">
                                </div>
                                <div class="mb-3">
                                    <label for="imageInput" class="form-label">Update Image</label>
                                    <input type="file" name="image" class="form-control" id="imageInput"
                                        accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img height="200" width="300" id="imagePreview"
                                        src="/dashboard/images/<?php echo $row["picture"]; ?>" alt="Image Preview"
                                        class="img-fluid">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Children</label>
                                    <input class="form-control" value="<?php echo $row["children"]; ?>" name="children"
                                        id="emailid" aria-describedby="emailHelp" Name placeholder="Children">
                                </div>
                                <button onclick="" data-bind="" name="submit" class="btn btn-primary">update</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php

                if (isset($_POST["submit"])) {
                    $id = $_SESSION["id"];
                    $name = $_POST["name"];
                    $fathername = $_POST["fathername"];
                    $batch = $_POST["batch"];
                    //$gender = $_POST["gender"];
                    $presentaddress = $_POST["presentaddress"];
                    $parmanentaddress = $_POST["parmanentaddress"];
                    $children = $_POST["children"];
                    $currentjob = $_POST["currentjob"];
                    $payamount = 700 + $children * 400;
                    $randomName = '';
                    $existingImagePath = $_SERVER['DOCUMENT_ROOT'] . '/dashboard/images/' . $row["picture"];

                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        if (file_exists($existingImagePath)) {
                            $tempFile = $_FILES['image']['tmp_name'];
                            $randomName = 'image_' . uniqid() . '.jpg';
                            $targetFile = '../images/' . $randomName;
                            if ($_FILES["image"]["size"] > 500000) { // 500 KB in bytes
                                echo "<a style='color:red'>Sorry, your file is too large. It must be under 500 KB</a>";
                                exit();
                            }
                            if (move_uploaded_file($tempFile, $targetFile)) {

                                $sql = "UPDATE  users_data set batch='$batch',fathername='$fathername',presentaddress='$presentaddress',parmanentaddress='$parmanentaddress',children=$children,picture='$randomName',currentjob='$currentjob',payamount=$payamount where uid = $id";
                                unlink($existingImagePath);
                                $db->update($sql);
                                $getid = $_SESSION["id"];
                                $sql2 = "UPDATE  users set name='$name' where id=$getid";
                                $db->update($sql2);
                                $_SESSION["name"] = $name;
                                echo " <meta http-equiv='refresh' content='0'>";
                            } else {
                                echo "Image upload failed.";
                            }
                        } else {
                            echo "<a style='color:red'>No image selected or an error occurred.</a>";
                        }
                    } else {
                        $getid = $_SESSION["id"];
                        $sql = "UPDATE  users_data set batch='$batch',fathername='$fathername',presentaddress='$presentaddress',parmanentaddress='$parmanentaddress',children=$children,currentjob='$currentjob',payamount=$payamount where uid = $getid";
                        $db->update($sql);
                        $sql2 = "UPDATE  users set name='$name' where id=$getid";
                        $db->update($sql2);
                        $_SESSION["name"] = $name;
                        echo " <meta http-equiv='refresh' content='0'>";

                    }

                }

                ?>

        </tr>
        <?php }
            $result->free();?>
    </tbody>
</table>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    imageInput.addEventListener("change", function() {
        const file = imageInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
        }
    });
});
</script>
<?php include '../extra/fotter.php';?>
<?php
}} else {
        ?>

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
                <img src="/media/purno.jpg" class="w-100"
                    style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
                    <h5 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Per Person Cost 700/-</h5>
                    <form method="post" action="/dashboard/users/regform.php" enctype="multipart/form-data"
                        class="px-md-2">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Name</label>
                            <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" id="form3Example1q"
                                class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Father Name</label>
                            <input type="text" name="fathername" id="form3Example1q" class="form-control" />
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline datepicker">
                                    <label for="exampleDatepicker1" class="form-label">Batch</label>
                                    <input type="text" class="form-control" name="batch" id="exampleDatepicker1" />
                                    <br>
                                    <div class=" mb-4">
                                        <label for="exampleDatepicker1" class="form-label">Gender</label><br>
                                        <select name="gender" class="select">
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                            <option value="4">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" mb-4 ">
                            <div class="">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1w">Present Address</label>
                                    <textarea id="form3Example1w" name="presentaddress"
                                        class="form-control form-control-lg" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class=" mb-4 ">
                            <div class="">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1w">Parmanent Address</label>
                                    <textarea id="form3Example1w" name="parmanentaddress"
                                        class="form-control form-control-lg" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <h5>Image</h5>

                        <div class="mb-3">
                            <label for="imageInput" class="form-label">Select Image</label>
                            <small>(pic size must be with in 500 kb)</small>
                            <input type="file" name="image" class="form-control" id="imageInput" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <img height="100" width="100" id="imagePreview" src="" alt="Image Preview"
                                class="img-fluid">
                        </div>
                        <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1w">Children</label>
                                    <small>(Per Children Fee 400/-)</small>
                                    <input type="number" value="0" name="children" id="form3Example1w" name="currentjob"
                                        class="form-control form-control-lg" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1w">Current Job</label>
                                    <input type="text" id="form3Example1w" name="currentjob"
                                        class="form-control form-control-lg" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-lg mb-1">Submit</button>
                    </form>
                    <?php

        if (isset($_POST["submit"])) {

            $uid = $_SESSION["id"];
            $name = $_POST["name"];
            $fathername = $_POST["fathername"];
            $batch = $_POST["batch"];
            $gender = $_POST["gender"];
            $presentaddress = $_POST["presentaddress"];
            $parmanentaddress = $_POST["parmanentaddress"];
            $children = $_POST["children"];
            $currentjob = $_POST["currentjob"];
            $payamout = 700 + $children * 400;
            $randomName = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $tempFile = $_FILES['image']['tmp_name'];
                $randomName = 'image_' . uniqid() . '.jpg';
                $targetFile = '../images/' . $randomName;
                if ($_FILES["image"]["size"] > 500000) { // 500 KB in bytes
                    echo "<a style='color:red'>Sorry, your file is too large. It must be under 500 KB</a>";
                    exit();
                }
                if (move_uploaded_file($tempFile, $targetFile)) {

                    $sql = "INSERT INTO  users_data (uid,batch,gender,fathername,presentaddress,parmanentaddress,children,picture,currentjob,payamount,paymentstatus) values ($uid,'$batch','$gender','$fathername','$presentaddress','$parmanentaddress',$children,'$randomName','$currentjob',$payamout,0)";
                    $db->insert($sql);
                    $getid = $_SESSION["id"];
                    $sql2 = "UPDATE  users set name='$name' where id=$getid";
                    $db->update($sql2);
                    $_SESSION["name"] = $name;
                    echo " <meta http-equiv='refresh' content='0'>";

                    ?>
                    <h4 style="color:green">Registration success!!! Please Refresh Page </h4>
                    <?php

                } else {
                    echo "Image upload failed.";
                }
            } else {
                echo "<a style='color:red'>No image selected or an error occurred.</a>";
            }

        }

        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    imageInput.addEventListener("change", function() {
        const file = imageInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
        }
    });
});
</script>

<?php
}
}
?>
<?php include '../extra/fotter.php';?>