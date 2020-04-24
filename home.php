<?php
	include("utilities/config.php");
	session_start();
	if(!isset($_SESSION['username'])){
	   header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>All Users</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
		include("utilities/sidebar.php");
	?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div style="margin-top:30px;" class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Registered Users</h1>
          <!-- DataTales Example -->
          <div style="margin-top:30px;" class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
	                    <th>Email</th>
	                    <th>Phone</th>
                      <th>Sex</th>
                      <th>Date of Birth</th>
	                    <th>Faculty</th>
	                    <th>Department</th>
	                    <th>Level</th>
	                    <th>School Address</th>
	                    <th>Home Address</th>
                      <th>Status</th>
                      <th>Unit</th>
                      <th>Zone</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
	  				  	$sql = "SELECT * FROM users;";
	  					$result = mysqli_query($conn, $sql);
	  					$resultcheck = mysqli_num_rows($result);
	  					if ($resultcheck > 0) {
	  						while ($row = mysqli_fetch_assoc($result)) {
								$expiry_date = strtotime($row['e_date']);
								$now = date('Y-m-d H:i:s');
								$now = strtotime($now);
								$expiry = strtotime($row['e_date']);
								$diff = $expiry - $now;
								$days_to_secs = 60 * 60 * 24;
								$ex_days = floor($diff/$days_to_secs);
								?>
		                    <tr>
		                      	<td><?php echo $row['name']; ?></td>
		                      	<td><?php echo $row['email']; ?></td>
		                      	<td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['sex']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
		                      	<td><?php echo $row['faculty']; ?></td>
		                      	<td><?php echo $row['dept']; ?></td>
                            <td><?php echo $row['level']; ?></td>
		                      	<td><?php echo $row['school_address']; ?></td>
		                      	<td><?php echo $row['home_address']; ?></td>
		                      	<td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['unit']; ?></td>
                            <td><?php echo $row['zone']; ?></td>
                            <td><a href="edit.users.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="utilities/delete.user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
		                    </tr>
							<?php
							}
						} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
  		include("utilities/footer.php");
  	?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
	include("utilities/logout.modal.php");
?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
