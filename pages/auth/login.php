<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workshop</title>
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/link.php"; ?>
</head>

<body class="font-kanit">
  <?php //require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/navbar.php"; 
  ?>

  <div class="container vh-100">
    <!-- <div class="card mt-10" style="max-width: 50%;margin: 0px auto;">
      <div class="card-header">
        <h5>
          เข้าสู่ระบบ
        </h5>
      </div>
      <div class="card-body" style="margin: 0px 10%;">
        <div class="row">
          
        </div>
        <div class="row mt-3">
          <form action="check.php" method="POST">
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email :</label>
              <input type="email" id="email" name="email" class="form-control" />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password :</label>
              <input type="password" id="password" name="password" class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" name="check">Sign in</button>

            <div class="text-center">
              <p>Not a member? <a href="register.php">Register</a></p>
            </div>
          </form>
        </div>
      </div>
    </div> -->


    <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="card mb-3">


        <div class="card-header bg-primary text-white text-center">
          <h4>เข้าสู่ระบบ Workshop</h4>
        </div>
        <div class="card-body">
          <div class="mt-2">
            <img src="/workshop/images/logo.png" alt="" style="display:table; margin: 0 auto; max-width:200px;">
            <p class="text-center mt-2 text-success">เข้าสู่ระบบสร้าง QR Code</p>
          </div>
          <form action="check.php" class="mb-3" method="POST">
            <div class="form-group mt-5">
              <label for="email">Email :</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary mt-2 text-white" name="check">Login</button>
            </div>
          </form>
          <a href="register.php">ลงทะเบียน</a><BR>
          <!-- <a href="resetPass.php">ลืมรหัสผ่าน</a> -->
        </div>
      </div>
    </div>
  </div>


  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>