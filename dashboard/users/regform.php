<?php include '../extra/nav.php'?>

<?php

$uid = $_SESSION["id"];
$sql = "SELECT * from users_data where uid = $uid ";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">mobilenumber</th>
            <th scope="col">gender</th>
            <th scope="col">Present Address</th>
            <th scope="col">Parmanent Address</th>
            <th scope="col">Children</th>
            <th scope="col">Current job</th>
            <th scope="col">Payment Status</th>
        </tr>
        <?php
// ini_set('display_errors', 1);
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
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["presentaddress"]; ?></td>
            <td><?php echo $row["parmanentaddress"]; ?></td>
            <td><?php echo $row["children"]; ?></td>
            <td><?php echo $row["currentjob"]; ?></td>
            <td><?php if ($row["paymentstatus"] == 1) {echo "<p class='badge text-bg-primary'> Complete</p>";}
        echo "<p class='badge text-bg-warning'> Pending</p>";?>
            </td>

        </tr>
        <?php }
    $result->free();?>
    </tbody>
</table>

<?php
} else {
    ?>

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
                <img src="/media/purno.jpg" class="w-100"
                    style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
                    <form method="post" action="/dashboard/users/regform.php" enctype="multipart/form-data"
                        class="px-md-2">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Name</label>
                            <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" id="form3Example1q"
                                class="form-control" />
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
                                    <small>(If no Children fill with 0)</small>
                                    <input type="number" name="children" id="form3Example1w" name="currentjob"
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
        $batch = $_POST["batch"];
        $gender = $_POST["gender"];
        $presentaddress = $_POST["presentaddress"];
        $parmanentaddress = $_POST["parmanentaddress"];
        $children = $_POST["children"];
        $currentjob = $_POST["currentjob"];
        $randomName = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tempFile = $_FILES['image']['tmp_name'];
            $randomName = 'image_' . uniqid() . '.jpg';
            $targetFile = '../images/' . $randomName;

            if (move_uploaded_file($tempFile, $targetFile)) {

                $sql = "INSERT INTO  users_data (uid,batch,gender,presentaddress,parmanentaddress,children,picture,currentjob,paymentstatus) values ($uid,'$batch','$gender','$presentaddress','$parmanentaddress',$children,'$randomName','$currentjob',0)";
                $db->insert($sql);
                $getid = $_SESSION["id"];
                $sql2 = "UPDATE  users set name='$name' where id=$getid";
                $db->update($sql2);
                $_SESSION["name"] = $name;
                $_SESSION["profilepic"] = $randomName;

                ?>
                    <h4 style="color:green">Registration success!!! Please Refresh Page </h4>
                    <?php

            } else {
                echo "Image upload failed.";
            }
        } else {
            echo "No image selected or an error occurred.";
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
?>
<?php include '../extra/fotter.php';?>