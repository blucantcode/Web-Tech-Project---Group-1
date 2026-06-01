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

  <?php include('header.inc'); ?>
  <div class="banner"></div>

  <main>

    <h1> Meet the team! </h1>

    <div class="group-info">
      <ul>
        <li>Group Name: Group 1
          <ul>
            <li>Class: Tuesday 10:30am</li>
          </ul>
        </li>
      </ul>
    </div>

    <figure>
      <img src="images/group-photo.png" alt="Group photo">
      <figcaption>Our project team</figcaption>
    </figure>


<!-- Connecting the dataabase so when changes are made on DB, it also changes on the site. -->


    <section class="team">
      <h2>Who we are</h2>
          <!-- Loop through every row returned from the database query. --> 
  
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="memberCard">
          <dl>

            <dt><strong><?php echo $row['name']; ?></strong></dt>

            <dd class="studId">
              Student ID: <?php echo $row['student_id']; ?>
            </dd>

            <dd class="contribution1">
              Contribution 1: <?php echo $row['contribution-1']; ?>
            </dd>

            <dd class="contribution2">
              Contribution 2: <?php echo $row['contribution-2']; ?>
            </dd>


            <dd class="quote">
              <?php echo $row['quote']; ?>
            </dd>

           

          </dl>
        </div>

      <?php } ?>

    </section>


    <table>
      <caption> Fun Facts </caption>

      <tr>
        <th> Team Members </th>
        <th> HomeTown </th>
        <th> Coding Snack</th>
        <th> Dream Job</th>
      </tr>
      <tr>
        <td><strong>Lotus Allan</strong></td>
        <td>Drouin</td>
        <td>Vege Chips</td>
        <td>Robotics Software Engineer for NASA or JAXA</td>
      </tr>
      <tr>
        <td><strong>Phoebe Anastasiou</strong></td>
        <td>Melbourne</td>
        <td>Potato Chips</td>
        <td>Working at google</td>
      </tr>
      <tr>
        <td><strong>Krisha Upadhyay</strong></td>
        <td>Melbourne</td>
        <td>Crackers</td>
        <td>Working at a tech company</td>
      </tr>
      <tr>
        <td><strong>Emily Armstrong</strong></td>
        <td>Melbourne</td>
        <td>Lollies</td>
        <td>Tech entrepreneur</td>
      </tr>
    </table>
  </main>

  <footer>
    <p style="color: #E2E3BF;">We acknowledge the Wurundjeri people of the Kulin Nation as the Traditional Custodians of the land on which we
      are based in Hawthorn, and we pay our respects to Elders past and present.
      We are committed to learning from and supporting Aboriginal and Torres Strait Islander communities.</p>
  </footer>

</body>

</html>