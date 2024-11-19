<?php

include 'header.php';

if (isset($_SESSION['profile'])) {
  
  $_SESSION['Email'] = $_COOKIE['profile'];
    $e = $_SESSION['Email'];

  $q1 = "SELECT * FROM `users` WHERE `email`='$e' OR `phone`='$e'";
  $run = mysqli_query($db, $q1);
  $data = mysqli_fetch_assoc($run);
  //  print_r($q1);
  //  exit();



  $_SESSION['id'] = $data['id'];
  $_SESSION['first_name'] = $data['first_name'];
  $_SESSION['last_name'] = $data['last_name'];
  $_SESSION['cnic'] = $data['cnic'];
  $_SESSION['email'] = $data['email'];
  $_SESSION['bio'] = $data['bio'];
  $_SESSION['phone'] = $data['phone'];
  $_SESSION['dob'] = $data['dob'];
  $_SESSION['gender'] = $data['gender'];
  $_SESSION['age'] = $data['age'];
  $_SESSION['city'] = $data['city'];
  $_SESSION['covid_test_status'] = $data['covid_test_status'];
  $_SESSION['blood group'] = $data['blood group'];
  $_SESSION['vaccine doses'] = $data['vaccine doses'];
  $_SESSION['vaccine_status'] = $data['vaccine_status'];
  // $_SESSION['hospital_name'] = $data['hospital_name'];
  // $_SESSION['doctor_name'] = $data['doctor_name'];



?>









  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



  <!--

TemplateMo 566 Medic Care

https://templatemo.com/tm-566-medic-care

-->
  </head>

  <body>
    <main>

      <section class="section-padding" id="booking">
        <div class="container">
          <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
              <div class="booking-form">

                <h2 class="text-center mb-lg-3 mb-2">PATIENT PROFILE</h2>
                <hr>
                <h5>Personal Information</h5>
                <div class="row">
                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">First Name:</label>
                    <p><?php echo $_SESSION['first_name']; ?></p>
                  </div>
                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Last Name:</label>
                    <p><?php echo $_SESSION['last_name']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">CNIC:</label>
                    <p><?php echo $_SESSION['cnic']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">E-mail:</label>
                    <p><?php echo $_SESSION['email']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">City Of Residence:</label>
                    <p><?php echo $_SESSION['city']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Gender:</label>
                    <p><?php echo $_SESSION['gender']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Phone:</label>
                    <p><?php echo $_SESSION['phone']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Date of Birth:</label>
                    <p><?php echo $_SESSION['dob']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Age:</label>
                    <p><?php echo $_SESSION['age']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Bio:</label>
                    <p><?php echo $_SESSION['bio']; ?></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Vaccination Status:</label>
                    <p><label class="
                        <?php
                        if ($data['covid_test_status'] == 'Covid Positive') {
                          echo "label-pink";
                        } elseif ($data['vaccine_status'] == 'Not Vaccinated') {
                          echo "label-orange";
                        } elseif ($data['vaccine_status'] == 'Pending') {
                          echo "label-blue";
                        } elseif ($data['vaccine_status'] == 'Vaccinated') {
                          echo "label-green";
                        }
                        ?>
                        "><?php
                          if ($data['covid_test_status'] == 'Covid Positive') {
                            echo $data['covid_test_status'];
                          } elseif ($data['vaccine_status'] == 'Not Vaccinated' || $data['vaccine_status'] == 'Pending') {
                            echo $data['vaccine_status'];
                          } elseif ($data['vaccine_status'] == 'Vaccinated') {
                            echo $data['vaccine_status'] . "(" . $data['vaccine doses'] . ")";
                          } ?></label></p>
                  </div>

                  <div class="col-lg-6 col-6 mb-3 mt-3">
                    <label class="form-label">Covid Status:</label>
                    <p><?php echo $_SESSION['covid_test_status']; ?></p>
                  </div>

                  <div class="col-lg-3 col-sm-3 mb-3 mt-3">
                    <a href="setting.php"><button class="form-control profile-button" id="submit-button">Setting</button></a>
                  </div>

                  <div class="col-lg-3 col-sm-3 mb-3 mt-3">
                    <a href="logout.php"><button type="submit" class="form-control profile-button" id="submit-button">logout</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--  <h2>Report Information</h2> -->
      <div class="container mt-3">
        <h2>Report Information</h2>
        <a href="covid-test-appointment.php"><button class="btn btn-primary" name="go">Book an Appointment</button></a>
        <br>
        <hr>
        <?php
        $cnic = $_SESSION['cnic'];
        $test = "SELECT * FROM `covid_test_report` WHERE `cnic`='$cnic'";
        $trow = mysqli_query($db, $test);
        ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Test Id</th>
              <th>Test Name</th>
              <th>Patient Name</th>
              <th>CNIC</th>
              <th>Hospital Name</th>
              <th>Doctor Name</th>
              <th>Test Date</th>
              <th>Test Status</th>
              <th>Detailed Report</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($tdata = mysqli_fetch_assoc($trow)) {
            ?>
              <tr>
                <td><?php echo $tdata['id']; ?></td>
                <td><?php echo $tdata['test_name']; ?></td>
                <td><?php echo $tdata['patient_name']; ?></td>
                <td><?php echo $tdata['cnic']; ?></td>
                <td><?php echo $tdata['hospital_name']; ?></td>
                <td><?php echo $tdata['doctor_name']; ?></td>
                <td><?php echo $tdata['covid_test_date']; ?></td>
                <td><?php echo $tdata['covid_test_status']; ?></td>
                <td><button class="btn btn-primary form-control" name="go">View Report</button></td>
              </tr>

            <?php } ?>

          </tbody>
        </table>

      </div>
      </div>

      </div>
      </div>


    </main>
    <br><br>



  <?php
  include 'footer.php';
} else {
  echo "<script>window.open('login.php','_self');</script>";
}

  ?>