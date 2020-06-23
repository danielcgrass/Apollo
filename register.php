<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "root", "social");

    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_errno();
    }

    //Declaring variables to prevent errors
    $firstName = "";
    $lastName = "";
    $email = "";
    $email2 = "";
    $password = "";
    $password2 = "";
    $date = "";
    $error_array = ""; //error messages

    if(isset($_POST['registerButton'])){
        //When register form is submitted

        $firstName = strip_tags($_POST['registerFirstName']);
        $firstName = str_replace(' ','', $firstName);
        $firstName - ucfirst(strtolower($firstName));
        $_SESSION['reg_firstName'] = $firstName;

        $lastName = strip_tags($_POST['registerLastName']);
        $lastName = str_replace(' ','', $lastName);
        $lastName - ucfirst(strtolower($lastName));
        $_SESSION['reg_lastName'] = $lastName;

        $email = strip_tags($_POST['registerEmail']);
        $email = str_replace(' ','', $email);
        $email - ucfirst(strtolower($email));
        $_SESSION['reg_email'] = $email;

        $email2 = strip_tags($_POST['registerEmail2']);
        $email2 = str_replace(' ','', $email2);
        $email2 - ucfirst(strtolower($email2));
        $_SESSION['reg_email2'] = $email2;

        $password = strip_tags($_POST['registerPassword']);
        $password2 = strip_tags($_POST['registerPassword2']);

        $date = date("Y-m-d");

        if($email == $email2) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

                $num_rows = mysqli_num_rows($e_check);

                if($num_rows > 0){
                    echo "The email you entered is taken.";
                }
            }

            else{
                echo "Invalid format";
            }
        }
        else {
            echo "Emails Don't Match!";
        }
    }
    if(strlen($firstName) > 25 || strlen($firstName) < 2){
        echo "Your first name must be between 2 and 25 characters.";
    }
    if(strlen($lastName) > 25 || strlen($lastName) < 2){
        echo "Your first name must be between 2 and 25 characters.";
    }
    if(strlen($password) != strlen($password2)){
        echo "Your first name must be between 2 and 25 characters.";
    }
    else{
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            echo "Your password can only contain english characters or numbers.";
        }
    }
    

?>

<html>
<head>
    <title>Welcome - SocialNetwork</title>
</head>
<body>
    <form action="register.php" method="POST">
        <input type="text" name="registerFirstName" placeholder="First Name" value="<?php
        if(isset($_SESSION['reg_firstName'])){
            echo $_SESSION['reg_firstName'];
        }

        ?>" required>
        <br>
        <input type="text" name="registerLastName" placeholder="Last Name" value="<?php
        if(isset($_SESSION['reg_lastName'])){
            echo $_SESSION['reg_lastName'];
        }

        ?>" required>
        <br>
        <input type="email" name="registerEmail" placeholder="Email" value="<?php
        if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'];
        }

        ?>" required>
        <br>
        <input type="email" name="registerEmail2" placeholder="Confirm Email" value="<?php
        if(isset($_SESSION['reg_email2'])){
            echo $_SESSION['reg_email2'];
        }

        ?>" required>
        <br>
        <input type="password" name="registerPassword" placeholder="Password" required>
        <br>
        <input type="password" name="registerPassword2" placeholder="Confirm Password" required>
        <input type="submit" name="registerButton" value="Register">
    </form>
</body>
</html>