<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Apply - Kelp Clinic</title>

    <link rel="stylesheet" href="Styles/maintheme.css">
    <link rel="stylesheet" href="Styles/apply.css">

    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>

<body class="apply">

    <?php include('header.inc'); ?>
    <div class="banner"></div>

    <main>

        <div class="page-title">
            <h1>Job Application Form</h1>
            <p>Please complete all required fields</p>
        </div>

        <div class="container">

            <form action="process_eoi.php" method="post" novalidate>

                <fieldset>
                    <legend>Applicant Details</legend>

                    <label>First Name:</label>
                    <input type="text" name="firstName" value="<?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : ''; ?>">

                    <label>Last Name:</label>
                    <input type="text" name="lastName" value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>">

                    <label>Date of Birth:</label>
                    <input type="date" name="birthday" value="<?php echo isset($_POST['birthday']) ? htmlspecialchars($_POST['birthday']) : ''; ?>">

                    <label>Gender:</label>
                    <label><input type="radio" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? 'checked' : ''; ?>> Male</label>
                    <label><input type="radio" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? 'checked' : ''; ?>> Female</label>

                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

                    <label>Phone:</label>
                    <input type="text" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </fieldset>

                <fieldset>
                    <legend>Address</legend>

                    <label>Street:</label>
                    <input type="text" name="street" value="<?php echo isset($_POST['street']) ? htmlspecialchars($_POST['street']) : ''; ?>">

                    <label>City:</label>
                    <input type="text" name="city" value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>">

                    <label>State:</label>
                    <select name="state">
                        <option value="">Select</option>
                        <?php
                        $states = ['Victoria','New South Wales','Queensland','South Australia','Tasmania','Western Australia','Northern Territory','ACT'];
                        foreach ($states as $s) {
                            $selected = (isset($_POST['state']) && $_POST['state'] === $s) ? 'selected' : '';
                            echo "<option $selected>$s</option>";
                        }
                        ?>
                    </select>

                    <label>Postcode:</label>
                    <input type="text" name="postcode" value="<?php echo isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode']) : ''; ?>">
                </fieldset>

                <fieldset>
                    <legend>Job Details</legend>

                    <label>Job Reference:</label>
                    <input type="text" name="jobRef" value="<?php echo isset($_POST['jobRef']) ? htmlspecialchars($_POST['jobRef']) : ''; ?>">

                    <label>Experience:</label>
                    <select name="experience">
                        <option value="">Select</option>
                        <?php
                        $experiences = ['No experience','Less than a year','1-2 years','3-5 years','5+ years'];
                        foreach ($experiences as $e) {
                            $selected = (isset($_POST['experience']) && $_POST['experience'] === $e) ? 'selected' : '';
                            echo "<option $selected>$e</option>";
                        }
                        ?>
                    </select>
                </fieldset>

                <fieldset>
                    <legend>Availability</legend>

                    <?php
                    $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
                    foreach ($days as $d) {
                        $checked = (isset($_POST['day']) && in_array($d, $_POST['day'])) ? 'checked' : '';
                        echo "<label><input type='checkbox' name='day[]' value='$d' $checked> $d</label>";
                    }
                    ?>

                    <label>Notes:</label>
                    <textarea name="availabilityDesc"><?php echo isset($_POST['availabilityDesc']) ? htmlspecialchars($_POST['availabilityDesc']) : ''; ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Skills</legend>

                    <?php
                    $skills = ['Communication','Medical Administration','Teamwork'];
                    foreach ($skills as $sk) {
                        $checked = (isset($_POST['skill']) && in_array($sk, $_POST['skill'])) ? 'checked' : '';
                        echo "<label><input type='checkbox' name='skill[]' value='$sk' $checked> $sk</label>";
                    }
                    ?>

                    <label>Other Skills:</label>
                    <textarea name="skillsDesc"><?php echo isset($_POST['skillsDesc']) ? htmlspecialchars($_POST['skillsDesc']) : ''; ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Interview</legend>

                    <label>Date:</label>
                    <input type="date" name="date" value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; ?>">

                    <label>Time:</label>
                    <input type="time" name="time" value="<?php echo isset($_POST['time']) ? htmlspecialchars($_POST['time']) : ''; ?>">
                </fieldset>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">

            </form>

        </div>
    </main>

</body>

</html>