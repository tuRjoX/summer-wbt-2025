<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
    $nameErr = $emailErr = $dobErr = $genderErr = "";
    $name = $email =  $dob = $gender = "";

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
        if (isset($_POST["gender"])) {
            $gender = test_input($_POST["gender"]);
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
            <a href="index.html">Home</a> |
            <a href="about.html">Login</a> |
            <a href="contact.html">Registration</a>
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
                <h2>Edit Profile</h2>
                <p><span class="error">* required field</span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-row">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="Bob"></input><br>
                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-row">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="bob@example.com"></input><br>
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="form-row">
                        <label for="gender">Gender:</label>
                        <input type="text" id="gender" name="gender" value="Male"></input><br>
                        <span class="error"><?php echo $genderErr; ?></span>
                    </div>
                    <div class="form-row">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" value="dob"></input><br>
                        <span class="error"><?php echo $dobErr; ?></span>
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