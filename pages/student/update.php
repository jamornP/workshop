<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/function/function.php"; ?>
<?php
use App\Model\Data;

$dataObj = new Data;
print_r($_POST);
if(isset($_POST['edit'])){
    $data['s_id'] = $_POST['s_id'];
    $data['ti_id'] = $_POST['title'];
    $data['s_name'] = $_POST['name'];
    $data['s_surname'] = $_POST['surname'];
    $data['s_school'] = $_POST['school'];
    $data['s_tel'] = $_POST['tel'];
    print_R($data);
    $ck = $dataObj->updateStudent($data);
    if($ck){
        echo "
        <script type='text/javascript'>
            location.href='/workshop/pages/auth/logout.php';
        </script>
        ";
    }
}
?>