<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="icon" href="img/logo.jpg" type="image/x-icon">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        width: 300px;
        text-align: center;
    }
    .login-container h2 {
        margin-bottom: 20px;
        color: #333;
    }
    input[type="text"], input[type="password"] {
        width: calc(100% - 40px);
        padding: 10px;
        margin: 10px 0;
        box-sizing: border-box;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .error-message {
        color: red;
        margin-top: 10px;
    }
</style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <br>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    
    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define valid credentials
        $valid_username = "layabeach";
        $valid_password = "123";
        
        // Get username and password from form
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Validate credentials
        if ($username === $valid_username && $password === $valid_password) {
            // Authentication successful
            // Redirect to admin panel or perform necessary actions
            header("Location: layabeachadminpanel.php");
            exit;
        } else {
            // Authentication failed
            echo '<p class="error-message">Invalid username or password. Please try again.</p>';
        }
    }
    ?>

</div>

</body>
</html>
