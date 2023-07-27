<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/function/function.php"; ?>
<?php
session_start();
date_default_timezone_set('Asia/Bangkok');

use App\Model\Auth;

$authObj = new Auth;

use App\Model\Data;

$dataObj = new Data;


if (isset($_GET['del'])) {
    $s_id = $_GET['s_id'];
    $wd_id = $_GET['wd_id'];
    //$project = $adminObj->getProjectById($_GET['pro_id']);
    echo "
        <script type='text/javascript'>
            let isExecuted = confirm('คุณแน่ใจว่าต้องการลบข้อมูลรายการนี้ ?');
            if (isExecuted == true) {
                location.href='/workshop/pages/staff/del.php?btdel=ok&s_id={$s_id}&wd_id={$wd_id}';
            } else {
                location.href='/workshop/pages/staff';
            }
            console.log(isExecuted);
        </script>
    ";
}
if (isset($_GET['btdel']) and $_GET['btdel'] == 'ok') {
    $data['s_id'] = $_GET['s_id'];
    $data['wd_id'] = $_GET['wd_id'];
    $ck = $dataObj->delData($data);
    if ($ck) {
        echo "
        <script type='text/javascript'>
            location.href='/workshop/pages/staff';
        </script>
        ";
    }
}
// print_r($_GET)
?>