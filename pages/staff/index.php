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
    <div class="card">
      <div class="card-head mt-3">
        <h2 class="text-center">ชื่อกิจกรรม</h2>
        <h4 class="text-center">รอบ เวลา</h4>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead class="text-center">
            <tr>
              <th scope="col">ลำดับที่</th>
              <th scope="col" style="border-left: 1px solid; border-right: 1px solid;">รายชื่อ</th>
              <th scope="col">ลบข้อมูล</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" class="text-center col-3">1</td>
              <td style="border-left: 1px solid;border-right: 1px solid;">Mark</td>
              <td class="text-center col-3"><a hrf="#">ลบ</a></td>
            </tr>
            <tr>
              <td scope="row" class="text-center col-3">2</td>
              <td style="border-left: 1px solid;border-right: 1px solid;">Mavel</td>
              <td class="text-center col-3"><a hrf="#">ลบ</a></td>
            </tr>
            <tr>
              <td scope="row" class="text-center col-3">3</td>
              <td style="border-left: 1px solid;border-right: 1px solid;">Staff</td>
              <td class="text-center col-3"><a hrf="#">ลบ</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>