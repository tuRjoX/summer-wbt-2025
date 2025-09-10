<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/registration.css">
    <style>
        section {
            display: flex;
        }

        .sidebar-content {
            border-right: 2px solid black;
            box-sizing: border-box;
            padding: 20px;
            width: 250px;
        }

        .main-content {
            padding: 20px;
            width: calc(100% - 250px);
        }
    </style>
</head>

<body>
<?php
    $currentPasswordErr = $newPasswordErr = $retypePasswordErr = "";
    $currentPassword = $newPassword = $retypePassword = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["current-password"])) {
            $currentPasswordErr = "Current Password is required";
        } else {
            $currentPassword = test_input($_POST["current-password"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $currentPassword)) {
                $currentPasswordErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["new-password"])) {
            $newPasswordErr = "New Password is required";
        } else {
            $newPassword = test_input($_POST["new-password"]);
            if (strlen($newPassword) < 6) {
                $newPasswordErr = "Password must be at least 6 characters";
            }
        }
        if (empty($_POST["retype-password"])) {
            $retypePasswordErr = "Retype Password is required";
        } else {
            $retypePassword = test_input($_POST["retype-password"]);
            if ($retypePassword != $newPassword) {
                $retypePasswordErr = "Passwords do not match";
            }
        }
        $currentPassword = "password123";
        if ($currentPasswordErr && empty($newPasswordErr) && empty($retypePasswordErr)) {
            if ($currentPassword == $newPassword) {
                $currentPasswordErr = "Do not use the old password";
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
        <section>
            <div class="sidebar-content">
                <h2>Account</h2>
                <ul>
                    <li><a href="logged-in-dashboard.php">Dashboard</a></li>
                    <li><a href="view-profile.php">View Profile</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                    <li><a href="change-profile-picture.php">Change Profile Picture</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="../index.php">Logout</a></li>
                </ul>
            </div>
            <div class="main-content">
                <h2>Change Password</h2>
                <p><span class="error">* required field</span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-row">
                        <label for="current-password">Current Password:</label>
                        <input type="password" id="current-password" name="current-password" required></input><br>
                        <span class="error"><?php echo $currentPasswordErr; ?></span>
                    </div>
                    <div class="form-row">
                        <label for="new-password">New Password:</label>
                        <input type="password" id="new-password" name="new-password" required></input><br>
                        <span class="error"><?php echo $newPasswordErr; ?></span>
                    </div>
                    <div class="form-row">
                        <label for="retype-password">Retype New Password:</label>
                        <input type="password" id="retype-password" name="retype-password" required></input><br>
                        <span class="error"><?php echo $retypePasswordErr; ?></span>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div>
            <p>Copyright &copy; 2017</p>
        </div>
    </footer>
</body>
</html>