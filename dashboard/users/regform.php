<?php include '../extra/nav.php'?>

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
                                            <option value="1" disabled>Gender</option>
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
                                    <label class="form-label" for="form3Example1w">Address</label>
                                    <textarea id="form3Example1w" name="address" class="form-control form-control-lg"
                                        rows="3"></textarea>
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

    $uid = $_POST["uid"];
    $name = $_POST["name"];
    $batch = $_POST["batch"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $currentjob = $_POST["currentjob"];

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
<?php include '../extra/fotter.php';?>