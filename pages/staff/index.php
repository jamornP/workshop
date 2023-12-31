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
    if ($_SESSION['role'] == 'admin' OR $_SESSION['role'] == 'staff') {
      $dateN = date("Y-m-d");
      $timeN = date("H:i:s");
      // echo $dateN." ".$timeN;
      $dataW = $dataObj->dataWorkshopBySIdDate("data", $_SESSION['s_id'], $dateN, $timeN);
      // $sql = $dataObj->getSQL($_SESSION['s_id'], $dateN, $timeN);
      // echo "<br>.$sql";
      // echo "<pre>";
      // print_r($dataW);
      // echo "</pre>";
      if (count($dataW) > 0) {
        foreach ($dataW as $w) {
          $countWS = $dataObj->getDataByWId("count", $w['wd_id']);
          $w_name = $w['w_name'];
          $round = $w['wd_round'] . " เวลา " . time_sort($w['wd_time_start']) . " - " . time_sort($w['wd_time_end']);
          $incom = $w['wd_amount'] - $countWS;
          $department = $w['wd_address'];
          $wd_id = $w['wd_id'];
          $_SESSION['wd_id'] = $w['wd_id'];
        }
        if (isset($_GET['id'])) {
          $s_id = base64_decode($_GET['id']);
          $dataCk['s_id'] =  $s_id;
          $dataCk['wd_id'] =  $_SESSION['wd_id'];
          $ckUser = $dataObj->ckData($dataCk);
          if ($ckUser) {
            $mes = "มีข้อมูลนักเรียนคนนี้แล้ว";
            echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/workshop/pages/staff'} , 3000);
                </script>
            ";
          } else {
            $data['wd_id'] = $_SESSION['wd_id'];
            $data['s_id'] = $s_id;
            $data['data_time'] = date("Y-m-d H:i:s");
            $ckAdd = $dataObj->addData($data);

            if ($ckAdd) {
              $mes = "บันทึกข้อมูลเรียบร้อย";
              echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";
              echo "  
                  <script type='text/javascript'>
                      setTimeout(function(){location.href='/workshop/pages/staff'} , 3000);
                  </script>
              ";
            }
          }
        }
        ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h5><b class='fs-24'>กิจกรรม</b><br> <?php echo $w_name; ?></h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success position-relative text-white">
                    <?php echo $round; ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php

                    echo $incom;
                    ?>
                        <span class="visually-hidden"></span>
                    </span>
                </button>
                <div class="mt-2">สถานที่ : <?php echo $department; ?></div>
                <div id="divtime"></div>
                <table class='table table-bordered'>
                    <thead>
                        <tr class='table-success text-center'>
                            <th>ที่</th>
                            <th>ชื่อ-สกุล</th>
                            <th>เวลาเข้า</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $i = 0;

                    $dataWS = $dataObj->getDataByWId("data", $wd_id);
                    // echo "<pre>";
                    // print_r($dataWS);
                    // echo "</pre>";
                    foreach ($dataWS as $s) {
                      $i++;
                      $fullname = $s['ti_name'] . $s['s_name'] . " " . $s['s_surname'];
                      $date =date_time_thai($s['data_time']);
                      echo "
                        <tr>
                          <td class='text-center'>{$i}</td>
                          <td>{$fullname}</td>
                          <td class='text-center'>{$date}</td>
                          <td class='text-center'><a href='/workshop/pages/staff/del.php?del=del&s_id={$s['s_id']}&wd_id={$wd_id}' class='link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover'><i class='bx bx-user-x '></i> ลบ</a></td>
                        </tr>
                      ";
                    }

                    ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php
      } else {
        $dataW = $dataObj->getWorkshopBySt($_SESSION['s_id']);
        // print_r($dataW);
        ?>
    <div class="container mt-3">
        <div class="card text-center">
            <div class="card-header bg-primary text-white text-center">
                <h5><b class='fs-24'>กิจกรรม</b><br> <?php echo $dataW['w_name']; ?></h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success position-relative text-white">
                    <?php echo $dataW['w_detail']; ?>
                    <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php //echo $dataW['wd_amount']; ?>
                  <span class="visually-hidden"></span>
                </span> -->
                </button>

                <div class="mt-2">สถานที่ : <?php echo $dataW['wd_address'] ?></div>
                <div id="divtime"></div>
                <?php 
                $dataWD = $dataObj->getWorkshopBySt2($_SESSION['s_id']);
                foreach($dataWD as $wd){
                  $round = $wd['wd_round'] ." วันที่ ".datethai($wd['wd_date']). " เวลา " . time_sort($wd['wd_time_start']) . " - " . time_sort($wd['wd_time_end']);
                  $wdck = $dataObj->getWorkshopDataByTime( $wd['w_id'],$dateN, $timeN);
                  // echo $wdck;
                  if($wdck){
                    if($wd['wd_id']==$wdck[0]['wd_id']){
                      $color = "btn-success";
                      $text = "ยังไม่เปิดให้ลงทะเบียน";
                    }else{
                      $color = "btn-warning";
                      $text = "ยังไม่เปิดให้ลงทะเบียน";
                    }
                  }else{
                    if($wd['wd_date']>$dateN){
                      $color = "btn-warning";
                      $text = "ยังไม่เปิดให้ลงทะเบียน";
                    }else{
                      $color = "btn-danger";
                      $text = "ปิดให้ลงทะเบียนแล้ว";
                    }
                  }
                  echo "
                    <br>
                    <button type='button' class='btn {$color} position-relative text-white mt-2'>
                      {$round}
                      <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>
                        {$wd['wd_amount']}
                        <span class='visually-hidden'></span>
                      </span>
                    </button>
                  ";
                }
              ?>
                <div class="mt-5">
                    <h4 class="text-center text-danger"><b><?php echo $text;?></b></h4>
                </div>
            </div>

        </div>
    </div>
    <?php
      }
    }else{
      
        echo "กรุณาเข้าสู่รับบ ก่อน....";
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/workshop/pages/auth/login.php'} , 2000);
            </script>
        ";

    
    }
  ?>

    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
    <script>
    function showClockRealTime() {
        var d = new Date();
        if (d.getHours() < 10) {
            var h = "0" + d.getHours();
        } else {
            var h = d.getHours();
        }
        if (d.getMinutes() < 10) {
            var m = "0" + d.getMinutes();
        } else {
            var m = d.getMinutes();
        }
        if (d.getSeconds() < 10) {
            var s = "0" + d.getSeconds();
        } else {
            var s = d.getSeconds();
        }
        document.getElementById("divtime").innerHTML = "เวลาปัจจุบัน คือ " + h + ":" + m + ":" + s;
    }
    setInterval("showClockRealTime()", 1000);
    </script>
    <script>
    // Command: toastr["success"]("ข้อความ")

    //ตัวนี้จะเอาไว้ set ค่าต่างๆ toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    </script>
</body>

</html>