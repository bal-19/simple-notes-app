<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
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
    </style>

</head>
<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">Welcome to <b>Notes</b>Apps</h3>
            <div class="text-center">Please Login to Continue</div>
            <br>
            <form action="proses/login.php" method="post">
            <?php
                if (array_key_exists('error', $_GET)) {
                    echo "
                        <div class='alert alert-danger' role='alert'>Wrong Username or Password</div>
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
                  <input type="password" class="form-control" name="password" id="pass"  placeholder="Enter your password" required>
                </div>
                <br>
                <div class="form-check">
                  <input class="form-check-input shadow" type="checkbox" value="" id="toggleShowPass">
                  <label class="form-check-label" for="exampleCheckbox">
                    Show Password
                  </label>
                </div>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark">Login</button>
              </div>
            </form>
            <hr>
            <div class="text-center">
              <p>Don't have an account?  <a href="register.php">Register</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <Script>
    const passwordInput = document.getElementById('pass');
    const togglePassword = document.getElementById('toggleShowPass');

    togglePassword.addEventListener('change', function () {
      if (this.checked) {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    });
  </Script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
