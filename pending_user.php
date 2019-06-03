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
      <h3>USER VERIFICATION </h3>
    </header>
    <div class="tile">
      <div class="table-responsive m-t-20">
      <form method="post" action="">
        <table class="table">
          <thead>
            <tr>
              <th>SI.NO</th>
              <th>Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Occupation</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $q = "SELECT * FROM `tbl_user_reg` WHERE status='pending'";
            $data = mysqli_query($con, $q) or die(mysqli_error($con));
            $counter=1;
            while ($r = mysqli_fetch_array($data)) {
              $w=$r['lid'];
            ?>
            <tr>
            <input type="hidden" name=id value="<?php echo $r['lid']?>;">
              <td><?php echo $counter;?></td>
              <td><?php echo $r['name'];?></td>
              <td><?php echo $r['address'];?></td>
              <td><?php echo $r['phone'];?></td>
              <td><?php echo $r['occupation'];?></td>
              <td><a href="approve.php?id=<?php echo $r['lid']; ?>"> VERIFY</a></td>
            </tr>
            <?php
            $counter++;
          }
            ?>
          </tbody>
        </table>
        </form>
      </div>
    </div>
    </div>
  </section>


