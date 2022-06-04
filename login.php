<?php 
    session_start();
    
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body><br>
<fieldset style="width: 500px;margin:auto">
    <legend>Login</legend>
        <form action="http://localhost:8080/produits/login" method="post">
        <pre>
            user name : <input type="text" name="userName" id="userName"/>

            password:  <input type="text" name="passWord" id="passWord">

            <input type="submit"  value="Login">
        </pre>
        </form>
    </fieldset>
    
</body>
</html>