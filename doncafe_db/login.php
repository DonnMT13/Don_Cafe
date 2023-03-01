<?php 

session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password']
            
            ;

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
			
			echo "wrong username or password!";
		}else
		{
			echo "Please enter a valid username or password!";
		}
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: orange;
		border: none;
		border-radius: 20px;
		font-family: monospace;
	}

	#box{

		background-color: #343A40;
		margin: auto;
		width: 300px;
		padding: 20px;
		border-radius: 10px;
		font-family: monospace;
	
	}
        *{
            box-sizing: border-box;
        }
        body{
            margin: 1;
            background: white;
        }
        nav{
            background: #343A40;
            width: 100%;
            overflow: auto;
            
            
        }
        ul{
            margin: 0;
            padding: 0;
            list-style: none;
            text-align: center;
        }
        li{
            float: right;

        }
        nav a{
            width: 110px;
            height:  250;
            display: block;
            text-decoration: none;
            text-align: center;
            background: #343A40;
            font-size: 20px;
            color: white;
            padding: 18px 12px;
            font-family: georgia;
           
        }
        
        nav a:hover{
            background: white;
            color: black;
           
        }
        .don{
            margin-top: .5%;
        }
		

	</style>
    
            <nav>
                
                <ul class="nav_links">
                   <li><a href="logout.php">Login</a></li>
                    <li><a href="about us.html">About me</a></li>
                    <li><a href="home.html">Home</a></li>        
         		</ul>
                <div class="don">
               <img src="don.png">
               </div>
           </nav>
    
    <br>
    <br>
    <br>
	
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: lavender;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login" ><br><br><br>

			<button><a href="signup.php">Click to Signup</a></button><br><br><br>
		</form>
	</div>
    
    
    
    
    
</body>
</html>