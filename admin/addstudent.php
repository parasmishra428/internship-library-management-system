<?php
require('dbconn.php');
include "connection.php";
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patan E-Library</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <style>
                .register{
                   display: inline-block;
  height: 300px;
  width: 240px;
  background: grey;
  color: white;
  padding: 30px;
  margin: 33px;
            </style>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">Patan E-Library </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/profile.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    
                    


	<h1>PATAN E-LIBRARY</h1>


		<div class="register">
			<h2>Add Student</h2>
			<form action="addstudent.php" method="post">
				<input type="text" Name="Name" placeholder="Name" required>
				<input type="text" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				<!-- <input type="text" Name="RollNo" placeholder="Library ID" required=""> -->
				
				<select name="Category" id="Category" >
					<option value="bca">BCA</option>
					<option value="csit">CSIT</option>
					<option value="bbs">BBS</option>
					<option value="bba">BBA</option>
				</select>
				<br>
			
			
			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Add">
			    </form>
		

		<div class="clear"></div>

	</div>

	<div class="footer w3layouts agileits">
		<p> &copy; 2022 Patan Library  Login. All Rights Reserved </a></p>
		
	</div>


        
<?php
if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$category=$_POST['Category'];
	$type='Student';
	$sql="insert into LMS.user (Name,Type,Category,EmailId,MobNo,Password) values ('$name','$type','$category','$email','$mobno','$password')";
//my change
$sql1 = "select * from LMS.user where emailid like '%$email%' ";
$sql2 = "select * from LMS.user";
$result = mysqli_query($db,$sql2) or die (mysql_error());

while ($row = mysqli_fetch_assoc($result)) 
{

    $first=$row['RollNo'];
   // echo $first;
    echo "<br>";
    echo "<br>";
    
}
echo $first;

$db->query($sql2);
print_r($sql2);
echo "<br>";

$db->query($sql1);

print_r($sql1);
if ($db->affected_rows == 1){
    // echo "paras ";
    // echo $sql;
}
// while ($row = $result->fetch_assoc()) {
//     echo $row['RollNo']."<br>";
//     echo "Paras mishra";
// }
//$row=$result->fetch_assoc(); 
$userid=$mobno;
//$password=$row['Password'];
echo "<b>Useer ID:</b> ".$userid."<br><br>";
echo "<b>Correct DB Useer ID:</b> ".$userid."<br><br>";
echo "<b>Password:</b> ".$password."<br><br>";
	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('!!Registration Successful UserId is : $first <br><br> Password is : $password ')</script>";

        
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>


                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 Patan Library Management System </b>All rights reserved.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>