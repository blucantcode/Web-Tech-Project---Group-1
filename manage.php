<!-- NOTE: The only use of AI in this php file was for the purpose of debugging, shortening existing code & research -->

<?php
require_once("settings.php");

$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? '';

// delete all in DB by reference in search bar
if (isset($_POST['deleteall'])) {

    $jobref = mysqli_real_escape_string($connManage, $_POST['jobref']);

    $sql = "DELETE FROM testeoi WHERE jobref='$jobref'";

    mysqli_query($connManage, $sql);

    header("Location: manage.php");
    exit();
}

//search by name, ref, or status

$sql = "SELECT jobref, first_name, last_name, status FROM testeoi WHERE 1=1";

if (!empty($search)) {
    $search = mysqli_real_escape_string($connManage, $search);

    $sql .= " AND (
        jobref LIKE '%$search%' OR
        first_name LIKE '%$search%' OR
        last_name LIKE '%$search%' OR
        status LIKE '%$search%'
    )";
}


// Sorting
if ($sort == "job_ref") {
    $sql .= " ORDER BY jobref";
} elseif ($sort == "first_name") {
    $sql .= " ORDER BY first_name";
} elseif ($sort == "last_name") {
    $sql .= " ORDER BY last_name";
}

$result = mysqli_query($connManage, $sql);

//Update status

if (isset($_POST['update_status'])) {

    $jobref = mysqli_real_escape_string($connManage, $_POST['jobref']);
    $newStatus = mysqli_real_escape_string($connManage, $_POST['status']);

    $sql = "UPDATE testeoi SET status='$newStatus' WHERE jobref='$jobref'";

    mysqli_query($connManage, $sql);

    header("Location: manage.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="KELP, Web Technology Assignment Part 2, Group Assignment">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lotus A">
    <title>Manager Dashboard</title>
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

<body class="manage">
    <main>
        <!-- Search bar -->
        <form method="GET">
            <label for="searchcars">Search:</label>
            <input type="search" id="search" name="search" placeholder="Search by Reference, Name, Status...">
            <button type="submit">Search</button>
            <!-- Show All Entries -->
            <a href="manage.php"><button type="button">Show All</button></a>

            <!-- Sort Options -->
            <button name="sort" value="job_ref">Sort by Job Reference</button>
            <button name="sort" value="first_name">Sort by First Name</button>
            <button name="sort" value="last_name">Sort by Last Name</button>
        </form>
        <!-- Delete All -->
        <form method="POST">
            <input type="hidden" name="jobref" value="<?= htmlspecialchars($search) ?>">
            <button name="deleteall" value="delete"
                onclick="return confirm('Are you sure you want to delete ALL EOIs for this job reference?');">Delete all
                with Reference</button>
        </form>
        <!-- Results Table -->
        <table border="1">
            <tr>
                <th>Job Reference</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['jobref'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td>
                        <!-- Update Status In table -->
                        <form method="POST">
                            <!-- keeps the value (job reference) of this row, so when updating to a new status its the correct row -->
                            <input type="hidden" name="jobref" value="<?= $row['jobref'] ?>">
                            <select name="status">
                                <!-- makes sure the value displayed is the already selected value from DB, making the default option what was alr displayed -->
                                <option value="new" <?= $row['status'] == "New" ? "selected" : "" ?>>New</option>
                                <option value="current" <?= $row['status'] == "Current" ? "selected" : "" ?>>Current</option>
                                <option value="final" <?= $row['status'] == "Final" ? "selected" : "" ?>>Final</option>
                            </select>

                            <button type="submit" name="update_status">Update</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </main>
</body>

</html>