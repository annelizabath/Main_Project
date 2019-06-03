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
      <h3>BOOKED INMATES DETAILS</h3>
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
              <th>Inmate name</th>
              <th>Gender</th>
              <th>Birt Date</th>
              <th>Age </th>
              <th>Address</th>              
              <th>District</th>
              <th>Aadhaar Number</th>
              <th>Election ID Number</th>
              <th>Religion</th>
              <th>Cast</th>
              <th>Height</th>
              <th>Weight</th>
              <th>Identification mark</th>
              <th>Identification mark</th>
              <th>Relation</th>
              <th>Ration Card Copy</th>
              <th>Health Document</th>
              <th>Asset</th>
              <th>Asset Proof</th>
              <th>Photo</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlView="SELECT * FROM `tbl_inmate_reg` WHERE status='booked'";
            $data=mysqli_query($con,$sqlView);
            $counter=1;
            while($row=mysqli_fetch_array($data)){
            ?>
            <tr>
            <td><?php echo $counter;?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['gender'];?></td>
              <td><?php echo $row['dob'];?></td>
              <td><?php echo $row['age'];?></td>
              <td><?php echo $row['address'];?></td>
              <td><?php echo $row['district'];?></td>
              <td><?php echo $row['aadharno'];?></td>
              <td><?php echo $row['electionno'];?></td>
              <td><?php echo $row['religion'];?></td>
              <td><?php echo $row['cast'];?></td>
              <td><?php echo $row['height'];?></td>
              <td><?php echo $row['weight'];?></td>
              <td><?php echo $row['id1'];?></td>
              <td><?php echo $row['id2'];?></td>
              <td><?php echo $row['relationship'];?></td>
              <td><img src="<?php echo $row['img1'];?>"height="100" width="100" /></td>
              <td><img src="<?php echo $row['img2'];?>"height="100" width="100" /></td>
              <td><?php echo $row['asset'];?></td>
              <td><img src="<?php echo $row['img3'];?>"height="100" width="100" /></td>
              <td><img src="<?php echo $row['photo'];?>"height="100" width="100" /></td>
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
