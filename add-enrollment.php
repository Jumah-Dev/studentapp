<?php
include('logics/dbconnection.php');
$msg="";
if(isset($_POST['submitbutton']))
{
    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    
    $insertData = mysqli_query($conn,"INSERT INTO 
    enrollment(fullname,phonenumber,email,gender,course)
    VALUES('$fullname','$phonenumber','$email','$gender','$course')");

if($insertData)
{
    $msg = "Data successfully submitted";
}
else{
    $msg = "Error Occurred".mysqli_error($conn);
}
}

?>




<!DOCTYPE html>
<html>
<?php  require_once('includes/headers.php') ?>

<body>
	<!-- All our code. write here   -->
	<?php  require_once('includes/navbar.php') ?>

	<div class="sidebar">
		<?php  require_once('includes/sidebar.php') ?>
	</div>
	<div class="maincontent pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                           <h4>Student Enrollment</h4>

                           <?php 
                                if($msg)
                                {
                                    echo '<div class="alert alert-success">'.$msg.'</div';
                                }
                           ?>
                        </div>
                        <div class="card-body">

                            <form action="add-enrollment.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" name="fullname" class="form-control" placeholder="Enter Your  Full Name">
                                    </div>
                        
                                    <div class="col-lg-6">
                                        <label for="phonenumber" class="form-label">Phone Number</label>
                                        <input type="number" name="phonenumber" class="form-control" placeholder="Enter Your Phone Number">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                                    </div>
                                 
                                
                                    <div class=" col-lg-6">
                                       <label for="gender" name="gender" class="form-label">What's your gender?</label>
                                            <select class="form-control" name="gender">
                                                <option value="">--select your gender--<option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            <select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="course" name="course" class="form-label">What's your preference course?</label>
                                        <select class="form-control" name="course">
                                            <option value="">--select your course--<option>
                                            <option>Web Design</option>
                                            <option>Data Science</option>
                                            <option>Cyber security</option>
                                        <select>
                                    </div>
                                </div>
                                <button type="submit" name="submitbutton" class="btn btn-primary">Submit Information</button>
                             </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

	<?php require_once('includes/scripts.php')?>

</body>
</html>