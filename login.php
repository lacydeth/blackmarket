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
			
			echo "<div class=\"wrong\">Wrong username or password!</div>";
		}else
		{
			echo "<div class=\"wrong\">Wrong username or password!</div>";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loginphp.css">
    <title>Blackmarket Login</title>
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
            animation: Slide 2s ease;
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
            background: #313131;
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
            background: #313131;
            color: #EBEBEB;
            border-radius: 22px;
        }
        #font {
            font-size: 30px;
            margin: 10px;
            color: white;
            text-align: center;
            font-family: 'Lexend Deca', sans-serif;
            cursor: default;
        }
        .wrong {
            margin-top: 5px;
            padding: 5px;
            color: white;
            font-family: 'Lexend Deca', sans-serif;
            text-align: center;
            font-size: 22px;
            position: absolute;
            top: 200px;
            left: 760px;
            padding: 15px;
            background: #4A4A4A;
            border-radius: 35px;
            cursor: default;
        }
        @keyframes Slide {
        0% {
            transform: translateY(250px);
            opacity: 30%;
        }
        50% {
            opacity: 60%;
        }
        75% {
            opacity: 85%;
        }
        100% {
            transform: translateY(0);
            opacity: 100%;
        }    
        }
        #Btn {
            width: 55px;
            height: 55px;
            position: fixed;
            left: 900px;
            top: 125px;
            z-index: 99;
            border-radius: 50%;
            border: none;
            outline: none;
            background: #7F7F7F;
            color: white;
            cursor: pointer;
            padding: 15px; 
            font-size: 20px;
        }
        #Btn:hover {
            background-color: #ADADAD;
        }
    </style>
        <button onclick="exitF()" id="Btn">
            <i class="material-icons">close</i>
        </button>
	<div id="box">
		<form method="post">
			<div id="font">Login</div>

			<input id="text" placeholder="Username" type="text" name="user_name"><br><br>
			<input id="text" placeholder="Password" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a id="signup" href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
    <script src="main.js"></script>
</body>
</html>
