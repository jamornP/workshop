<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workshop</title>
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/link.php"; ?>
</head>

<body class="font-kanit">
  <?php //require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/navbar.php"; ?>

  <div class="container" style="margin-top: 10%;">
    <div class="card" style="max-width: 50%;margin: 0px auto;">
      <div class="card-header">
        <h5>
          Register
        </h5>
      </div>
      <div class="card-body" style="margin: 0px 10%;">
        <div class="row">
            <form action="" method="POST">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" />
                <label class="form-label" for="email">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control" />
                <label class="form-label" for="password">Password</label>
              </div>

              <!-- Submit button -->
              <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
                <!-- <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button> -->

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
        </div>
      </div>
    </div>

  </div>


  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>