
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'settings.php';

$connJobs = mysqli_connect($host, $user, $password, $database); 

if (!$connJobs) {
    die("Connection failed: " . mysqli_connect_error());
}

// For search bar

if (isset($_GET['search'])) {

    $search = mysqli_real_escape_string($connJobs, $_GET['search']);

    $sql = "SELECT Jobs.*, Jobs_requirements.*
            FROM Jobs
            LEFT JOIN Jobs_requirements
            ON Jobs.Job_ID = Jobs_requirements.Job_ID
            WHERE Title LIKE '%$search%'";

} else {

    $sql = "SELECT Jobs.*, Jobs_requirements.*
            FROM Jobs
            LEFT JOIN Jobs_requirements
            ON Jobs.Job_ID = Jobs_requirements.Job_ID";
}

$result = mysqli_query($connJobs, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($connJobs));}


$row1 = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);
$row3 = mysqli_fetch_assoc($result);
$row4 = mysqli_fetch_assoc($result);

mysqli_close($connJobs);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs Page</title>
    <link rel="stylesheet" href="Styles/maintheme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />
    <link rel="stylesheet" href="Styles/jobspage.css">
     
     <style>
  h1 {
    letter-spacing: 2px;
  }
     </style>
</head>

<body>

<!-- /* NavBar */ -->
<?php include('header.inc'); ?>
<div class="jobs-banner"></div>



<main>

<!-- /* Inline CSS for the job cards */ -->
<h1 style="color: #E2E3BF;">Welcome to our careers page</h1>
<div class="description">
    <p>Here you can find the latest job openings and career opportunities for our company.</p>
</div>




<h2>Current Job Openings</h2>

<!-- /* Job grid */ -->
<ul class="jobs">

<!-- Job card 1  -->
 <?php if ($row1) { ?>
<li class="job-card">
    <section>
        <h3><?php echo $row1['Title']; ?></h3>

        <p><?php echo $row1['Description']; ?></p>

        <ul class="job-details">

            <li>
                <h4>Reference Number:</h4>
                <?php echo $row1['Reference_Number']; ?>
            </li>

            <li>
                <h4>Salary:</h4>
                <?php echo $row1['Salary']; ?>
            </li>

            <li>
                <h4>Reporting To:</h4>
                <?php echo $row1['Reporting_To']; ?>
            </li>

            <li>
                <h4>Responsibilities:</h4>

                <ul>
                    <li><?php echo $row1['Responsibility_one']; ?></li>
                    <li><?php echo $row1['Responsibility_two']; ?></li>
                    <li><?php echo $row1['Responsibility_three']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Essential Requirements:</h4>

                <ul>
                    <li><?php echo $row1['Essential_Requirement_one']; ?></li>
                    <li><?php echo $row1['Essential_Requirement_two']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Preferred Requirements:</h4>

                <ul>
                    <li><?php echo $row1['Preferred_Requirements_one']; ?></li>
                    <li><?php echo $row1['Preferred_Requirements_two']; ?></li>
                </ul>
            </li>
        </ul>
    </section>
</li>
<?php } ?>
    
<!-- Job card 2 -->
<?php if ($row2) { ?>
<li class="job-card">
    <section>

        <h3><?php echo $row2['Title']; ?></h3>

        <p><?php echo $row2['Description']; ?></p>

        <ul class="job-details">

            <li>
                <h4>Reference Number:</h4>
                <?php echo $row2['Reference_Number']; ?>
            </li>

            <li>
                <h4>Salary:</h4>
                <?php echo $row2['Salary']; ?>
            </li>

            <li>
                <h4>Reporting To:</h4>
                <?php echo $row2['Reporting_To']; ?>
            </li>

        

            <li>
                <h4>Responsibilities:</h4>

                <ul>
                    <li><?php echo $row2['Responsibility_one']; ?></li>
                    <li><?php echo $row2['Responsibility_two']; ?></li>
                    <li><?php echo $row2['Responsibility_three']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Essential Requirements:</h4>

                <ul>
                    <li><?php echo $row2['Essential_Requirement_one']; ?></li>
                    <li><?php echo $row2['Essential_Requirement_two']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Preferred Requirements:</h4>

                <ul>
                    <li><?php echo $row2['Preferred_Requirements_one']; ?></li>
                    <li><?php echo $row2['Preferred_Requirements_two']; ?></li>
                </ul>
            </li>
        </ul>
    </section>
    </li>
<?php } ?>


<!-- Job card 3 -->
<?php if ($row3) { ?>
<li class="job-card">
    <section>

        <h3><?php echo $row3['Title']; ?></h3>

        <p><?php echo $row3['Description']; ?></p>

        <ul class="job-details">

            <li>
                <h4>Reference Number:</h4>
                <?php echo $row3['Reference_Number']; ?>
            </li>

            <li>
                <h4>Salary:</h4>
                <?php echo $row3['Salary']; ?>
            </li>

            <li>
                <h4>Reporting To:</h4>
                <?php echo $row3['Reporting_To']; ?>
            </li>

        

            <li>
                <h4>Responsibilities:</h4>

                <ul>
                    <li><?php echo $row3['Responsibility_one']; ?></li>
                    <li><?php echo $row3['Responsibility_two']; ?></li>
                    <li><?php echo $row3['Responsibility_three']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Essential Requirements:</h4>

                <ul>
                    <li><?php echo $row3['Essential_Requirement_one']; ?></li>
                    <li><?php echo $row3['Essential_Requirement_two']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Preferred Requirements:</h4>

                <ul>
                    <li><?php echo $row3['Preferred_Requirements_one']; ?></li>
                    <li><?php echo $row3['Preferred_Requirements_two']; ?></li>
                </ul>
            </li>
        </ul>
    </section>
    </li>
<?php } ?>


<!-- Job card 4 -->
 <?php if ($row4) { ?>
<li class="job-card">
    <section>

        <h3><?php echo $row4['Title']; ?></h3>

        <p><?php echo $row4['Description']; ?></p>

        <ul class="job-details">

            <li>
                <h4>Reference Number:</h4>
                <?php echo $row4['Reference_Number']; ?>
            </li>

            <li>
                <h4>Salary:</h4>
                <?php echo $row4['Salary']; ?>
            </li>

            <li>
                <h4>Reporting To:</h4>
                <?php echo $row4['Reporting_To']; ?>
            </li>

        

            <li>
                <h4>Responsibilities:</h4>

                <ul>
                    <li><?php echo $row4['Responsibility_one']; ?></li>
                    <li><?php echo $row4['Responsibility_two']; ?></li>
                    <li><?php echo $row4['Responsibility_three']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Essential Requirements:</h4>

                <ul>
                    <li><?php echo $row4['Essential_Requirement_one']; ?></li>
                    <li><?php echo $row4['Essential_Requirement_two']; ?></li>
                </ul>
            </li>

            <li>
                <h4>Preferred Requirements:</h4>

                <ul>
                    <li><?php echo $row4['Preferred_Requirements_one']; ?></li>
                    <li><?php echo $row4['Preferred_Requirements_two']; ?></li>
                </ul>
            </li>
        </ul>
    </section>
    </li>
<?php } ?>
    
</ul>

<?php if (!$row1 && !$row2 && !$row3 && !$row4) { ?>
    <p>No jobs found matching your search.</p>
<?php } ?>

<!-- /* Apply Box*/ -->
<div class = "apply">
    <aside>
        <h2>How to Apply</h2>
        <p>To apply for any of the above positions, please send your resume and cover letter to <a href="mailto:careers@kelp.com">careers@kelp.com</a></p>
    </aside>
</div>
</main>

</body>

</html>