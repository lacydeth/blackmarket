<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Wrong username or password!";
		}else
		{
			echo "Wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loginphp.css">
    <title>Black market</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&family=Mulish:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="icon.png" rel="icon">
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
            margin-left: 50px;
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
			<div id="font">Login</div>

			<input id="text" placeholder="Username" type="text" name="user_name"><br><br>
			<input id="text" placeholder="Password" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a id="signup" href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>
