<?php

    $email = $password = '';
    $signup = '';
    
    if (isset($_POST['submit'])){

        session_start();

        // if fields are left empty
        if (empty($_POST['email']) || empty($_POST['password'])){
            echo "Input fields cannot be empty.";
        }

        // if fields are filled, check if the details match any in the session
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            // if it matches, login to homepage
            if($_SESSION['email'] == $email && $_SESSION['password'] == $password){
                header("Location: homepage.php");
            }

            // if it doesn match, display error message
            else{
                echo "Account not found. Click signup to create new account";
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Login</title>
</head>
<body>
    <div class="inline"><h1 class="login">Login</h1> </div>
    <div class="container">
        <form action="" method="POST">
            Email: <br>
            <input type="email" name="email" id="inputfield" value="<?php echo htmlspecialchars($email)?>"><br><br>
            Password: <br>
            <input type="password" name="password" id="inputfield" value="<?php echo htmlspecialchars($password)?>"><br><br>
            <input type="submit" name="submit" value="submit" id="submit">
        </form>
    </div>
    <div class="inline"> <br><h4>or</h4> <h3 class="signup"><a href="register.php" style="text-decoration:none">Signup</a></h3></div>
    
</body>
</html>