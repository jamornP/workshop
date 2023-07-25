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

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-9 mt-3">
                <h2>สแกนเพื่อลงทะเบียนรับใบประกาศนียบัตร เมื่อเข้าร่วมกิจกรรม Workshop</h2>
                <h4 class="font-sriracha text-white fs-20">"โปรดเก็บรูป QR Code ประจำตัวไว้เพื่อแสดงให้เจ้าหน้าที่แสกนข้อมูลก่อนเข้าห้อง Workshop"</h4>
            </div>
            <div class="col-lg-3" style="text-align: center;">
                <img src="/workshop/images/qr/qrm.png"><br>
                <a href="#">หรือคลิกลิ้งค์</a>
            </div>
        </div>

        <div class="mt-3">
            <div class="row">
                <?php
                    $workshops = $dataObj->getWorkshop("data");
                    // print_r($workshops);
                    foreach($workshops as $w){
                        echo "
                        <div class='col-lg-4'>
                            <img src='/workshop/images/{$w['w_img']}' class='img-thumbnail'>
                            <div class='row mt-1'>
                                <div class='col-lg-6'>
                                    <p>{$w['w_detail']}</p>
                                    <a href='{$w['w_link']}'>***
                                        คลิกลงทะเบียน ***</a>
                                    
                                </div>
                                <div class='col-lg-6'>
                                    <img src='/workshop/images/qr/{$w['w_qrcode']}' class='img-thumbnail qropen'>
                                    <p class='text-center'>QR Code Open chat</p>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>
                <!-- <div class="col-lg-4">
                    <img src="/workshop/images/b1.png" class="img-thumbnail">
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <p>สำหรับ นักเรียนมัธยมศึกษา จำนวน 90 คน/รอบ</p>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSds_kGCQXM3dEjoPsGfiHElKW1qB8X-R7yY8G-h_wzAWAV4dg/viewform">***
                                คลิกลงทะเบียน ***</a>
                            
                        </div>
                        <div class="col-lg-6">
                            <img src="/workshop/images/qr/qrm.png" class="img-thumbnail qropen">
                            <p class="text-center">QR Code Open chat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="/workshop/images/b2.png" class="img-thumbnail">
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <p>สำหรับ นักเรียนมัธยมศึกษา จำนวน 90 คน/รอบ</p>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSds_kGCQXM3dEjoPsGfiHElKW1qB8X-R7yY8G-h_wzAWAV4dg/viewform">***
                                คลิกลงทะเบียน ***</a>
                            
                        </div>
                        <div class="col-lg-6">
                            <img src="/workshop/images/qr/qrm.png" class="img-thumbnail qropen">
                            <p class="text-center">QR Code Open chat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="/workshop/images/1-f.png" class="img-thumbnail">
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <p>สำหรับ นักเรียนมัธยมศึกษา จำนวน 90 คน/รอบ</p>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSds_kGCQXM3dEjoPsGfiHElKW1qB8X-R7yY8G-h_wzAWAV4dg/viewform">***
                                คลิกลงทะเบียน ***</a>
                            
                        </div>
                        <div class="col-lg-6">
                            <img src="/workshop/images/qr/qrm.png" class="img-thumbnail qropen">
                            <p class="text-center">QR Code Open chat</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>