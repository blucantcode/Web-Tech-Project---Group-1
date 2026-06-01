<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>
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
    

    <main>

        <div class="page-title">
            <h1>Job Application Form</h1>
            <p>Please complete all required fields</p>
        </div>

        <?php if (!empty($errors)): ?>
        <div style="color:#E2E3BF; background:#5a1a1a; border:2px solid red; border-radius:10px; padding:15px; width:60%; margin:20px auto;">
            <strong>Please fix the following errors:</strong>
            <ul>
                <?php foreach ($errors as $err) echo "<li>$err</li>"; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="container">

            <form action="process_eoi.php" method="post" novalidate>

                <fieldset>
                    <legend>Applicant Details</legend>

                    <label>First Name:</label>
                    <input type="text" name="firstName" value="<?php echo isset($old['firstName']) ? htmlspecialchars($old['firstName']) : ''; ?>">

                    <label>Last Name:</label>
                    <input type="text" name="lastName" value="<?php echo isset($old['lastName']) ? htmlspecialchars($old['lastName']) : ''; ?>">

                    <label>Date of Birth:</label>
                    <input type="date" name="birthday" value="<?php echo isset($old['birthday']) ? htmlspecialchars($old['birthday']) : ''; ?>">

                    <label>Gender:</label>
                    <label style="display:inline-block; margin-right:12px;"><input type="radio" name="gender" value="Male" <?php echo (isset($old['gender']) && $old['gender'] === 'Male') ? 'checked' : ''; ?>> Male</label>
                    <label style="display:inline-block; margin-right:12px;"><input type="radio" name="gender" value="Female" <?php echo (isset($old['gender']) && $old['gender'] === 'Female') ? 'checked' : ''; ?>> Female</label>

                    <br><label>Email:</label>
                    <input type="text" name="email" value="<?php echo isset($old['email']) ? htmlspecialchars($old['email']) : ''; ?>">

                    <label>Phone:</label>
                    <input type="text" name="phone" value="<?php echo isset($old['phone']) ? htmlspecialchars($old['phone']) : ''; ?>">
                </fieldset>

                <fieldset>
                    <legend>Address</legend>

                    <label>Street:</label>
                    <input type="text" name="street" value="<?php echo isset($old['street']) ? htmlspecialchars($old['street']) : ''; ?>">

                    <label>City:</label>
                    <input type="text" name="city" value="<?php echo isset($old['city']) ? htmlspecialchars($old['city']) : ''; ?>">

                    <label>State:</label>
                    <select name="state">
                        <option value="">Select</option>
                        <?php
                        $states = ['Victoria','New South Wales','Queensland','South Australia','Tasmania','Western Australia','Northern Territory','ACT'];
                        foreach ($states as $s) {
                            $selected = (isset($old['state']) && $old['state'] === $s) ? 'selected' : '';
                            echo "<option $selected>$s</option>";
                        }
                        ?>
                    </select>

                    <label>Postcode:</label>
                    <input type="text" name="postcode" value="<?php echo isset($old['postcode']) ? htmlspecialchars($old['postcode']) : ''; ?>">
                </fieldset>

                <fieldset>
                    <legend>Job Details</legend>

                    <label>Job Reference:</label>
                    <input type="text" name="jobRef" value="<?php echo isset($old['jobRef']) ? htmlspecialchars($old['jobRef']) : ''; ?>">

                    <label>Experience:</label>
                    <select name="experience">
                        <option value="">Select</option>
                        <?php
                        $experiences = ['No experience','Less than a year','1-2 years','3-5 years','5+ years'];
                        foreach ($experiences as $e) {
                            $selected = (isset($old['experience']) && $old['experience'] === $e) ? 'selected' : '';
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
                        $checked = (isset($old['day']) && in_array($d, $old['day'])) ? 'checked' : '';
                        echo "<label style='display:inline-block; margin-right:12px; margin-bottom:8px;'><input type='checkbox' name='day[]' value='$d' $checked> $d</label>";
                    }
                    ?>

                    <br><label>Notes:</label>
                    <textarea name="availabilityDesc"><?php echo isset($old['availabilityDesc']) ? htmlspecialchars($old['availabilityDesc']) : ''; ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Skills</legend>

                    <?php
                    $skills = ['Communication','Medical Administration','Teamwork'];
                    foreach ($skills as $sk) {
                        $checked = (isset($old['skill']) && in_array($sk, $old['skill'])) ? 'checked' : '';
                        echo "<label style='display:inline-block; margin-right:12px; margin-bottom:8px;'><input type='checkbox' name='skill[]' value='$sk' $checked> $sk</label>";
                    }
                    ?>

                    <br><label>Other Skills:</label>
                    <textarea name="skillsDesc"><?php echo isset($old['skillsDesc']) ? htmlspecialchars($old['skillsDesc']) : ''; ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Interview</legend>

                    <label>Date:</label>
                    <input type="date" name="date" value="<?php echo isset($old['date']) ? htmlspecialchars($old['date']) : ''; ?>">

                    <label>Time:</label>
                    <input type="time" name="time" value="<?php echo isset($old['time']) ? htmlspecialchars($old['time']) : ''; ?>">
                </fieldset>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">

            </form>

        </div>
    </main>

</body>

</html>