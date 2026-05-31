<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST)) {
    header('Location: Apply.php');
    exit();
}

require_once 'settings.php';

function sanitise($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

$firstName        = sanitise($_POST['firstName']        ?? '');
$lastName         = sanitise($_POST['lastName']         ?? '');
$birthday         = sanitise($_POST['birthday']         ?? '');
$gender           = sanitise($_POST['gender']           ?? '');
$email            = sanitise($_POST['email']            ?? '');
$phone            = sanitise($_POST['phone']            ?? '');
$street           = sanitise($_POST['street']           ?? '');
$city             = sanitise($_POST['city']             ?? '');
$state            = sanitise($_POST['state']            ?? '');
$postcode         = sanitise($_POST['postcode']         ?? '');
$jobRef           = sanitise($_POST['jobRef']           ?? '');
$experience       = sanitise($_POST['experience']       ?? '');
$availabilityDesc = sanitise($_POST['availabilityDesc'] ?? '');
$skillsDesc       = sanitise($_POST['skillsDesc']       ?? '');
$interviewDate    = sanitise($_POST['date']             ?? '');
$interviewTime    = sanitise($_POST['time']             ?? '');

$days      = isset($_POST['day'])   ? array_map('sanitise', $_POST['day'])   : [];
$skills    = isset($_POST['skill']) ? array_map('sanitise', $_POST['skill']) : [];
$daysStr   = implode(', ', $days);
$skillsStr = implode(', ', $skills);

$errors = [];

if ($firstName === '') {
    $errors[] = 'First name is required.';
} elseif (!preg_match('/^[A-Za-z]{1,20}$/', $firstName)) {
    $errors[] = 'First name must contain only letters (max 20 characters).';
}

if ($lastName === '') {
    $errors[] = 'Last name is required.';
} elseif (!preg_match('/^[A-Za-z]{1,20}$/', $lastName)) {
    $errors[] = 'Last name must contain only letters (max 20 characters).';
}

if ($birthday === '') {
    $errors[] = 'Date of birth is required.';
} else {
    $dob = DateTime::createFromFormat('Y-m-d', $birthday);
    $today = new DateTime();
    if (!$dob || $dob >= $today) {
        $errors[] = 'Date of birth must be a valid past date.';
    }
}

if ($gender === '') {
    $errors[] = 'Gender is required.';
} elseif (!in_array($gender, ['Male', 'Female'])) {
    $errors[] = 'Invalid gender selection.';
}

if ($email === '') {
    $errors[] = 'Email address is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email address is not valid.';
}

if ($phone === '') {
    $errors[] = 'Phone number is required.';
} elseif (!preg_match('/^04[0-9]{8}$/', $phone)) {
    $errors[] = 'Phone must start with 04 and be 10 digits.';
}

if ($street === '') {
    $errors[] = 'Street address is required.';
}

if ($city === '') {
    $errors[] = 'City is required.';
}

$validStates = ['Victoria','New South Wales','Queensland','South Australia','Tasmania','Western Australia','Northern Territory','ACT'];
if ($state === '') {
    $errors[] = 'State is required.';
} elseif (!in_array($state, $validStates)) {
    $errors[] = 'Invalid state selected.';
}

if ($postcode === '') {
    $errors[] = 'Postcode is required.';
} elseif (!preg_match('/^[0-9]{4}$/', $postcode)) {
    $errors[] = 'Postcode must be exactly 4 digits.';
}

if ($jobRef === '') {
    $errors[] = 'Job reference is required.';
}

$validExperience = ['No experience','Less than a year','1-2 years','3-5 years','5+ years'];
if ($experience === '') {
    $errors[] = 'Experience level is required.';
} elseif (!in_array($experience, $validExperience)) {
    $errors[] = 'Invalid experience selection.';
}

if (empty($days)) {
    $errors[] = 'Please select at least one day of availability.';
}

if ($interviewDate === '') {
    $errors[] = 'Preferred interview date is required.';
} else {
    $intDate = DateTime::createFromFormat('Y-m-d', $interviewDate);
    $today = new DateTime('today');
    if (!$intDate || $intDate < $today) {
        $errors[] = 'Interview date must be today or a future date.';
    }
}

if ($interviewTime === '') {
    $errors[] = 'Preferred interview time is required.';
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header('Location: Apply.php');
    exit();
}

$createTable = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber     INT AUTO_INCREMENT PRIMARY KEY,
    jobRef        VARCHAR(20)   NOT NULL,
    firstName     VARCHAR(20)   NOT NULL,
    lastName      VARCHAR(20)   NOT NULL,
    birthday      DATE          NOT NULL,
    gender        VARCHAR(10)   NOT NULL,
    email         VARCHAR(100)  NOT NULL,
    phone         VARCHAR(10)   NOT NULL,
    street        VARCHAR(100)  NOT NULL,
    city          VARCHAR(50)   NOT NULL,
    state         VARCHAR(50)   NOT NULL,
    postcode      CHAR(4)       NOT NULL,
    experience    VARCHAR(30)   NOT NULL,
    availability  VARCHAR(100)  NOT NULL,
    availDesc     TEXT,
    skills        VARCHAR(100)  NOT NULL,
    skillsDesc    TEXT,
    interviewDate DATE          NOT NULL,
    interviewTime TIME          NOT NULL,
    status        ENUM('New','Current','Final') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";
mysqli_query($conn, $createTable);

$stmt = mysqli_prepare($conn,
    "INSERT INTO eoi
        (jobRef, firstName, lastName, birthday, gender, email, phone,
         street, city, state, postcode, experience,
         availability, availDesc, skills, skillsDesc,
         interviewDate, interviewTime, status)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'New')"
);

