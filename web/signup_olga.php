<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <script language="javascript" type="text/javascript" src="js/form.js"></script>
    </head>
    <body>
    <?php include("header.html");?>
        <div id="signup">
        <form  action="hz" method="POST">
            <h1>Sign Up</h1>
            <label for="email">Email:</label> <input type="email" name="email">
            <label for="password">Password:</label> <input type="password" name="password">
            <label for="confirm_password">Confirm password:</label> <input type="password" name="confirm_password">
            <label for="name">Name:</label> <input type="text" name="name" 
                        onkeypress="lettersOnly(event)">
            <label for="phone">Phone number:</label> 
            <input type="tel" name="phone" onkeypress="telephoneOnly(event)">
            <input type="submit" value="Sign Up">
        </form>
    </div>
        <?php
        // put your code here
        ?>
        <?php include("footer.html");?>
    </body>
</html>