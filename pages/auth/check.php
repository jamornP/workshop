<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/vendor/autoload.php"; ?>
<?php
use App\Model\Auth;

$authObj = new Auth;
print_r($_POST);
if (isset($_POST['add'])) {
  $data['s_email'] = $_POST['email'];
  $data['s_password'] = $_POST['password'];
  $data['ti_id'] = $_POST['title'];
  $data['s_name'] = $_POST['name'];
  $data['s_surname'] = $_POST['surname'];
  $data['s_school'] = $_POST['school'];
  $data['s_tel'] = $_POST['tel'];
  print_r($data);
  $ck = $authObj->addUser($data);
  if ($ck) {
    echo "<script language='javascript'> alert('ลงทะเบียนสำเร็จ') </script>";
    header('Location: http://www.example.com/');
    exit;
  } else {
    echo "<script language='javascript'> alert('อีเมลล์นี้ ได้ลงทะเบียนแล้ว') </script>";
  }
}
?>