mysqli_stmt_bind_param(
    $stmt, 'ssssssssssssssssss',
    $jobRef, $firstName, $lastName, $birthday, $gender, $email, $phone,
    $street, $city, $state, $postcode, $experience,
    $daysStr, $availabilityDesc, $skillsStr, $skillsDesc,
    $interviewDate, $interviewTime
);

mysqli_stmt_execute($stmt);
$eoiNumber = mysqli_insert_id($conn);
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Submitted - Kelp Clinic</title>
    <link rel="stylesheet" href="Styles/maintheme.css">
    <link rel="stylesheet" href="Styles/apply.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
</head>
<body class="apply">
<?php include 'header.inc'; ?>
<div class="banner"></div>

<main>
<div class="container">
    <div style="background:#3f4f2f; border:2px solid #E2E3BF; border-radius:15px; padding:20px 30px; max-width:600px; margin:30px auto; color:#E2E3BF;">
        <h2>✅ Application Submitted!</h2>
        <p>Thank you, <strong><?php echo $firstName . ' ' . $lastName; ?></strong>. Your Expression of Interest has been received.</p>

        <table style="width:100%; border-collapse:collapse; margin-top:15px;">
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; width:40%; color:#E2E3BF;">EOI Number</th>       <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><strong>#<?php echo $eoiNumber; ?></strong></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Job Reference</th>              <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $jobRef; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Name</th>                       <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $firstName . ' ' . $lastName; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Date of Birth</th>              <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $birthday; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Gender</th>                     <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $gender; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Email</th>                      <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $email; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Phone</th>                      <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $phone; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Address</th>                    <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo "$street, $city, $state $postcode"; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Experience</th>                 <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $experience; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Availability</th>               <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $daysStr ?: 'None selected'; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Availability Notes</th>         <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $availabilityDesc ?: 'None'; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Skills</th>                     <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $skillsStr ?: 'None selected'; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Other Skills</th>               <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $skillsDesc ?: 'None'; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Interview</th>                  <td style="padding:6px 10px; border-bottom:1px solid #E2E3BF;"><?php echo $interviewDate . ' at ' . $interviewTime; ?></td></tr>
            <tr><th style="text-align:left; padding:6px 10px; background:#51623D; color:#E2E3BF;">Status</th>                     <td style="padding:6px 10px;">New</td></tr>
        </table>

        <p style="margin-top:15px;">Please keep your EOI number <strong>#<?php echo $eoiNumber; ?></strong> for your records.</p>
        <p><a href="index.php" style="color:#E2E3BF;">← Return to Home</a></p>
    </div>
</div>
</main>

<?php include 'footer.inc'; ?>
</body>
</html>