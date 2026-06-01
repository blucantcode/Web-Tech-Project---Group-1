<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Homepage for KELP">
  <meta name="keywords" content="KELP, Web Technology Assignment, Group Assignment">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Lotus A">
  <title>KELP Homepage</title>
  <link rel="stylesheet" href="Styles/index.css">
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

</head>

<!-- BANNER -->

<body class="index">

  <?php include('header.inc'); ?>


  <div class="banner-desc">
    <h1>HOLISTIC <br> HARMONY</h1>
    <h2>A New Way To <em>Thrive</em></h2>
    <br>
    <p>
      Discover a technology that bridges <br>
      the gap between your practice and <br>
      your patients. Its as simple as <br>
      hitting apply.
    </p>
  </div>
  </div>


<main>


  <!-- MAIN CONTENT INTRO -->
  <div class="body">
    <div class="body-desc">
      <div class="body-head">
        <h2>What We Do</h2>
      </div>
      <p> Our technology is a new way for you to experience practice to patient connection. Our goal is to enable
        practices a simple and easy way to interact with patients and run their clinics. We offer a range of services
        and
        specialise in providing your clinic with trained and experienced medical and wellness professionals, backed by
        our
        100% Satisfaction Guarantee. </p>
    </div>
  </div>


<!-- SPACER BG -->
  <div class="clinicimage"></div>
  <div class="bgv">
    <div class="body-v-head">

    <!-- VACANCIES TABLE/SEE MORE -->
      <h2>Current Vacancies</h2>
    </div>
    <div class="body-vacancies">
      <div class="body-table">
        <table>
          <tr>
            <th>Position</th>
            <th>Reference</th>
            <th colspan="2">Description</th>
          </tr>
          <tr>
            <td><a href="Apply.php">Telehealth Consultant</a></td>
            <td>J0013</td>
            <td>Provide remote healthcare consultations and support to patients</td>
            <td><em>Reports To Director of Telehealth</em></td>
          </tr>
          <tr>
            <td><a href="Apply.php">Registered Nurse</a></td>
            <td>J0017</td>
            <td>Provide direct patient care and support in a healthcare setting</td>
            <td><em>Reports To Nurse Manager</em></td>
          </tr>
        </table>
      </div>
      <div class="body-alljobs">
        <h3>See More:</h3>
        <a href="jobspage.php">All Jobs</a>
      </div>
    </div>
</div>
   
</main>
  <?php include('footer.inc'); ?>
  
</body>

</html>