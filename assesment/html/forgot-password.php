<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/registration.css">
</head>

<body>
<?php
    $emailErr = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
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
            <h2>Forgot Password</h2>
            <p><span class="error">* required field</span></p>
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <span class="error">* <?php echo $emailErr; ?></span>
            </div>
            <div class="form-row">
                <button type="submit">Submit</button>
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