<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workshop</title>
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/link.php"; ?>
</head>

<body class="font-kanit">
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/navbar.php"; ?>

  <div class="container mt-3">
    <div class="card" style="max-width: 90%;margin: 0px auto;">
      <div class="card-header">
        <h5>
          Register (กรุณาระบุข้อมูลชื่อเป็น ภาษาไทย)
        </h5>
      </div>
      <div class="card-body" style="margin: 0px 10%;">
        <div class="row">
          <form action="check.php" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="email">Email :</label>
              <input type="email" id="email" class="form-control" name="email" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="password">Password :</label>
              <input type="password" id="password" class="form-control" name="password" required/>
            </div>

            <!-- Title input -->
            <div class="form-outline mb-2">
              <label class="form-label">กรุณาเลือก คำนำหน้า :</label>
              <select class="form-select" aria-label="Default select example" name="title" required>
                <option selected value="">คำนำหน้า</option>
                <?php
                  $titles = $dataObj->getTitle();
                  // print_r($titles);
                  foreach($titles as $title){
                    echo "
                      <option value='{$title['ti_id']}'>{$title['ti_name']}</option>
                    ";
                  }
                ?>
              </select>
            </div>

            <!-- Firstname input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="name">ชื่อจริง :</label>
              <input type="text" id="name" name="name" class="form-control" required/>
            </div>

            <!-- Lastname input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="surname">นามสกุล :</label>
              <input type="text" id="surname" name="surname" class="form-control" required/>
            </div>

            <!-- School input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="school">สถานศึกษา :</label>
              <input type="text" id="school" name="school" class="form-control" />
            </div>

            <!-- Telephone input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="tel">เบอร์โทรศัพท์ :</label>
              <input type="text" id="tel" name="tel" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-2" name="add">สมัครสมาชิก</button>

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