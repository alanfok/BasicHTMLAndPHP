


<?php session_start()
?>
<!DOCTYPE html>
<!--suppress ALL -->
<html lang="en">
<head>
    <!--check-->
    <meta charset="UTF-8">
    <title>login</title>
    <style type="text/css">
        body {background-color: yellow }
        fieldset.fieldset1 label{color: #87af75;}
        fieldset.fieldset2 label{color: cornflowerblue;}
        p {font-weight: bold;}
        label{font-weight: lighter;}
        li {font-weight: bold;}

    </style>
    <script type="text/javascript" src="A3Q5.js"></script>
</head>
<body>

<?php include 'header.php';?>
<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
    Username<input type="text" name="username"  id="user"/><br/>
    Password<input type="password" name="password" id="pass"/><br/>
<?php
if (isset($_POST['sub'])) {
    $Username = $_POST["username"];
    $Password = $_POST["password"];
    $file = file("login.txt");
    $arr = array();

    $error = false;
    $match = false;
    $k = 0;
    foreach ($file as $line) {
        list($user, $pw) = explode(":", $line);
        $arr[trim($user)] = trim($pw);
    }

    if (array_key_exists($Username, $arr) && $Password == $arr[$Username]) {
        $_SESSION["Username"] = $Username;
        header("Location:main.php");

    } elseif (empty($Username) || empty($Password)) {
        echo "You can't leave it empty<br/>";
    } elseif (array_key_exists($Username, $arr) && $Password != $arr[$Username]){
        echo "wrong password<br/>";
    }   else{
        echo "the name and password is not exist, we create the new one for you";
        $myfile = fopen("login.txt", "a");
        $ft=trim($Username);
        fwrite($myfile,"\n");
        fwrite($myfile,$ft);
        $cn=":";
        fwrite($myfile,$cn);
        $sd=trim($Password);
        fwrite($myfile,$sd);
        fclose($myfile);
    }
}
?>
    <p>A username can contain letters (both upper and lower case) and digits only.<br/> A password must be at least 4 characters long</p>
    (characters are to be letters and digits only), have at least one letter and at least one digit.</p>
    <p style="color: red";>the password name : admit, password : abc123</p>

    <input type="submit" value="Submit" name="sub">
    <input type="reset"  value="Reset">

</form>
    <?php include 'footer.php';?>
<script>
    fuction check(){
        var username=document.getElementById('user').value;
        var password=document.getElementById('pass').value;
        var pattern = /^[0-9a-zA-Z]+$/;
        var pass_pattern=/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;
        if(username.match(pattern)&&password.match(pattern)&&password.match(pass_pattern)&&password.length>=4)
        {
            return true;
        }
        else
        {
            alert('Username or password are invalid. Please check the requirements');
            return false;
        }
    }





</script>

</body>
</html>
