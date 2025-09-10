<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In Dashboard</title>
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
                    <li><a href="index.html">Logout</a></li>
                </ul>
            </div>
            <div class="main-content">
                <h2>Welcome Bob</h2>
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