<?php

    $firstname = $lastname = $email = $password = '';

    $errors = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'password'=>'');

    if(isset($_POST['submit'])){

        session_start();

        $_SESSION['firstname'] = htmlspecialchars($_POST['firstname']);
        $_SESSION['lastname'] = htmlspecialchars($_POST['lastname']);
        $_SESSION['email'] = htmlspecialchars($_POST['email']);
        $_SESSION['password'] = htmlspecialchars($_POST['password']);


        //check if fields are empty
        if (empty($_POST['firstname'])){
            $errors['firstname'] = "First name is required <br>";
        }
        else{
            $firstname = htmlspecialchars($_POST['firstname']);
            if (!preg_match('/^[a-zA-Z\s]+$/', $firstname)) {
                $errors['firstname'] = "Name must be letters and space only <br>";
            }
        }
        
        if (empty($_POST['lastname'])){
            $errors['lastname'] = "Last name is required <br>";
        }
        else{
            $lastname = htmlspecialchars($_POST['lastname']);
            if (!preg_match('/^[a-zA-Z\s]+$/', $lastname)) {
                $errors['lastname'] = "Name must be letters and space only <br>";
            }
        }
        
        if (empty($_POST['email'])){
            $errors['email'] = "Enter a valid email address <br>";
        }
        else{
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email must be a valide email address. <br>";
            }
        }
        
        if (empty($_POST['password'])){
            $errors['password'] = "Please enter a password <br>";
        }
        else{
            $password = $_POST['password'];
            if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$password)) {
                $errors['password'] = 'Must have a letter, digit & between 8 to 12 characters';
            }
        }

        if (array_filter($errors)){
            //If there is an error do nothing
            echo 'there are errors';
        }
        else{
            echo 'no errors';
            header('Location: homepage.php');
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Session</title>
</head>
<body>
    <div class="inline"><h3 class="signUp">Signup</h3></div>
    <div class="container">
        <form action="register.php" method="POST">
            First Name: <br>
            <input type="text" name="firstname" id="inputfield" value="<?php echo htmlspecialchars($firstname) ?>"><br>
            <div style="color:red"><?php echo $errors['firstname']?></div><br>
            Last Name: <br>
            <input type="text" name="lastname" id="inputfield" value="<?php echo htmlspecialchars($lastname) ?>"><br>
            <div style="color:red"><?php echo $errors['lastname']?></div><br>
            Email: <br>
            <input type="emial" name="email" id="inputfield" value="<?php echo htmlspecialchars($email) ?>"><br>
            <div style="color:red"><?php echo $errors['email']?></div><br>
            Password: <br>
            <input type="password" name="password" id="inputfield" value="<?php echo htmlspecialchars($password) ?>"><br><br>
            <div style="color:red"><?php echo $errors['password']?></div><br>
            <input type="submit" name="submit" value="submit" id="submit"> 
        </form>
    </div>
    <div class="inline"><br><h4>or</h4><h1 class="Login"><a href="login.php" style="text-decoration:none">Login</a></h1></div>
</body>
</html>