<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
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
    $nameErr = $emailErr = $usernameErr = $passwordErr = $confirmPasswordErr = $dobErr = $genderErr = "";
    $name = $email = $username = $password = $confirm_password = $dob = $gender =  "";  

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
                <h2>Profile</h2>
                <p><span class="error">* required field</span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div style="display: flex; gap: 20px;">
                        <div>
                            <div class="form-row">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" value="Bob"></input><br>
                            </div>
                            <div class="form-row">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="bob@example.com"></input><br>
                            </div>
                            <div class="form-row">
                                <label for="gender">Gender:</label>
                                <input type="text" id="gender" name="gender" value="Male"></input><br>
                            </div>
                            <div class="form-row">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" id="dob" name="dob" value="dob"></input><br>
                            </div>
                        </div>
                        <div>
                            <div class="form-row">
                                <img src="images/profile-placeholder.png" alt="Profile Picture"
                                    id="profile-picture-preview">
                            </div>
                            <div class="form-row">
                                <input type="file" id="profile-picture" name="profile-picture" accept="image/*"><br>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="">Edit Profile</a>
                    </div>
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