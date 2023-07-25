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

  <div class="container mt-3">
    <div class="card" style="max-width: 50%;margin: 0px auto;">
      <div class="card-header">
        <h5>
          Register (กรุณาระบุข้อมูลเป็น ภาษาไทย)
        </h5>
      </div>
      <div class="card-body" style="margin: 0px 10%;">
        <div class="row">
          <form action="check.php" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email address</label>
              <input type="email" id="email" class="form-control" name="email" required />
            </div>

            <!-- Title input -->
            <div class="form-outline mb-4">
              <label class="form-label">กรุณาเลือก คำนำหน้า</label>
              <select class="form-select" aria-label="Default select example" name="title" required>
                <option selected value="">คำนำหน้า</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>

            <!-- Firstname input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="name">ชื่อจริง</label>
              <input type="text" id="name" name="name" class="form-control" required/>
            </div>

            <!-- Lastname input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="surname">นามสกุล</label>
              <input type="text" id="surname" name="surname" class="form-control" required/>
            </div>

            <!-- School input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="school">สถานศึกษา</label>
              <input type="text" id="school" name="school" class="form-control" required/>
            </div>

            <!-- Telephone input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="tel">เบอร์โทรศัพท์</label>
              <input type="text" id="tel" name="tel" class="form-control" required/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" class="form-control" name="password" required/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">สมัครสมาชิก</button>

            <!-- Register buttons -->
            <div class="text-center">
              <p>Already member? <a href="login.php">Log in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>


  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>