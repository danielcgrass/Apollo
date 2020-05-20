<?php
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

        $lastName = strip_tags($_POST['registerLastName']);
        $lastName = str_replace(' ','', $lastName);
        $lastName - ucfirst(strtolower($lastName));

        $email = strip_tags($_POST['registerEmail']);
        $email = str_replace(' ','', $email);
        $email - ucfirst(strtolower($email));


        $email2 = strip_tags($_POST['registerEmail2']);
        $email2 = str_replace(' ','', $emai2);
        $email2 - ucfirst(strtolower($email2));

        $password = strip_tags($_POST['registerPassword']);


        $password2 = strip_tags($_POST['registerPassword2']);

        $date = date("Y-m-d");

        if($email == $email2) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            }
            else{
                echo "Invalid format";
            }
        }
        else {
            echo "Emails Don't Match!";
        }
    }
?>

<html>
<head>
    <title>SocialNetwork</title>
</head>
<body>
    
</body>
</html>