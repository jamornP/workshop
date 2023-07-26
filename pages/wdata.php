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


    <?php
    $workshop = $dataObj->getWorkshop("data");
    foreach ($workshop as $a) {
      echo "
            <div class='card mt-2'>
              <div class='card-header bg-primary'>
                <h2 class='text-center text-white'>{$a['w_name']}</h2>
              </div>
              <div class='card-body'>
          ";

      echo "";
      $dataworkshop = $dataObj->getWorkshopDataById("data", $a['w_id']);
      //print_r($dataworkshop);
      echo "
          <table class='table table-striped table-hover text-center table-bordered'>
          <thead>
            <tr class='bg-212'>
              <th scope='col'>รอบที่</th>
              <th scope='col'>เวลา</th>
              <th scope='col'>สถานที่</th>
              <th scope='col'>จำนวนรับ/มา</th>
              
            </tr>
          </thead>
          <tbody>
          ";
      foreach ($dataworkshop as $b) {
        $time = $b['wd_time_start'] . " - " . $b['wd_time_end'];

        echo "<tr>
            <td scope='row' class='text-center col-2'>{$b['wd_round']}</td>
            <td class='text-center col-2'>{$time}</td>
            <td class='text-center col-6'>{$b['wd_address']}</td>
            <td class='text-center col-2'>{$b['wd_amount']}</td>
          </tr>";
      }
      echo "
          </tbody>
        </table>
        </div>
        </div>
          ";
    }
    ?>


  </div>

  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>