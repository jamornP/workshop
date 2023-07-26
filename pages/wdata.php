<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workshop</title>
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/link.php"; ?>
</head>

<body class="font-kanit bg-242">
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/navbar.php"; ?>
  <div class="container mt-3">
    <div class="card">
      <div class="card-head mt-3">

        <?php
        $workshop = $dataObj->getWorkshop("data");
        // print_r($data);
        foreach ($workshop as $a) {
          echo "<h2 class='text-center'>{$a['w_name']}</h2>";

        }
        ?>

      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead class="text-center">
            <tr>
              <th scope="col">รอบที่</th>
              <th scope="col" style="border-left: 1px solid; border-right: 1px solid;">เวลา</th>
              <th scope="col" style="border-right: 1px solid;">จำนวนรับ</th>
              <th scope="col">จำนวนที่มา</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" class="text-center col-3">1</td>
              <td style="border-left: 1px solid;border-right: 1px solid;">Mark</td>
              <td class="text-center col-3" style="border-right: 1px solid;"><a hrf="#">20</a></td>
              <td class="text-center col-3"><a hrf="#">10</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>