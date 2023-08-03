<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="29">
    <title>Backend</title>
    <!-- -------- -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/link.php"; ?>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Kanit', sans-serif;">
    <div class="wrapper">
        <!-- ----- -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/load.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/menu_left.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/navbar.php"; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ข้อมูล Workshop Real Time</h1>
                            <div id="divtime"></div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <h3>Workshop ที่เปิดอยู่ ณ ปัจจุบัน</h3>
                    <div class="row">
                        <?php
                            $dateN = date("Y-m-d");
                            $timeN = date("H:i:s");
                            // $data = $dataObj->getSql("2023-08-04","09:30:00");
                            $datas = $dataObj->dataWorkshopBydate("data",$dateN,$timeN);
                            // $datas = $dataObj->dataWorkshopBydate("data","2023-08-04","09:30:00");
                            // echo $data;
                            // echo "<pre>";
                            // print_r($datas);
                            // echo "</pre>";
                            foreach($datas as $w){
                                $color = "bg-info";
                                $full = "";
                                $countStu = $dataObj->getDataByWId("count",$w['wd_id']);
                                // $countStu = 15;
                                $per = number_format(($countStu * 100 /$w['wd_amount']),0 );
                            
                                if($per >= 100){
                                    $color = "bg-danger";
                                    $full = "
                                        <div class='ribbon-wrapper'>
                                            <div class='ribbon bg-primary'>
                                                FULL
                                            </div>
                                        </div>
                                    ";
                                }elseif($per > 70){
                                    $color = "bg-warning";
                                }else{
                                    $color = "bg-info";
                                    $full = "";
                                }
                                echo "
                                    <div class='col-md-4 col-sm-6 col-12'>
                                        <div class='info-box {$color}'>
                                            <span class='info-box-icon'><i class='fas fa-user-plus'></i></span>
                                            <div class='info-box-content'>
                                                <span class='info-box-text'><b>Workshop({$w['d_name']}) {$w['w_name']}</b></span>
                                                <h3><span class='info-box-number'>{$countStu}</span></h3>
                                                <div class='progress'>
                                                    <div class='progress-bar' style='width: {$per}%'></div>
                                                </div>
                                                <span class='progress-description'>
                                                    <div class='d-flex justify-content-between'>
                                                        {$per}% <b class='text-end'>จำนวนที่รับ {$w['wd_amount']} คน/รอบ</b>
                                                    </div>
                                                </span>
                                            </div>
                                            {$full}
                                        </div>
            
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </section>

        </div>
        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>
    <!-- ---------  -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/footer.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/script.php"; ?>
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
        document.getElementById("divtime").innerHTML = "เวลาปัจจุบัน " + h + ":" + m + ":" + s;
    }
    setInterval("showClockRealTime()", 1000);
    </script>
</body>

</html>