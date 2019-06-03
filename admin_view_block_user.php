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
      <h3>APPROVED USERS DETAILS</h3>
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
              <th>Name</th>
              <th>Address</th>
              <th>Contact Number</th>
              <th>Occupation</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlView="SELECT * FROM `tbl_user_reg` WHERE status='rejected'";
            $data=mysqli_query($con,$sqlView);
            $counter=1;
            while($row=mysqli_fetch_array($data)){
            ?>
            <tr>
            <td><?php echo $counter;?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['address'];?></td>
              <td><?php echo $row['phone'];?></td>
              <td><?php echo $row['occupation'];?></td>
              <td><?php echo $row['status'];?></td>
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
