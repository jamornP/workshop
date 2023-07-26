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
    header('Location: login.php');
    exit();
  } else {
    echo "<script language='javascript'> alert('อีเมลล์นี้ ได้ลงทะเบียนแล้ว') </script>";
    header('Location: register.php');
    exit();
  }
}
if(isset($_POST['check'])){
    $data['s_email'] = $_POST['email'];
    $data['s_password'] = $_POST['password'];
    $ck = $authObj->checkUser($data);
    print_r($data);
    if($ck['login']){
        echo "<script language='javascript'> alert('ยินดีต้อนรับ {$_POST['email']}') </script>";
        if(isset($_SESSION['role'])){
          if($_SESSION['role']=="admin"){
            header('Location: /workshop/backend/pages/index.php');
            exit();
          }elseif($_SESSION['role']=="staff"){
            header('Location: /workshop/pages/staff/index.php');
            exit();
          }else{
            header('Location: /workshop/pages/student');
            exit();
          }
        }else{
          echo "ไม่มี role";
        }
       
    }else{
        echo "<script language='javascript'> alert('Email หรือ Password ไม่ถูกต้อง') </script>";
        header('Location: login.php');
        exit();
    }
}
?>