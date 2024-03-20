<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><b>Notes</b>Apps</a>
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id'];
                }
                ?>
            <div class="navbar-nav ms-auto">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" name="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill"></i> <?php echo "<span style='text-transform: capitalize;'>$username</span>"; ?>
                    </button>
                    
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item disable" aria-disabled="true">Account ID : <?php echo "$id"; ?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="proses/logout.php" class="dropdown-item">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>