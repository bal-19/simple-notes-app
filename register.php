<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <!-- Load Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .login-box {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>

</head>
<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">Register</h3>
            <br>
            <form action="proses/register.php" method="post">
            <?php
                if (array_key_exists('error1', $_GET)) {
                    echo "
                        <div class='alert alert-danger' role='alert'>Passwords are not the same</div>
                    "; 
                }
            ?>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-person-circle"></i>
                  </span>
                  <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <span class="input-group-text">
                  <i class="bi bi-key-fill"></i>
                  </span>
                  <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <div class="input-group">
                  <span class="input-group-text">
                  <i class="bi bi-key-fill"></i>
                  </span>
                  <input type="password" class="form-control" name="confirm_password" placeholder="Enter your password" required>
                </div>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark">Register</button>
              </div>
            </form>
            <hr>
            <div class="text-center">
              <p>Already have an account?  <a href="index.php">Login</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
