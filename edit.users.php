<?php
	include("utilities/config.php");
	session_start();
	if(!isset($_SESSION['username'])){
	   header("Location: index.php");
	}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM users WHERE id=$id;";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			$row = mysqli_fetch_assoc($result);
			$name = $row['name'];
			$email = $row['email'];
			$phone = $row['phone'];
			$faculty = $row['faculty'];
			$dept = $row['dept'];
			$level = $row['level'];
			$school_address = $row['school_address'];
            $home_address = $row['home_address'];
            $status = $row['status'];
            $unit = $row['unit'];
            $dob = $row['dob'];
            $sex = $row['sex'];
            $zone = $row['zone'];
		}
	}

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UpdateUser</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- For Date Picker-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-iso.css">
	<script src="js/date-picker.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/date-picker.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php
  		include("utilities/sidebar.php");
  	?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

    <div style="margin-top:30px;" class="container-fluid">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-10">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Member!</h1>
                        </div>

						<div class="bootstrap-iso">
                <form class="user" action="utilities/user.edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label form_label">Fullname</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-user" required autofocus value="<?php echo $name; ?>" name="name" id="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label form_label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control form-control-user" required value="<?php echo $email; ?>" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label form_label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control form-control-user" required value="<?php echo $phone; ?>" name="phone" id="phone">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label form_label">Sex</label>
                            <div class="col-sm-8">
                                <select class="custom-select my-1 mr-sm-2" id="sex" name="sex">
                                    <option value="<?php echo $sex; ?>"><?php echo $sex; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label form_label">Date of Birth</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" required value="<?php echo $dob; ?>" name="dob" id="dob" placeholder="Enter date of birth in format: Month Date e.g January 1">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label form_label">Faculty</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" required value="<?php echo $faculty; ?>" name="faculty" id="faculty">
                                <!-- <select class="custom-select my-1 mr-sm-2" id="faculty" name="faculty" style="text-transform:uppercase;">
                                    <option value="</option>
                                    <option value="SAAT">SAAT</option>
                                    <option value="SEET">SEET</option>
                                    <option value="SET">SET</option>
                                    <option value="SEMS">SEMS</option>
                                    <option value="SHHT">SHHT</option>
                                    <option value="SMAT">SMAT</option>
                                    <option value="SOC">SOC</option>
                                    <option value="SOS">SOS</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label form_label">Department</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" required value="<?php echo $dept; ?>" name="dept" id="dept">
                                <!-- <select class="custom-select my-1 mr-sm-2" id="dept" name="dept" style="text-transform:uppercase;">
                                    <option value="<?php echo $dept; ?>"><?php echo $dept; ?></option>
                                </select> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label form_label">Level</label>
                            <div class="col-sm-8">
                                <select class="custom-select my-1 mr-sm-2" id="level" name="level">
                                    <option value="<?php echo $level; ?>"><?php echo $level; ?></option>
                                    <option value="100 level">100 Level</option>
                                    <option value="200 level">200 Level</option>
                                    <option value="300 level">300 Level</option>
                                    <option value="400 level">400 Level</option>
                                    <option value="500 level">500 Level</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label form_label">School Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" required value="<?php echo $school_address; ?>" name="school_address" id="school_address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label form_label">Zone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" value="<?php echo $zone; ?>" name="zone" id="zone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label form_label">Home Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" required value="<?php echo $home_address; ?>" name="home_address" id="home_address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label form_label">Status</label>
                            <div class="col-sm-8">
                                <select class="custom-select my-1 mr-sm-2" id="status" name="status">
                                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                    <option value="Non-worker">Non Worker</option>
                                    <option value="Worker">Worker</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label form_label">Unit</label>
                            <div class="col-sm-8">
                                <select class="custom-select my-1 mr-sm-2" id="unit" name="unit">
                                    <option value="<?php echo $unit; ?>"><?php echo $unit; ?></option>
                                    <option value="None">None</option>
                                    <option value="Academic">Academic Unit</option>
                                    <option value="Alumni">Alumni Relations Unit</option>
                                    <option value="Bible study">Bible Study</option>
                                    <option value="Commercial">Commercial Unit</option>
                                    <option value="DDF">DDF</option>
                                    <option value="Editorial">Editorial Unit</option>
                                    <option value="Evangelism">Evangelism Unit</option>
                                    <option value="Follow up">Follow Up Unit</option>
                                    <option value="Hall rep">Hall Rep Unit</option>
                                    <option value="ICT">ICT Unit</option>
                                    <option value="Library">Library Unit</option>
                                    <option value="Organizing">Organizing Unit</option>
                                    <option value="Prayer">Prayer Unit</option>
                                    <option value="Publicity">Publicity Unit</option>
                                    <option value="Sanctuary">Sanctuary Unit</option>
                                    <option value="Transport">Transport Unit</option>
                                    <option value="TVM">TVM</option>
                                    <option value="Ushering">Ushering Unit</option>
                                    <option value="Welfare">Welfare Unit</option>
                                </select>
                            </div>
			            </div>
                        <button name="submit" id="register-submit" class="btn btn-primary btn-user btn-block">
                            Update Member!
                        </button>

			    </form>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- <script type="text/javascript">
		$(document).ready(function(){
			$("#faculty").change(function() {
				var $dropdown = $(this);
				$.getJSON("data.json", function(data) {
					var key = $dropdown.val();
					var vals = [];
					switch(key) {
						case 'SAAT':
							vals = data.saat.split(",");
							break;
						case 'SEET':
							vals = data.seet.split(",");
							break;
						case 'SET':
							vals = data.set.split(",");
							break;
						case 'SMES':
							vals = data.sems.split(",");
							break;
						case 'SHHT':
							vals = data.shht.split(",");
							break;
						case 'SMAT':
							vals = data.smat.split(",");
							break;
						case 'SOC':
							vals = data.soc.split(",");
							break;
						case 'SOS':
							vals = data.sos.split(",");
							break;
						case 'base':
							vals = ['Please choose from above'];
					}
					var $secondChoice = $("#dept");
					$secondChoice.empty();
					$.each(vals, function(index, value) {
						$secondChoice.append("<option>" + value + "</option>");
					});

				});
			});
		})
	</script> -->

</body>

</html>
