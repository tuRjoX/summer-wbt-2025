<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php
    $usernameErr = $passwordErr = "";
    $username = $password = $remember = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
                $usernameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            if (strlen($password) < 6) {
                $passwordErr = "Password must be at least 6 characters";
            }
        }
        if (isset($_POST["remember"])) {
            $remember = "on";
        } else {
            $remember = "";
        }
        $predefined_username = "admin";
        $predefined_password = "password123";
        if (empty($usernameErr) && empty($passwordErr)) {
            if ($username !== $predefined_username || $password !== $predefined_password) {
                $passwordErr = "Invalid username or password";
            } else {
                header("Location: logged-in-dashboard.php");
                exit();
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <nav class="navbar">
        <div class="logo-container">
            <img src="images/cross.png" alt="">
            <h1>Company</h1>
        </div>
        <div class="nav-links">
            <a href="../index.php">Home</a> |
            <a href="login.php">Login</a> |
            <a href="registration.php">Registration</a>
        </div>
    </nav>
    <main>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Login</h2>
            <p><span class="error">* required field</span></p>
            <div class="form-row">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <span class="error">* <?php echo $usernameErr; ?></span>
            </div>
            <div class="form-row">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error">* <?php echo $passwordErr; ?></span>
            </div>
            <div class="form-row">
                <input type="checkbox" id="remember" name="remember" <?php if ($remember == "on")
                    echo "checked"; ?>>
                <label for="remember">Remember Me</label>
            </div>
            <div class="form-row">
                <input type="submit" value="Submit">
                <a href="registration.php">Forgot Password?</a>
            </div>
        </form>
    </main>
    <footer>
        <div>
            <p>Copyright &copy; 2017</p>
        </div>
    </footer>
</body>

</html>