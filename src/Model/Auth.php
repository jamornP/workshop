<?php
namespace App\Model;
use App\Database\DbWorkshop;
class Auth extends DbWorkshop {
    public function checkUserGoogle($email,$img) {
        $sql = "
            SELECT *,p.p_name as position
            FROM tb_member as m 
            LEFT JOIN tb_staff as st ON st.email = m.email
            LEFT JOIN tb_position as p ON p.p_id = st.p_id 
            WHERE m.email ='{$email}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if(count($data)>0){
            session_start();
            $_SESSION['login_parttime'] = true;
            $_SESSION['fullname']=$data[0]['title'].$data[0]['name']." ".$data[0]['surname'];
            $_SESSION['id']=$data[0]['id'];
            $_SESSION['email']=$data[0]['email'];
            $_SESSION['img']=$img;
            $_SESSION['role']=$data[0]['role'];
            return true;
        }else{
            return false;
        }
    }

}