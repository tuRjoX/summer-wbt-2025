<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/contact_me.css">
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="../index.html"><h3 class="nav-title open-sans">Tu<span class="orange">R</span>jo</h3></a>            
            <ul>
                <li><a class="dark2" href="education.html">Education</a></li>
                <li><a class="dark2" href="experience.html">Experience</a></li>
                <li><a class="dark2" href="projects.html">Projects</a></li>
                <li><a class="dark2" href="contactme.html"><button class="btn">Contact Me</button></a></li>
            </ul>
        </nav>
    </header>
    <?php
        // define variables and set to empty values
        $nameErr = $subjectErr = $emailErr = $mobileErr = $jobTypeErr = $supportTypeErr = $partnershipTypeErr = $messageErr = "";
        $name = $subject = $email = $mobile = $jobType = $supportType = $partnershipType = $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["subject"])) {
            $subjectErr = "Subject is required";
        } else {
            $subject = test_input($_POST["subject"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
            $subjectErr = "Only letters and white space allowed";
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
        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile number is required";
        } else {
            $mobile = test_input($_POST["mobile"]);
            if (!preg_match("/^[0-9]*$/",$mobile)) {
            $mobileErr = "Only numbers are allowed";
            }
        }
        if (empty($_POST["jobType"])) {
            $jobTypeErr = "Job type is required";
        } else {
            $jobType = test_input($_POST["jobType"]);
        }
        if (empty($_POST["supportType"])) {
            $supportTypeErr = "Support type is required";
        } else {
            $supportType = test_input($_POST["supportType"]);
        }
        if (empty($_POST["partnershipType"])) {
            $partnershipTypeErr = "Partnership type is required";
        } else {
            $partnershipType = test_input($_POST["partnershipType"]);
        }
        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $message = test_input($_POST["message"]);
        }
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>
    <main>
        <section class="contact-section">
            <h1 class="contact-title open-sans dark3">Contact Me</h1>
            <p class="open-sans dark2">Feel free to reach out to me by filling out the form below</p>
            <p><span class="error">* required field</span></p>
            <form class="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" >
                <span class="error">* <?php echo $nameErr;?></span>

                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Enter subject" >
                <span class="error">* <?php echo $subjectErr;?></span>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" >
                <span class="error">* <?php echo $emailErr;?></span>

                <label for="mobile">Mobile</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" >
                <span class="error">* <?php echo $mobileErr;?></span>

                <label for="job">Which type of job are you interested in?</label>
                <select name="jobType" id="jobType" >
                    <option value="">Select Job Type</option>
                    <option value="soft_dev" <?php if (isset($jobType) && $jobType=="soft_dev") echo "selected";?>>Software Developer</option>
                    <option value="ux_ui_designer" <?php if (isset($jobType) && $jobType=="ux_ui_designer") echo "selected";?>>UX/UI Designer</option>
                    <option value="data_analyst" <?php if (isset($jobType) && $jobType=="data_analyst") echo "selected";?>>Data Analyst</option>
                    <option value="database_admin" <?php if (isset($jobType) && $jobType=="database_admin") echo "selected";?>>Database Administrator</option>
                </select>
                <span class="error">* <?php echo $jobTypeErr;?></span>

                <label for="supportType">What type of support do you need?</label>
                <select name="supportType" id="supportType" >
                    <option value="">Select Support Type</option>
                    <option value="technical" <?php if (isset($supportType) && $supportType=="technical") echo "selected";?>>Technical</option>
                    <option value="career" <?php if (isset($supportType) && $supportType=="career") echo "selected";?>>Career</option>
                    <option value="mentorship" <?php if (isset($supportType) && $supportType=="mentorship") echo "selected";?>>Mentorship</option>
                    <option value="general_inquiry" <?php if (isset($supportType) && $supportType=="general_inquiry") echo "selected";?>>General Inquiry</option>
                </select>
                <span class="error">* <?php echo $supportTypeErr;?></span>

                <label for="partnershipType">What type of partnership are you interested in?</label>
                <select name="partnershipType" id="partnershipType" >
                    <option value="">Select Partnership Type</option>
                    <option value="collaboration" <?php if (isset($partnershipType) && $partnershipType=="collaboration") echo "selected";?>>Collaboration</option>
                    <option value="consulting" <?php if (isset($partnershipType) && $partnershipType=="consulting") echo "selected";?>>Consulting</option>
                    <option value="strategic_partnership" <?php if (isset($partnershipType) && $partnershipType=="strategic_partnership") echo "selected";?>>Strategic Partnership</option>
                    <option value="business_collaboration" <?php if (isset($partnershipType) && $partnershipType=="business_collaboration") echo "selected";?>>Business Collaboration</option>
                    <option value="affiliate" <?php if (isset($partnershipType) && $partnershipType=="affiliate") echo "selected";?>>Affiliate</option>
                </select>
                <span class="error">* <?php echo $partnershipTypeErr;?></span>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Write your message" ></textarea>
                <span class="error">* <?php echo $messageErr;?></span>
                <button type="submit" class="btn">Submit</button>
            </form>
            <!-- <?php
            echo "<h2>Your Input:</h2>";
            echo $name;
            echo "<br>";
            echo $subject;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $mobile;
            echo "<br>";
            echo $jobType;
            echo "<br>";
            echo $supportType;
            echo "<br>";
            echo $partnershipType;
            echo "<br>";
            echo $message;
            ?> -->
        </section>
    <footer>
        <p class="open-sans dark3">&copy; 2025 All Rights Reserved by Turjo Das Dip</p>
    </footer>
    <!-- <script src="../data/validation.js"></script>
    <script>
    document.querySelector('.contact-form').onsubmit = function(e) {
        e.preventDefault();
        const data = {
            name: document.getElementById('name').value,
            subject: document.getElementById('subject').value,
            email: document.getElementById('email').value,
            mobile: document.getElementById('mobile').value,
            jobType: document.getElementById('job-type').value,
            supportType: document.getElementById('support-type').value,
            partnershipType: document.getElementById('partnership-type').value,
            message: document.getElementById('message').value
        };
        saveContactData(data);
        window.location.href = 'login.html';
    };
    </script> -->
</body>
</html>