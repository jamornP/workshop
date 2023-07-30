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
  <?php
    $s_id = $_SESSION['s_id'];
    $st = $dataObj->getStudentById($s_id);
    // print_r($st);
  ?>
  <div class="container mt-3">
    <div class="card" style="max-width: 50%;margin: 0px auto;">
      <div class="card-header">
        <h5>
          แก้ไขข้อมูล (กรุณาระบุข้อมูลชื่อเป็น ภาษาไทย)
        </h5>
      </div>
      <div class="card-body" style="margin: 0px 10%;">
        <div class="row">
          <form action="update.php" method="POST">

            <!-- Title input -->
            <div class="form-outline mb-2">
              <label class="form-label">กรุณาเลือก คำนำหน้า :</label>
              <select class="form-select" aria-label="Default select example" name="title" required>
                <!-- <option selected value="">คำนำหน้า</option> -->
                <?php
                  $titles = $dataObj->getTitle();
                //   print_r($titles);
                  foreach($titles as $title){
                    $select = ($title['ti_id'] == $st['ti_id'] ? "selected" : "");
                    echo "
                      <option value='{$title['ti_id']}' {$select}>{$title['ti_name']}</option>
                    ";
                  }
                ?>
              </select>
            </div>

            <!-- Firstname input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="name">ชื่อจริง :</label>
              <input type="text" id="name" name="name" class="form-control" value="<?php echo $st['s_name'];?>" required/>
              <input type="hidden" id="s_id" name="s_id" class="form-control" value="<?php echo $st['s_id'];?>" />
            </div>

            <!-- Lastname input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="surname">นามสกุล :</label>
              <input type="text" id="surname" name="surname" class="form-control" value="<?php echo $st['s_surname'];?>" required/>
            </div>

            <!-- School input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="school">สถานศึกษา :</label>
              <input type="text" id="school" name="school" class="form-control" value="<?php echo $st['s_school'];?>"/>
            </div>

            <!-- Telephone input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="tel">เบอร์โทรศัพท์ :</label>
              <input type="text" id="tel" name="tel" class="form-control" value="<?php echo $st['s_tel'];?>"/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-2 text-white" name="edit">แก้ไข</button>

          </form>
        </div>
      </div>
    </div>

  </div>


  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>