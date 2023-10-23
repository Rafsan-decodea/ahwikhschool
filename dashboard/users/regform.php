<?php include '../extra/nav.php'?>

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="/media/purno.jpg"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

            <form class="px-md-2">

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example1q">Name</label>
                <input type="text" name="name"  id="form3Example1q" class="form-control" />
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">
                  <label for="exampleDatepicker1" class="form-label">Batch</label>
                    <input type="text" class="form-control" name="batch" id="exampleDatepicker1" />
                    <br>
                    <div class=" mb-4">

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

              <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                <div class="col-md-6">

                  <div class="form-outline">
                    <input type="text" id="form3Example1w" class="form-control" />
                    <label class="form-label" for="form3Example1w">Registration code</label>
                  </div>

                </div>
              </div>

              <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php include '../extra/fotter.php';?>
