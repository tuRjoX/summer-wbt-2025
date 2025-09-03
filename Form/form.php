<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="form.css">
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
        $first_nameErr = $last_nameErr = $companyErr = $address1Err = $address2Err = $cityErr = $stateErr = $zipErr = $countryErr = $emailErr = $donate_amountErr = $phoneErr = $faxErr = $other_amountErr = $additional_nameErr = $volunteer_infoErr = $monthly_creditErr = $monthly_credit_forErr = "";
        $first_name = $last_name = $company = $address1 = $address2 = $city = $state = $zip = $country = $email = $donate_amount = $phone = $fax = $other_amount = $additional_name = $volunteer_info = $monthly_credit = $monthly_credit_for = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // First Name
        if (empty($_POST["first_name"])) {
            $first_nameErr = "First Name is required";
        } else {
            $first_name = test_input($_POST["first_name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
            $first_nameErr = "Only letters and white space allowed";
            }
        }

        // Last Name
        if (empty($_POST["last_name"])) {
            $last_nameErr = "Last Name is required";
        } else {
            $last_name = test_input($_POST["last_name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
            $last_nameErr = "Only letters and white space allowed";
            }
        }
        // Company
        if (!empty($_POST["company"])) {
            $company = test_input($_POST["company"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$company)) {
                $companyErr = "Only letters and white space allowed";
            }
        }

        // Address 1
        if (empty($_POST["address1"])) {
            $address1Err = "Address 1 is required";
        } else {
            $address1 = test_input($_POST["address1"]);
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$address1)) {
            $address1Err = "Only letters, numbers and white space allowed";
            }
        }

        // City
        if (empty($_POST["city"])) {
            $cityErr = "City is required";
        } else {
            $city = test_input($_POST["city"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
            $cityErr = "Only letters and white space allowed";
            }
        }

        // State
        if (empty($_POST["state"])) {
            $stateErr = "State is required";
        } else {
            $state = test_input($_POST["state"]);
        }

        // Zip
        if (empty($_POST["zip"])) {
            $zipErr = "Zip is required";
        } else {
            $zip = test_input($_POST["zip"]);
            if (!preg_match("/^[0-9]{5}$/",$zip)) {
            $zipErr = "Invalid zip format";
            }
        }
        // Country
        if (empty($_POST["country"])) {
            $countryErr = "Country is required";
        }

        // Phone
        if (!empty($_POST["phone"])) {
            $phone = test_input($_POST["phone"]);
            if (!preg_match("/^[0-9]{11}$/",$phone)) {
                $phoneErr = "Invalid phone number format";
            }
        }
        
        //Fax
        if (!empty($_POST["fax"])) {
            $fax = test_input($_POST["fax"]);
            if (!preg_match("/^[0-9]{10}$/",$fax)) {
                $faxErr = "Invalid fax number format";
            }
        }

        //Email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
        }

        // Donation Amount
        if (empty($_POST["donate_amount"])) {
            $donate_amountErr = "Donation Amount is required";
        } else {
            $donate_amount = test_input($_POST["donate_amount"]);
        }
        //Other Amount
        if (!empty($_POST["other_amount"])) {
            $other_amount = test_input($_POST["other_amount"]);
            if (!preg_match("/^[0-9]{10}$/",$other_amount)) {
                $other_amountErr = "Invalid other amount format";
            }
        }
        // Additional Name
        if (!empty($_POST["additional_name"])) {
            $additional_name = test_input($_POST["additional_name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$additional_name)) {
                $additional_nameErr = "Only letters and white space allowed";
            }
        }
        // Volunteer Info
        if (isset($_POST["volunteer_info"])) {
            $volunteer_info = test_input($_POST["volunteer_info"]);
        } else {
            $volunteer_infoErr = "Please check the box if you would like information about volunteering.";
        }

        //Monthly Credit
        if (!empty($_POST["monthly_credit"])) {
            $monthly_credit = test_input($_POST["monthly_credit"]);
            if (!preg_match("/^[0-9]{1,5}$/",$monthly_credit)) {
                $monthly_creditErr = "Invalid monthly credit format";
            }
        }

        //Monthly Credit For
        if (!empty($_POST["monthly_credit_for"])) {
            $monthly_credit_for = test_input($_POST["monthly_credit_for"]);
            if (!preg_match("/^[0-9]{1,5}$/",$monthly_credit_for)) {
                $monthly_credit_forErr = "Invalid monthly credit for format";
            }
        }

        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>

    <section class="donor-section">
    <h2>Donor Information</h2>
    <p><span class="error">* required field</span></p>
    <form class="donor-info" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $first_name;?>">
            <span class="error"><?php echo $first_nameErr;?></span>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $last_name;?>">
            <span class="error"><?php echo $last_nameErr;?></span>
        </div>
        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" id="company" name="company" value="<?php echo $company;?>">
            <span class="error"><?php echo $companyErr;?></span>
        </div>
        <div class="form-group">
            <label for="address1">Address 1</label>
            <input type="text" id="address1" name="address1" value="<?php echo $address1;?>">
            <span class="error"><?php echo $address1Err;?></span>
        </div>
        <div class="form-group">
            <label for="address2">Address 2</label>
            <input type="text" id="address2" name="address2" value="<?php echo $address2;?>">
            <span class="error"><?php echo $address2Err;?></span>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" value="<?php echo $city;?>">
            <span class="error"><?php echo $cityErr;?></span>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <select name="state" id="state">
                <option value="">Select State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
            </select>
            <span class="error"><?php echo $stateErr;?></span>
        </div>
        <div class="form-group">
            <label for="zip">Zip Code</label>
            <input type="text" id="zip" name="zip" value="<?php echo $zip;?>">
            <span class="error"><?php echo $zipErr;?></span>
        </div>
        <div class="form-group" >
            <label for="country">Country</label>
            <select name="country" id="country">
                <option value="">Select Country</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="MX">Mexico</option>
                <option value="GB">United Kingdom</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
                <option value="JP">Japan</option>
                <option value="CN">China</option>
                <option value="IN">India</option>
                <option value="AU">Australia</option>
                <option value="BR">Brazil</option>
                <option value="ZA">South Africa</option>
                <option value="RU">Russia</option>
                <option value="IT">Italy</option>
            </select>
            <span class="error"><?php echo $countryErr;?></span>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone;?>">
            <span class="error"><?php echo $phoneErr;?></span>
        </div>
        <div class="form-group">
            <label for="fax">Fax</label>
            <input type="tel" id="fax" name="fax" value="<?php echo $fax;?>">
            <span class="error"><?php echo $faxErr;?></span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email;?>">
            <span class="error"><?php echo $emailErr;?></span>
        </div>
        <div class="form-group donation-amount-group">
            <div class="da-label-block">
                <label for="donate_amount">Donation Amount</label>
                <span class="helper-text">(Check a button or type in your amount)</span>
            </div>
            <div class="da-radio-block">
                <input type="radio" id="donate_amount1" name="donate_amount" <?php if (isset($donate_amount) && $donate_amount=="0") echo "checked";?> value="0" checked>
                <label for="donate_amount1">None</label>
                <input type="radio" id="donate_amount2" name="donate_amount" <?php if (isset($donate_amount) && $donate_amount=="50") echo "checked";?> value="50">
                <label for="donate_amount2">$50</label>
                <input type="radio" id="donate_amount3" name="donate_amount" <?php if (isset($donate_amount) && $donate_amount=="75") echo "checked";?> value="75">
                <label for="donate_amount3">$75</label>
                <input type="radio" id="donate_amount4" name="donate_amount" <?php if (isset($donate_amount) && $donate_amount=="100") echo "checked";?> value="100">
                <label for="donate_amount4">$100</label>
                <input type="radio" id="donate_amount5" name="donate_amount" <?php if (isset($donate_amount) && $donate_amount=="250") echo "checked";?> value="250">
                <label for="donate_amount5">$250</label>
                <input type="radio" id="donate_amount6" name="donate_amount" <?php if (isset($donate_amount) && $donate_amount=="other") echo "checked";?> value="other">
                <label for="donate_amount6">Other</label>
            </div>
            <span class="error"><?php echo $donate_amountErr;?></span>
        </div>
        <!-- Other Amount (Separate field, aligned as usual) -->
        <div class="form-group">
            <label for="other_amount">Other Amount</label>
            <input type="text" id="other_amount" name="other_amount" value="<?php echo $other_amount;?>">
            <span class="error"><?php echo $other_amountErr;?></span>
        </div>
        <div class="form-group recurring-donation-group">
            <div class="rd-label-block">
                <label for="recurring_donation">Recurring Donation</label>
                <span class="helper-text">(Check this if yes)</span>
            </div>
            <div class="rd-checkbox-block">
                <input type="checkbox" id="recurring_donation" name="recurring_donation">
                <span>I am interested in giving on a recurring basis.</span>
            </div>
        </div>
        <div class="form-group monthly-credit-group">
            <label for="monthly_credit">Monthly Credit Card $</label>
            <input type="text" id="monthly_credit" name="monthly_credit" style="width:60px;" value="<?php echo $monthly_credit;?>">
            <label for="monthly_credit_for" class="inline-label">For</label>
            <input type="text" id="monthly_credit_for" name="monthly_credit_for" style="width:40px;" value="<?php echo $monthly_credit_for;?>">
            <label for="month" class="inline-label">Months</label>
            <span class="error"><?php echo $monthly_credit_forErr;?></span>
            <span class="error"><?php echo $monthly_creditErr;?></span>
        </div>
        <h2>Honorarium and Memorial Donation Information</h2>
        <div class="form-group honor-radio-group">
            <label class="align-label" for="">I would like to make this donation</label>
            <div class="honor-radio-options">
                <div>
                    <input type="radio" id="honor" name="honor" value="honor">
                    <label for="honor">To Honor</label>
                </div>
                <div>
                    <input type="radio" id="memorial" name="honor" value="memorial">
                    <label for="memorial">In Memory of</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="honor_name">Name</label>
            <input type="text" id="honor_name" name="honor_name">
        </div>
        <div class="form-group">
            <label for="acknowledge-donation">Acknowledge Donation To</label>
            <input type="text" id="acknowledge-donation" name="acknowledge-donation">
        </div>
        <div class="form-group">
            <label for="honor_address">Address</label>
            <input type="text" id="honor_address" name="honor_address">
        </div>
        <div class="form-group">
            <label for="honor_city">City</label>
            <input type="text" id="honor_city" name="honor_city">
        </div>
        <div class="form-group">
            <label for="honor_state">State</label>
            <select name="honor_state" id="honor_state">
                <option value="">Select State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
            </select>
        </div>
        <div class="form-group">
            <label for="honor_zip">Zip Code</label>
            <input type="text" id="honor_zip" name="honor_zip">
        </div>
        <h2>Additional Information</h2>
        <p>Please enter your name, company or organization as you would like it to appear in our publications:</p>
        <div class="form-group">
                <label for="additional_name">Name</label>
                <input type="text" id="additional_name" name="additional_name" value="<?php echo $additional_name;?>">
                <span class="error"><?php echo $additional_nameErr;?></span>
            </div>
            <div class="form-group inline-checkbox-group">
                <span>
                    <input type="checkbox" id="anonymous" name="anonymous">
                    <label for="anonymous">I would like my gift to remain anonymous.</label>
                </span>
                <span>
                    <input type="checkbox" id="matching_gift" name="matching_gift">
                    <label for="matching_gift">My employer offers a matching gift program. I will mail the matching gift form.</label>
                </span>
                <span>
                    <input type="checkbox" id="no_thank_you" name="no_thank_you">
                    <label for="no_thank_you">Please save the cost of acknowledging this gift by not mailing a thank you letter.</label>
                </span>
            </div>
            <div class="form-group">
                <div class="label-with-helper">
                    <label for="comments">Comments</label>
                    <span class="helper-text">(Please type any questions or feedback here)</span>
                </div>
                <textarea id="comments" name="comments"></textarea>
            </div>
            <div class="form-group">
                <label for="contact_method">How may we contact you?</label>
                <div class="contact-method-group">
                    <div>
                        <input type="checkbox" id="email_contact" name="contact_method" value="email">
                        <label for="email_contact">E-mail</label>
                    </div>
                    <div>
                        <input type="checkbox" id="postal_mail" name="contact_method" value="postal_mail">
                        <label for="postal_mail">Postal Mail</label>
                    </div>
                    <div>
                        <input type="checkbox" id="telephone_contact" name="contact_method" value="telephone_contact">
                        <label for="telephone_contact">Telephone</label>
                    </div>
                    <div>
                        <input type="checkbox" id="fax_contact" name="contact_method" value="fax_contact">
                        <label for="fax_contact">Fax</label>
                    </div>
                </div>
            </div>

            <div>
                <label for="newsletter_method">I would like to receive newsletters and information about special events by:</label>
                <div class="newsletter-checkbox-group">
                    <div>
                        <input type="checkbox" id="newsletter_email" name="newsletter_method" value="email">
                        <label for="newsletter_email">E-mail</label>
                    </div>
                    <div>
                        <input type="checkbox" id="newsletter_postal" name="newsletter_method" value="postal_mail">
                        <label for="newsletter_postal">Postal Mail</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="volunteer-info-group">
                    <input type="checkbox" id="volunteer_info" name="volunteer_info" value="1" <?php if ($volunteer_info) echo "checked"; ?>>
                    <label for="volunteer_info">I would like information about volunteering with the</label>
                    <span class="error"><?php echo $volunteer_infoErr;?></span>
                </div>
            </div>
            <div class="form-group form-buttons">
                <input type="reset" value="Reset">
                <input type="submit" value="Continue">
            </div>
    </form>
    </section>
</body>
</html>