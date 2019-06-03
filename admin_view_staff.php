<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
include 'components/nav/admin_header.php';
?>

<section id="content">
  <div class="container">
    <header class="page-header">
      <h3>STAFF DETAILS</h3>
    </header>
    <div class="tile">
      <!-- <div class="t-header">
        <div class="th-title">Basic Table <small>For basic styling—light padding and only horizontal dividers—add the base class .table to any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for other plugins like calendars and date pickers, we've opted to isolate our custom table styles.</small></div>
      </div> -->
      <div class="table-responsive m-t-20">
        <table class="table">
          <thead>
            <tr>
            <th>SI.NO</th>
              <th>SI.NO</th>
              <th>Staff ID</th>
              <th>Staff Name</th>
              <th>Birt Date</th>
              <th>Age Proof</th>
              <th>Gender</th>
              <th>GMarital status</th>
              <th>Designation</th>
              <th>Photo</th>
              <th>Qualification</th>
              <th>Qualification Proof</th>
              <th>Present Address</th>
              <th>Permenent Address</th>
              <th>Appoinment Date</th>
              <th>Joining Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlView="SELECT * FROM `tbl_staff` WHERE status='1'";
            $data=mysqli_query($con,$sqlView);
            $counter=1;
            while($row=mysqli_fetch_array($data)){
            ?>
            <tr>
            <td><?php echo $counter;?></td>
              <td><?php echo $row['empid'];?></td>
              <td><?php echo $row['emp_name'];?></td>
              <td><?php echo $row['dob'];?></td>
              <td><img src="<?php echo $row['age_proof'];?>"height="100" width="100" /></td>
              <td><?php echo $row['gender'];?></td>
              <td><?php echo $row['marital_status'];?></td>
              <td><?php echo $row['designation'];?></td>
              <td><img src="<?php echo $row['photo'];?>"height="100" width="100" /></td>
              <td><?php echo $row['qualification'];?></td>
              <td><img src="<?php echo $row['qualification_proof'];?>"height="100" width="100" /></td>
              <td><?php echo $row['present_address'];?></td>
              <td><?php echo $row['permenent_address'];?></td>
              <td><?php echo $row['date_of_appoit'];?></td>
              <td><?php echo $row['date_of_joining'];?></td>
            </tr>
            <?php
            $counter++;
          }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </section>
