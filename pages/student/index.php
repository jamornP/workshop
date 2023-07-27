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
    <div class="">
      <div class="text-center">
        <?php
        $id = base64_encode($_SESSION['s_id']);
        $data = "http://161.246.13.101/workshop/pages/staff/index.php?id=" . $id;
        ?>
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo $data; ?>" class="img-thumbnail">
        <p class="text-center"><a href="/workshop/pages/index.php" class="mt-3 btn btn-success text-white">หน้าหลัก</a></p>
      </div>
    </div>
  </div>

  <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/components/script.php"; ?>
</body>

</html>