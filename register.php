<html>
<head>
    <title>Welcome - SocialNetwork</title>
</head>
<body>
    <form action="register.php" method="POST">
        <input type="text" name="registerFirstName" placeholder="First Name" required>
        <br>
        <input type="text" name="registerLastName" placeholder="Last Name" required>
        <br>
        <input type="email" name="registerEmail" placeholder="Email" required>
        <br>
        <input type="email" name="registerEmail2" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="registerPassword" placeholder="Password" required>
        <br>
        <input type="password" name="registerPassword2" placeholder="Confirm Password" required>
        <input type="submit" name="registerButton" value="Register">
    </form>
</body>
</html>