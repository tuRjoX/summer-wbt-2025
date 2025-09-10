<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php
    $nameErr = $emailErr = $usernameErr = $passwordErr = $confirmPasswordErr = $dobErr = $genderErr = "";
    $name = $email = $username = $password = $confirm_password = $dob = $gender =  "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                $usernameErr = "Only letters and numbers allowed";
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

        if (empty($_POST["confirm_password"])) {
            $confirmPasswordErr = "Confirm Password is required";
        } else {
            $confirm_password = test_input($_POST["confirm_password"]);
            if ($confirm_password != $password) {
                $confirmPasswordErr = "Passwords do not match";
            }
        }

        if (empty($_POST["dob"])) {
            $dobErr = "Date of Birth is required";
        } else {
            $dob = test_input($_POST["dob"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Registration</h2>
            <p><span class="error">* required field</span></p>
            <div class="form-row">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
            <div class="form-row">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <span class="error">* <?php echo $usernameErr;?></span>
            </div>
            <div class="form-row">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error">* <?php echo $passwordErr;?></span>
            </div>
            <div class="form-row">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <span class="error">* <?php echo $confirmPasswordErr;?></span>
            </div>
            <div class="form-row">
                <label for="gender">Gender</label>
                <input type="radio" id="male" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">
                <label for="other">Other</label>
                <span class="error">* <?php echo $genderErr;?></span>
            </div>
            <div class="form-row">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">
                <span class="error">* <?php echo $dobErr;?></span>
            </div>
            <div class="form-row">
                <input type="submit" value="Register">
                <input type="reset" value="Reset">
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