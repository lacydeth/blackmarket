<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

<style type="text/css">
        body {
            background-color: #292929;
        }
        #text{
            height: 25px;
            border-radius: 10px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }
        #box{
            background-color: #626262;
            margin: auto;
            width: 300px;
            border-radius: 25px;
            margin-top: 300px;
            padding: 20px;
        }
        #button {
            font-family: 'Mulish', sans-serif;
            font-size: 1rem;
            padding: 0.8rem 3rem;
            background: #4A4A4A;
            border-radius: 35px;
            cursor: pointer;
            margin-left: 80px;
            color: white;
            text-decoration: none;
            border: none;
            transition: all ease .5s;
        }
        #button:hover {
            background: #616161;
            color: #EBEBEB;
            border-radius: 22px;
        }
        #signup {
            font-family: 'Mulish', sans-serif;
            font-size: 1rem;
            padding: 0.8rem 3rem;
            background: #4A4A4A;
            border-radius: 35px;
            cursor: pointer;
            margin-left: 60px;
            color: white;
            text-decoration: none;
            border: none;
            transition: all ease .5s;
        }
        #signup:hover {
            background: #616161;
            color: #EBEBEB;
            border-radius: 22px;
        }
        #font {
            font-size: 30px;
            margin: 10px;
            color: white;
            text-align: center;
            font-family: 'Lexend Deca', sans-serif;
        }
    </style>
	<div id="box">
		
		<form method="post">
			<div id="font">Signup</div>

			<input id="text" placeholder="Username" type="text" name="user_name"><br><br>
			<input id="text" placeholder="Password" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a id="signup" href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>