<?php
include 'header.php';
if (isset($_SESSION['profile'])) {
    // $id = $_GET['id'];
    $_SESSION['Email'] = $_COOKIE['profile'];
    $e = $_SESSION['Email'];
    $q1 = "SELECT * FROM `users` WHERE `email`='$e' OR `phone` = '$p'";
    $run1 = mysqli_query($db, $q1);
    $data1 = mysqli_fetch_assoc($run1);

    $e = $data1['email'];
?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <main>



        <!-- #####  Update Area Start ##### -->


        <section class="section-padding" id="booking">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="Update-form">


                            <h2 class="text-center mb-lg-3 mb-2">EDIT PROFILE</h2>
                            <hr>
                            <form method="POST">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">First Name:</label>
                                        <input type="text" name="fname" id="name" value="<?php echo $data1['first_name']; ?>" class="form-control" placeholder="Full name" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Last Name:</label>
                                        <input type="text" name="lname" id="name" value="<?php echo $data1['last_name']; ?>" class="form-control" placeholder="Full name" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" value="<?php echo $data1['email']; ?>" class="form-control" placeholder="Email" disabled>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">CNIC:</label>
                                        <input type="number" value="<?php echo $data1['cnic']; ?>" name="cnic" id="date" class="form-control" placeholder="CNIC" disabled>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">City Of Residence:</label>
                                        <select class="form-select" name="city" required>
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
                                        <!-- <input type="text" name="city" class="form-control" placeholder="City Of Residence" required> -->
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Gender:</label>
                                        <select name="gender" class="form-control" required>
                                            <option>Select an option</option>
                                            <option value="Male" <?php if ($data1['gender'] == 'Male') {
                                                                        echo 'selected';
                                                                    } ?>>Male</option>
                                            <option value="Female" <?php if ($data1['gender'] == 'Female') {
                                                                        echo 'selected';
                                                                    } ?>>Female</option>
                                        </select>
                                        <!-- <input type="text" name="gender"  value="<?php echo $data1['gender']; ?>"  class="form-control" placeholder="Gender" required> -->
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Date Of Birth:</label>
                                        <input type="date" name="dob" value="<?php echo $data1['dob']; ?>" class="form-control" placeholder="Date Of Birth" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Age:</label>
                                        <input type="number" name="age" value="<?php echo $data1['age']; ?>" class="form-control" placeholder="Age" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Phone:</label>
                                        <input type="text" name="phone" value="<?php echo $data1['phone']; ?>" class="form-control" placeholder="Age" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3 mt-3">
                                        <label class="form-label">Bio:</label>
                                        <input type="text" name="bio" value="<?php echo $data1['bio']; ?>" class="form-control" placeholder="bio" required>
                                    </div>

                                </div>
                                <br>
                                <div class="col-lg-6 col-md-6 col-6 mx-auto">
                                    <center> <button class="btn btn-primary profile-button" id="submit-button" name="go">Update Info</button></center>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
    if (isset($_POST['go'])) {



        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $c = $_POST['city'];
        $g = $_POST['gender'];
        $d = $_POST['dob'];
        $a = $_POST['age'];
        $b = $_POST['bio'];


        $q = "UPDATE `users` SET `first_name`='$fn', `last_Name`='$ln', `city`='$c', `gender`='$g', `dob`='$d', `age`='$a', `bio`='$b' WHERE `email` = '$e'";


        // print_r($q);
        //  exit();
        mysqli_query($db, $q);


        echo "<script>window.open('profile.php','_self')</script>";
    }
} else {
    include 'footer.php';

    echo "<script>window.open('login.php','_self');</script>";
}

?>