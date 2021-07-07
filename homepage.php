<?php



session_start();
$lastname = htmlspecialchars($_SESSION['lastname']);

if (isset($_POST["submit"])){
    
    unset($_SESSION["firstname"]);
    unset($_SESSION["lastname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Home</title>
     <style>
        #header{
            background-color: skyblue;
            margin: 10px 0px;
            padding: 5px;
            text-align: right;
        }
        
        #HeadNav{
            display: inline;
            margin: 5px 10px; */
            list-style-type: none;
        }

        li a{
            background-color: darkblue;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        form>#HeadNav{
            background-color: darkblue;
            padding: 5px;
            border-radius: 5px;
            color: white;
            border: none;
        }

        li a:hover, form>#HeadNav:hover{
            background-color: gray;
            cursor: pointer;
        }
        

    </style>
    <link rel="stylesheet" href="main.css">
</head>
<body onLoad="onLoad()">

<script> function onLoad (){
       <?php  
            if ($_SESSION['firstname'] == '' && $_SESSION['lastname'] == '' &&$_SESSION['email'] == '' && $_SESSION['password'] == ''){
            header("Location: register.php");
            }
        ?>
    }   
</script>
    <div id="head">
        <ul id="header">
            <form action="" method="POST">
                <input type="submit" name="submit" id="HeadNav" value = "Delete">
                <li id="HeadNav"><a href="login.php" name="logout" value="logout" style="text-decoration:none">Logout</a></li>
            </form>
        </ul>
    </div>
    <div class="container">
        <p>SUCCESS!</p><br><br>
        <h3>Hello <?php echo htmlspecialchars($lastname) ?> </h3>
        <h4>Welcome to your dashboard</h4>
    </div>
</body>
</html>