<?php
require('dbconn.php');

$id=$_GET['id'];

$roll=$_SESSION['RollNo'];

$sql="delete from LMS.record where RollNo='$roll' and BookId='$id'";
echo $sql;

if($conn->query($sql) === TRUE)
{
// 	$sql1="insert into LMS.message (RollNo,Msg,Date,Time) values ('$rollno','Your request for issue of BookId: $bookid  has been rejected',curdate(),curtime())";
//  $result=$conn->query($sql1);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);

}

?>