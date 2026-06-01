<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php
include("settings.php");

$sql = "SELECT * FROM about";
$result = mysqli_query($connProject, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Digital Heath and Wellness Provider">
  <meta name="keywords" content="COS10026, Web Technology Project, Assignment, Digital Health">
  <meta name="author" content="Emily Armstrong">
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
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">

  <link rel="stylesheet" href="/Web-Tech-Project---Group-1/Styles/about.css">
  <title>Digital Heath and Wellness Provider</title>
</head>

<!-- used for specifying your css in order to override maintheme.css -> e.g. .about main { *enter css here :D* } - Lotus -->

<body class="about">

  <!-- Include shared website header -->
  <?php include('header.inc'); ?>
  <!-- Banner section -->
  <!-- <div class="banner"></div> -->

  <main>

    <!-- Main page heading -->
    <h1> Meet the team! </h1>

    <!-- Group information -->
    <div class="group-info">
      <ul>
        <li>Group Name: Group 1
          <ul>
            <li>Class: Tuesday 10:30am</li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Group photo -->
    <figure>
      <img src="images/group-photo.png" alt="Group photo">
      <figcaption>Our project team</figcaption>
    </figure>

    <!-- Database content is displayed dynamically from the about table -->
    <section class="team">
      <h2>Who we are</h2>

      <!-- Loop through every row returned from the database query -->
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <!-- Individual team member card -->
        <div class="memberCard">
          <dl>

            <!-- Team member name -->
            <dt><strong><?php echo $row['name']; ?></strong></dt>

            <!-- Student ID -->
            <dd class="studId">
              Student ID: <?php echo $row['student_id']; ?>
            </dd>

            <!-- First contribution -->
            <dd class="contribution1">
              <strong>Contribution 1:</strong> <?php echo $row['contribution-1']; ?>
            </dd>

            <!-- Second contribution -->
            <dd class="contribution2">
              <strong>Contribution 2:</strong> <?php echo $row['contribution-2']; ?>
            </dd>

            <!-- Personal quote -->
            <dd class="quote">
              <?php echo $row['quote']; ?>
            </dd>

          </dl>
        </div>

      <?php } ?>

    </section>

    <!-- Table containing fun facts about each team member -->
    <table>
      <caption> Fun Facts </caption>

      <!-- Table headings -->
      <tr>
        <th> Team Members </th>
        <th> HomeTown </th>
        <th> Coding Snack</th>
        <th> Dream Job</th>
      </tr>

      <!-- Lotus -->
      <tr>
        <td><strong>Lotus Allan</strong></td>
        <td>Drouin</td>
        <td>Vege Chips</td>
        <td>Robotics Software Engineer for NASA or JAXA</td>
      </tr>

      <!-- Phoebe -->
      <tr>
        <td><strong>Phoebe Anastasiou</strong></td>
        <td>Melbourne</td>
        <td>Potato Chips</td>
        <td>Working at google</td>
      </tr>

      <!-- Krisha -->
      <tr>
        <td><strong>Krisha Upadhyay</strong></td>
        <td>Melbourne</td>
        <td>Crackers</td>
        <td>Working at a tech company</td>
      </tr>

      <!-- Emily -->
      <tr>
        <td><strong>Emily Armstrong</strong></td>
        <td>Melbourne</td>
        <td>Lollies</td>
        <td>Tech entrepreneur</td>
      </tr>
    </table>

  </main>

  <!-- Website footer -->
  <footer>
    <p style="color: #E2E3BF;">
      We acknowledge the Wurundjeri people of the Kulin Nation as the Traditional Custodians of the land on which we
      are based in Hawthorn, and we pay our respects to Elders past and present.
      We are committed to learning from and supporting Aboriginal and Torres Strait Islander communities.
    </p>
  </footer>

</body>

</html>