<?php

include 'header.php';

if (isset($_SESSION['profile'])) {

    // INSERT INTO `vaccination_bookings`( `first_name`, `last_name`, `email`, `phone`, `cnic`, `dob`, `gender`, `city`, `vaccine`, `vaccination_hospital`, `vaccination_specialist`, `date_of_appointment`, `time_of_appointment`, `vaccine_dose`, `vaccine_status`) VALUES ('Rabnawaz','Abdul Khaliq','rabnawaz@gmail.com','03178873513','5150168709913','2001-12-07','Male','Karachi','Pfizer','Jinnah Hospital','Nasir','2023-08-01','11:00','2','Vaccinated');

    $_SESSION['Email'] = $_COOKIE['profile'];
    $e = $_SESSION['Email'];
    $q1 = "SELECT * FROM `users` WHERE `email`='$e' OR `phone`='$e'";
    $run1 = mysqli_query($db, $q1);
    $data1 = mysqli_fetch_assoc($run1);



    // $_SESSION['id'] = $data1['id'];
    // $_SESSION['first_name'] = $data1['first_name'];
    // $_SESSION['last_name'] = $data1['last_name'];
    // $_SESSION['cnic'] = $data1['cnic'];
    // $_SESSION['email'] = $data1['email'];
    // $_SESSION['bio'] = $data1['bio'];
    // $_SESSION['phone'] = $data1['phone'];
    // $_SESSION['dob'] = $data1['dob'];
    // $_SESSION['gender'] = $data1['gender'];
    // $_SESSION['age'] = $data1['age'];
    // $_SESSION['city'] = $data1['city'];
    // $_SESSION['covid_test_status'] = $data1['covid_test_status'];
    // $_SESSION['blood group'] = $data1['blood group'];
    // $_SESSION['vaccine doses'] = $data1['vaccine doses'];
    // $_SESSION['vaccine_status'] = $data1['vaccine_status'];

    $fn = $data1['first_name'];
    $ln = $data1['last_name'];
    $cnic = $data1['cnic'];
    $email = $data1['email'];
    $p = $data1['phone'];
    $dob = $data1['dob'];
    $gender = $data1['gender'];
    $city = $data1['city'];

    $city = $data1['city'];
    $q2 = "SELECT * FROM `hospitals` WHERE `city`='$city'";
    $row2 = mysqli_query($db, $q2);

    //   $city = $data1['city'];
    $q3 = "SELECT * FROM `vaccines`";
    $row3 = mysqli_query($db, $q3);

    // $hosptl = $_POST['hospital'];
    // $q4 = "SELECT * FROM `specialists` WHERE `hsptl`='$hosptl'";
    // $row4 = mysqli_query($db, $q4);


    $cnic = $_SESSION['cnic'];
    $cv = "SELECT * FROM `vaccination_bookings` WHERE `cnic`='$cnic'";
    $rowv = mysqli_query($db,$cv);
    $countv = mysqli_num_rows($rowv);

    if($countv == 2){
        echo "<style>.hb{display: none;}</style>";
    }

    // $cnic = $_SESSION['cnic'];
    $ct = "SELECT * FROM `vaccination_bookings` WHERE `cnic`='$cnic' AND `vaccine_status`!='Vaccinated'";
    $rowt = mysqli_query($db, $ct);
    $countt = mysqli_num_rows($rowt);

    if ($countt == 1) {
        echo "<style>.hb{display: none;}</style>";
    }




?>


    <section class="section-padding hb" id="booking">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto ">
                    <div class="booking-form">

                        <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>
                        <hr>
                        <h5>Patient Information</h5>
                        <p>If you want to change your personal info go to profile.</p>
                        <div class="row">
                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <form method="POST">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" name="fname" id="name" class="form-control" value="<?php echo $_SESSION['FName']; ?>" placeholder="Full name" required disabled>
                            </div>

                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <label class="form-label">Last Name:</label>
                                <input type="text" name="lname" id="name" class="form-control" value="<?php echo $_SESSION['LName']; ?>" placeholder="Full name" required disabled>
                            </div>

                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <label class="form-label">E-mail:</label>
                                <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" placeholder="Email address" required disabled>
                            </div>

                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <label class="form-label">Phone:</label>
                                <input type="telephone" name="phone" id="phone" value="<?php echo $_SESSION['phone']; ?>" class="form-control" placeholder="Phone: 123-456-7890" required disabled>
                            </div>

                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <label class="form-label">CNIC:</label>
                                <input type="text" name="cnic" id="phone" value="<?php echo $_SESSION['cnic']; ?>" class="form-control" placeholder="Phone: 123-456-7890" required disabled>
                            </div>

                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <label class="form-label">Date of Birth:</label>
                                <input type="date" name="dob" id="date" value="<?php echo $_SESSION['dob']; ?>" class="form-control" placeholder="Date Of Birth:" required disabled>
                            </div>
                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <label class="form-label">Gender:</label>
                                <select class="form-select" name="gender" required disabled>
                                    <!-- <option>Select an option</option> -->
                                    <option <?php if ($data1['gender'] == 'Male') {
                                                echo 'selected';
                                            } ?>>Male</option>
                                    <option <?php if ($data1['gender'] == 'Female') {
                                                echo 'selected';
                                            } ?>>Female</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-12 mb-3 mt-3">
                                <label class="form-label">City Of Residence:</label>
                                <select class="form-select" name="city" required disabled>
                                    <option value="Karachi" <?php if ($data1['city'] == 'Karachi') {
                                                                echo 'selected';
                                                            } ?>>Karachi</option>
                                    <option <?php if ($data1['city'] == 'Lahore') {
                                                echo 'selected';
                                            } ?>>Lahore</option>
                                    <option <?php if ($data1['city'] == 'Islamabad') {
                                                echo 'selected';
                                            } ?>>Islamabad</option>
                                    <option <?php if ($data1['city'] == 'Peshawar') {
                                                echo 'selected';
                                            } ?>>Peshawar</option>
                                </select>
                            </div>




                            <section class="section-padding pb-0" id="timeline">
                                <h5>Appointment Information</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Covid Vaccination:</label>
                                        <select class="form-select" name="covidvaccine" required>
                                            <!-- <option disabled>Select an option</option> -->
                                            <?php while ($data3 = mysqli_fetch_assoc($row3)) { ?>
                                                <option value="<?php echo $data3['name']; ?>"><?php echo $data3['name']; ?></option>
                                                <!-- <option>Sinovac</option> -->
                                                <!-- <option>Pfizer</option> -->
                                                <!-- <option>Moderna</option>   -->
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Vaccination Hospital:</label>
                                        <select class="form-select" name="hospital" required>
                                            <?php while ($data2 = mysqli_fetch_assoc($row2)) { ?>
                                                <option value="<?php echo $data2['name']; ?>"><?php echo $data2['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Date of Appointment:</label>
                                        <input type="date" name="doa" min="<?= date('Y-m-d', strtotime('+2 days')); ?>" class="form-control" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Time of Appointment:</label>
                                        <select class="form-select" name="toa" required>
                                            <?php
                                            for ($i = 7; $i <= 22; $i++) {
                                                echo "<option value='$i:00'>$i:00</option>";
                                            }
                                            ?>
                                        </select>
                                        <!-- <input type="datetime" name="toa" class="form-control" placeholder="E.g. 7:00AM - 10:00PM"> -->
                                    </div>

                                    <!-- <div class="col-lg-6 col-12 mb-3 mt-3"> -->
                                    <!-- <label class="form-label">Specialists:</label> -->
                                    <!-- <select class="form-select" name="specialist" id="specialist"> -->

                                    <!-- <option>Dr.?></option> -->
                                    <!-- <option>Antigen</option>
                                                <option>Antibody Test (Serology Test or BloodTest)</option>
                                                <option>PCR</option> -->
                                    <?php
                                    // }
                                    ?>
                                    <!-- </select> -->
                                    <!-- </div> -->
                                    <!-- <div class="col-lg-6 col-12 mb-3 mt-3">
                                            <label class="form-label">Reason for Appointment:</label>
                                            <input class="form-control" id="message" name="message">
                                        </div> -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="submit">Book Now</button>
                                    <?php
                                    if (isset($_POST['submit'])) {

                                        $cv = $_POST['covidvaccine'];
                                        $hospital = $_POST['hospital'];
                                        $doa = $_POST['doa'];
                                        $toa = $_POST['toa'];

                                        $sc = "SELECT * FROM `hospitals` WHERE `name`='$hospital'";
                                        $scrun = mysqli_query($db,$sc);
                                        $scdata = mysqli_fetch_assoc($scrun);
                                        $hc = $scdata['hospital_code'];

                                        $book = "INSERT INTO `vaccination_bookings`(`first_name`, `last_name`, `email`, `phone`, `cnic`, `dob`, `gender`, `city`, `vaccine`, `vaccination_hospital`, `hospital_code`, `date_of_appointment`, `time_of_appointment`) VALUES('$fn','$ln','$email','$p','$cnic','$dob','$gender','$city','$cv','$hospital','$hc','$doa','$toa')";
                                        
                                        // print_r($book);
                                        // exit();
                                        mysqli_query($db, $book);
                                        echo "<script>window.open('profile.php','_self');</script>";
                                    }


                                    ?>
                                </div>
                        </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    </main>

    <div class="container mt-3">
        <h2>Covid Vaccination</h2>
        <?php
        $cnic = $_SESSION['cnic'];
        $test = "SELECT * FROM `vaccination_bookings` WHERE `cnic`='$cnic'";
        $trow = mysqli_query($db, $test);
        ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Booking Id</th>
              <th>Full Name</th>
              <th>CNIC</th>
              <th>Hospital Name</th>
              <th>Doctor Name</th>
              <th>Vaccine</th>
              <th>Date of Vaccination</th>
              <th>Vaccine Dose</th>
              <th>Vaccine Status</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($tdata = mysqli_fetch_assoc($trow)) {
            ?>
              <tr>
                <td><?php echo $tdata['id']; ?></td>
                <td><?php echo $tdata['first_name'] ." ". $tdata['last_name']; ?></td>
                <td><?php echo $tdata['cnic']; ?></td>
                <td><?php echo $tdata['vaccination_hospital']; ?></td>
                <td><?php echo $tdata['vaccination_specialist']; ?></td>
                <td><?php echo $tdata['vaccine']; ?></td>
                <td><?php echo $tdata['date_of_appointment']; ?></td>
                <td><?php echo $tdata['vaccine_dose']; ?></td>
                <td><?php echo $tdata['vaccine_status']; ?></td>
                <!-- <td><button class="btn btn-primary form-control" name="go">View Report</button></td> -->
              </tr>

            <?php } ?>

          </tbody>
        </table>

      </div>



<?php
    include 'footer.php';
} else {
    echo "<script>window.open('login.php','_self');</script>";
}
?>