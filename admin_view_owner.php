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
      <h3>OWNER  DETAILS</h3>
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
              <th>Contact Number</th>
              <th>Old Age Home Name</th>
              <th>Location</th>
              <th>Licensce Number</th>
              <th>Proof</th>
              <th>Photo</th>
              <th>Signature</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlView="SELECT * FROM `tbl_owner`";
            $data=mysqli_query($con,$sqlView);
            $counter=1;
            while($row=mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['mobile'];?></td>
              <td><?php echo $row['oldagehomename'];?></td>
              <td><?php echo $row['location'];?></td>
              <td><?php echo $row['lisenceno'];?></td>
              <td><img src="<?php echo $row['proof'];?>"height="100" width="100" /></td>
              <td><img src="<?php echo $row['photo'];?>"height="100" width="100" /></td>
              <td><img src="<?php echo $row['signature'];?>"height="100" width="100" /></td>
              <td><?php echo $row['message'];?></td>
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
