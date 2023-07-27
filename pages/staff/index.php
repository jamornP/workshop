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
    $time = date("H:i:s");
    $dataW = $dataObj->dataWorkshopBySIdDate("data", $_SESSION['s_id'],"2023-08-04","10:00:00");
    // echo "<pre>";
    // print_r($dataW);
    // echo "</pre>";
    if(count($dataW)>0){
      foreach($dataW as $w){
        $countWS = $dataObj->getDataByWId("count",$w['wd_id']);
        $w_name = $w['w_name'];
        $round = $w['wd_round']." เวลา ".$w['wd_time_start']." - ".$w['wd_time_end'];
        $incom = $w['wd_amount'] - $countWS;
        $department = $w['wd_address'];
        $wd_id = $w['wd_id'];
        $_SESSION['wd_id']=$w['wd_id'];
      }
      if(isset($_GET['id'])){
        $s_id = base64_decode($_GET['id']);
        $dataCk['s_id']=  $s_id;
        $dataCk['wd_id']=  $_SESSION['wd_id'];
        $ckUser = $dataObj->ckData($dataCk);
        if($ckUser){
          $mes="มีข้อมูลนักเรียนคนนี้แล้ว";
          echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
          echo "  
              <script type='text/javascript'>
                  setTimeout(function(){location.href='/workshop/pages/staff'} , 3000);
              </script>
          ";
        }else{
          $data['wd_id'] = $_SESSION['wd_id'];
          $data['s_id'] = $s_id;
          $data['data_time'] = date("Y-m-d H:i:s");
          $ckAdd = $dataObj->addData($data);
        
          if($ckAdd){
            $mes="บันทึกข้อมูลเรียบร้อย";
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
        <table class='table'>
          <thead>
            <tr class='table-success'>
              <th>ที่</th>
              <th>ชื่อขสกุล</th>
              <th>เวลา</th>
              <th>ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $i=0;
                
                $dataWS = $dataObj->getDataByWId("data",$wd_id);
                // echo "<pre>";
                // print_r($dataWS);
                // echo "</pre>";
                foreach($dataWS as $s){
                  $i++;
                  $fullname = $s['ti_name'].$s['s_name']." ".$s['s_surname'];
                  echo "
                    <tr>
                      <td>{$i}</td>
                      <td>{$fullname}</td>
                      <td>{$s['data_time']}</td>
                      <td>ลบ</td>
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
  }else{
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
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php echo $dataW['wd_amount'];?>
              <span class="visually-hidden"></span>
            </span>
          </button>
          <div class="mt-2">สถานที่ : <?php echo $dataW['wd_address']?></div>
          
        </div>

      </div>
    </div>
    <?php
  }
  ?>

  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>