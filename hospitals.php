<?php
include 'header.php';

$q1 = "SELECT * FROM `hospitals`";
$row1 = mysqli_query($db,$q1);
// $data1 = mysqli_fetch_assoc($run1);


?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>







<br><br>
<div class="container mt-3">
        <h2>Hospitals</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Hospital Code</th>
              <th>Phone</th>
              <th>City</th>
              <th>Address</th>
              <th>No. of Doctors</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($data1 = mysqli_fetch_assoc($row1)) {
            ?>
              <tr>
                <td><?php echo $data1['name']; ?></td>
                <td><?php echo $data1['email']; ?></td>
                <td><?php echo $data1['hospital_code']; ?></td>
                <td><?php echo $data1['phone']; ?></td>
                <td><?php echo $data1['city']; ?></td>
                <td><?php echo $data1['address']; ?></td>
                <td><?php echo $data1['no_of_specialists']; ?></td>
              </tr>

            <?php } ?>

          </tbody>
        </table>
        <br><br>

      </div>
</main>

<?php
include 'footer.php';
?>