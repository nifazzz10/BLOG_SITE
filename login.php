<?php

$host="localhost";
$user="root";
$password="";
$db="blogging_tutorial";

session_start();


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from login where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["username"]=$username;

		header("location:userhome.php");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["username"]=$username;
		
		header("location:admin/index.php");
	}

	else
	{
		echo "username or password incorrect";
	}

}




?>









<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center>
        <h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Login Form </h1>
        <br>
    <div style="background-color: black;width:500px;border-radius: 25px;">
    <form action="#" method="POST">
    <div> 
        <br><br><br>
        <label style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color:azure;font-weight:bolder;font-size:medium">Username:   </label>
        <input type="text" name="username" required>
    </div>
    <div>
    <br><br>
        <label style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color:azure;font-weight:bolder;font-size:medium">Password:</label>
        <input type="password" name="password" required>
    </div>
    <div>
    <br><br>
    <div class="inputgroup">
        <button  type="submit" style="background-color: #4CAF50; border: none;border-radius: 15px;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"  >submit</button>

    </div>
    
        <br><br>
    </div>
    </form>

    </div>
    <br><br><br>
    </center>
</body>
</html>
<?php include 'footer.php';?>