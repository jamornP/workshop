<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="10">
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
      $dataW = $dataObj->getWorkshopDataById("data",$a['w_id']);
      echo "
            <div class='card mt-2'>
              <div class='card-header bg-primary text-center text-white'>
                <h3 class='text-white'>{$a['w_name']}</h3>
                ({$dataW[0]['d_name']})<br>
                <b class='text-info'>สถานที่ :</b> {$dataW[0]['wd_address']}
              </div>
              <div class='card-body'>
          ";

      echo "";
      $dataworkshop = $dataObj->getWorkshopDataById("data", $a['w_id']);
      //print_r($dataworkshop);
      echo "
          <table class='table table-striped table-hover text-center table-bordered'>
          <thead>
            <tr class='table-warning'>
              <th scope='col'>รอบที่</th>
              <th scope='col'>วันที่</th>
              <th scope='col'>เวลา</th>
              <th scope='col'>จำนวนรับ/มา</th>
              
            </tr>
          </thead>
          <tbody>
          ";
      foreach ($dataworkshop as $b) {
        $time = time_sort($b['wd_time_start']) . " - " . time_sort($b['wd_time_end']);
        $date = datethai($b['wd_date']);
        $countData = $dataObj->getDataByWId("count",$b['wd_id']);
        if($b['wd_amount']>$countData ){
          $color = "text-success";
        }else{
          $color = "text-danger";
        }
        // echo "<pre>";
        // print_r($countData);
        // echo"</pre>";
        echo "<tr>
            <td scope='row' class='text-center col-1'>{$b['wd_round']}</td>
            <td class='text-center col-2'>{$date}</td>
            <td class='text-center col-2'>{$time}</td>
            <td class='text-center col-1 {$color} fs-20'><b>{$b['wd_amount']}/{$countData}</b></td>
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