<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
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
                    <li><a href="">Dashboard</a></li>
                    <li><a href="">View Profile</a></li>
                    <li><a href="">Edit Profile</a></li>
                    <li><a href="">Change Profile Picture</a></li>
                    <li><a href="">Change Password</a></li>
                    <li><a href="index.html">Logout</a></li>
                </ul>
            </div>
            <div class="main-content">
                <h2>Profile Picture</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <img src="images/profile-placeholder.png" alt="Profile Picture"
                        id="profile-picture-preview"><br>
                        <input type="file" id="profile-picture" name="profile-picture"></input><br>
                        <span class="error">* <?php echo $profilePicErr; ?></span>
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