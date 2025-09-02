<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            background-color: #ffd9d6;
            font-family: Times New Roman, Times, serif;
        }
        .container {
            width: 1000px;
            margin: 30px auto;
            background: none;
            padding: 30px 40px 20px 40px;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        form label {
            display: inline-block;
            width: 180px;
            font-size: 22px;
            margin-bottom: 10px;
            vertical-align: top;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form input[type="date"],
        form input[type="file"],
        form select {
            width: 60%;
            padding: 6px 10px;
            font-size: 18px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        #gender-label {
            padding-right: 14%;
        }
        #department-label {
            padding-right: 9%;
        }
        .dob-input {
            width: 70px;
            margin-right: 5px;
        }
        .dob-label {
            font-style: italic;
            font-size: 18px;
            margin-left: 10px;
        }
        .mobile-prefix {
            width: 60px;
            margin-right: 5px;
        }
        .gender-group, .dept-group {
            margin-bottom: 15px;
        }
        .gender-group label, .dept-group label {
            width: auto;
            font-size: 20px;
            margin-right: 15px;
        }
        textarea {
            width: 60%;
            height: 80px;
            font-size: 18px;
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 6px 10px;
            margin-bottom: 15px;
            resize: none;
        }
        .register-btn {
            display: block;
            margin: 20px auto 0 auto;
            padding: 8px 30px;
            font-size: 20px;
            border-radius: 5px;
            border: none;
            background-color: #fff;
            color: #333;
            cursor: pointer;
            box-shadow: 1px 1px 4px #aaa;
        }
        .register-btn:hover {
            background-color: #f2b6b1;
        }
        .inline-input {
            width: 47%;
            display: inline-block;
        }    
        .error {
            color: #FF0000;
        }       
    </style>
</head>
<body>
    <?php
    $rollErr = $nameErr = $fatherErr = $dobErr = $mobileErr = $emailErr = $passwordErr = $genderErr = $cityErr = $addressErr = $courseErr = $departmentErr = $photoErr = "";
    $roll = $name = $father = $dob = $mobile = $email = $password = $gender = $city = $address = $course = $department = $photo = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["roll"])) {
            $rollErr = "Roll number is required";
        } else {
            $roll = test_input($_POST["roll"]);
            if (!preg_match("/^[0-9]*$/", $roll)) {
                $rollErr = "Invalid roll number format";
            }
        }
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["father"])) {
            $fatherErr = "Father's name is required";
        } else {
            $father = test_input($_POST["father"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $father)) {
                $fatherErr = "Only letters and white space allowed";
            }
        }
        if(empty($_POST["dob"])) {
            $dobErr = "Date of birth is required";
        } else {
            $dob = test_input($_POST["dob"]);
            if (!preg_match("/^[0-9]*$/", $dob)) {
                $dobErr = "Invalid date format";
            }
        }
        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile number is required";
        } else {
            $mobile = test_input($_POST["mobile"]);
            if (!preg_match("/^[0-9]*$/", $mobile)) {
                $mobileErr = "Invalid mobile number format";
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
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            if (strlen($password) < 6) {
                $passwordErr = "Password must be at least 6 characters long";
            }
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
            if (!preg_match("/^(male|female)$/", $gender)) {
                $genderErr = "Invalid gender format";
            }
        }
        if (empty($_POST["city"])) {
            $cityErr = "City is required";
        } else {
            $city = test_input($_POST["city"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
                $cityErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
        }
        if (empty($_POST["course"])) {
            $courseErr = "Course is required";
        } else {
            $course = test_input($_POST["course"]);
        }
        if (empty($_POST["department"])) {
            $departmentErr = "Department is required";
        } else {
            $department = test_input($_POST["department"]);
        }
        if (empty($_FILES["photo"]["name"])) {
            $photoErr = "Photo is required";
        } else {
            $photo = $_FILES["photo"]["name"];
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>  
    <div class="container">
        <h1>Student Registration Form</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>
                <label for="roll">Roll no. :</label>
                <input type="text" id="roll" name="roll"  value="<?php echo $roll;?>">
                <span class="error">* <?php echo $rollErr;?></span>
            </div>
            <div>
                <label for="name">Student name :</label>
                <input type="text" id="name" name="name" class="inline-input" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
            <div>
                <label for="father">Father's name :</label>
                <input type="text" id="father" name="father" value="<?php echo $father;?>">
                <span class="error">* <?php echo $fatherErr;?></span>
            </div>
            <div>
                <label>Date of birth :</label>
                <input type="date" name="dob" class="dob-input" value="<?php echo $dob;?>">
                <span class="error">* <?php echo $dobErr;?></span>
            </div>
            <div>
                <label for="mobile">Mobile no. :</label>
                <input type="text" name="mobile" class="mobile-input" value="<?php echo $mobile;?>">
                <span class="error">* <?php echo $mobileErr;?></span>
            </div>
            <div>
                <label for="email">Email id :</label>
                <input type="email" id="email" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" value="<?php echo $password;?>">
                <span class="error">* <?php echo $passwordErr;?></span>
            </div>
            <div class="gender-group">
                <label id="gender-label">Gender :</label>
                <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?>>
                <label for="female">Female</label>
                <span class="error">* <?php echo $genderErr;?></span>
            </div>
            <div class="dept-group">
                <label id="department-label">Department :</label>
                <input type="checkbox" id="cse" name="department" value="CSE" <?php if (isset($department) && $department=="CSE") echo "checked";?>>
                <label for="cse">CSE</label>
                <input type="checkbox" id="it" name="department" value="IT" <?php if (isset($department) && $department=="IT") echo "checked";?>>
                <label for="it">IT</label>
                <input type="checkbox" id="ece" name="department" value="ECE" <?php if (isset($department) && $department=="ECE") echo "checked";?>>
                <label for="ece">ECE</label>
                <input type="checkbox" id="civil" name="department" value="Civil" <?php if (isset($department) && $department=="Civil") echo "checked";?>>
                <label for="civil">Civil</label>
                <input type="checkbox" id="mech" name="department" value="Mech" <?php if (isset($department) && $department=="Mech") echo "checked";?>>
                <label for="mech">Mech</label>
                <span class="error">* <?php echo $departmentErr;?></span>
            </div>
            <div>
                <label for="course">Course :</label>
                <select id="course" name="course" >
                    <option value="">--------------- Select Current Course's ---------------</option>
                    <option value="B.Tech" <?php if (isset($course) && $course=="B.Tech") echo "selected";?>>B.Tech</option>
                    <option value="B.Sc" <?php if (isset($course) && $course=="B.Sc") echo "selected";?>>B.Sc</option>
                    <option value="BCA" <?php if (isset($course) && $course=="BCA") echo "selected";?>>BCA</option>
                    <option value="M.Tech" <?php if (isset($course) && $course=="M.Tech") echo "selected";?>>M.Tech</option>
                    <option value="MCA" <?php if (isset($course) && $course=="MCA") echo "selected";?>>MCA</option>
                </select>
                <span class="error">* <?php echo $courseErr;?></span>
            </div>
            <div>
                <label for="photo">Student photo :</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
            <div>
                <label for="city">City :</label>
                <input type="text" id="city" name="city" value="<?php echo $city;?>">
                <span class="error">* <?php echo $cityErr;?></span>
            </div>
            <div>
                <label for="address">Address :</label>
                <textarea id="address" name="address" ><?php echo $address;?></textarea>
                <span class="error">* <?php echo $addressErr;?></span>
            </div>
            <div>
                <button type="submit" class="register-btn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>