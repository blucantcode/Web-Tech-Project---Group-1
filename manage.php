<!-- NOTE: The only use of AI in this php file was for the purpose of debugging, shortening existing code & research -->

<?php
require_once("settings.php");

$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? '';

// delete all in DB by reference in search bar
if (isset($_POST['deleteall'])) {

    $jobref = mysqli_real_escape_string($conn, $_POST['jobRef']);

    $sql = "DELETE FROM eoi WHERE jobRef='$jobref'";

    mysqli_query($conn, $sql);

    header("Location: manage.php");
    exit();
}

//search by name, ref, or status

$sql = "SELECT jobRef, firstName, lastName, status FROM eoi WHERE 1=1";

if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);

    $sql .= " AND (
        jobRef LIKE '%$search%' OR
        firstName LIKE '%$search%' OR
        lastName LIKE '%$search%' OR
        status LIKE '%$search%'
    )";
}


// Sorting
if ($sort == "job_ref") {
    $sql .= " ORDER BY jobRef";
} elseif ($sort == "firstName") {
    $sql .= " ORDER BY firstName";
} elseif ($sort == "lastName") {
    $sql .= " ORDER BY lastName";
}

$result = mysqli_query($conn, $sql);

//Update status

if (isset($_POST['update_status'])) {

    $jobref = mysqli_real_escape_string($conn, $_POST['jobRef']);
    $newStatus = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE eoi SET status='$newStatus' WHERE jobRef='$jobref'";

    mysqli_query($conn, $sql);

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
    <div class="return">
        <h2>Manager Dashboard</h2>
        <a href="index.php">Return To Home</a>
    </div>
    <main>
        <div class="manage-layout">
            <div class="manage-controls">
                <!-- Search bar -->
                <div class="searchbar">
                    <form method="GET">
                        <input type="search" id="search" name="search"
                            placeholder="Search by Reference, Name, Status...">

                        <type="submit"><span class="searchbox-icon material-symbols-outlined"> search </span></button>
                    </form>
                </div>

                <!-- Controls -->
                <div class="button-options">

                    <!-- Show All Entries -->
                    <a href="manage.php">
                        <button type="button">Show All</button>
                    </a>

                    <!-- Sort Options -->
                    <form method="GET">
                        <button name="sort" value="job_ref">Sort by Job Reference</button>
                        <button name="sort" value="firstName">Sort by First Name</button>
                        <button name="sort" value="lastName">Sort by Last Name</button>
                    </form>
                </div>

                <!-- Delete All -->

                <form method="POST">
                    <div class="deleteall">
                        <input type="hidden" name="jobRef" value="<?= htmlspecialchars($search) ?>">
                        <button name="deleteall" value="delete"
                            onclick="return confirm('Are you sure you want to delete ALL EOIs for this job reference?');">Delete
                            all
                            with Reference</button>
                    </div>
                </form>

            </div>
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
                        <td><?= $row['jobRef'] ?></td>
                        <td><?= $row['firstName'] ?></td>
                        <td><?= $row['lastName'] ?></td>
                        <td>
                            <!-- Update Status In table -->
                            <form method="POST">
                                <!-- keeps the value (job reference) of this row, so when updating to a new status its the correct row -->
                                <input type="hidden" name="jobRef" value="<?= $row['jobRef'] ?>">
                                <select name="status">
                                    <!-- makes sure the value displayed is the already selected value from DB, making the default option what was alr displayed -->
                                    <option value="new" <?= $row['status'] == "New" ? "selected" : "" ?>>New</option>
                                    <option value="current" <?= $row['status'] == "Current" ? "selected" : "" ?>>Current
                                    </option>
                                    <option value="final" <?= $row['status'] == "Final" ? "selected" : "" ?>>Final</option>
                                </select>

                                <button type="submit" name="update_status">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>

</html>