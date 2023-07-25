<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/vendor/autoload.php"; ?>
<?php 
use App\Model\Auth;
$authObj = new Auth;
print_r($_POST);
if(isset($_POST['add'])){
    $data['s_email'] = $_POST['email'];
    $data['s_password'] = $_POST['password'];
    $data['ti_id'] = $_POST['ti_id'];
    $data['s_name'] = $_POST['name'];
    $data['s_surname'] = $_POST['surname'];
    $data['s_school'] = $_POST['school'];
    $data['s_tel'] = $_POST['tel'];
   print_r($data);
   $ck = $authObj->addUser($data);
   if($ck){
    echo "<script language='javascript'> alert('message successfully sent') </script>";
   }
}
?>