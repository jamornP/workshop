<?php
namespace App\Model;
use App\Database\DbWorkshop;
class Auth extends DbWorkshop {
    public function checkUser($user) {
        $sql = "
            SELECT
                s.*,t.ti_name as title
            FROM
                tb_student as s
            LEFT JOIN tb_title as t ON t.ti_id = s.ti_id
            WHERE
                s.s_email = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user['s_email']]);
        $data = $stmt->fetchAll();
        $userDB = $data[0];
        if(password_verify($user['s_password'],$userDB['s_password'])) {
            session_start();
            $_SESSION['s_id'] = $userDB['s_id'];
            $_SESSION['name'] = $userDB['s_name'];
            $_SESSION['surname'] = $userDB['s_surname'];
            $_SESSION['email'] = $userDB['s_email'];
            $_SESSION['tel'] = $userDB['s_tel'];
            $_SESSION['role'] = $userDB['role'];
            $_SESSION['login'] = true;
            $_SESSION['fullname'] = $userDB['title'].$userDB['name']." ".$userDB['surname'];
            $dataUser['role'] = $userDB['role'];

            return $dataUser;
        } else {
            $dataUser['login'] = false;
            return $dataUser;
        }
    }
    public function addUser($user){
        $ckEmail = $this->checkEmail($user['s_email']);
        if($ckEmail){
            return false;
        }else{
            $user['s_password'] = password_hash($user['s_password'],PASSWORD_DEFAULT);

            $sql = "
            INSERT INTO tb_student (
                ti_id,
                s_name,
                s_surname,
                s_school,
                s_tel,
                s_email,
                s_password
                
            ) VALUES (
                :ti_id,
                :s_name,
                :s_surname,
                :s_school,
                :s_tel,
                :s_email,
                :s_password
            )
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($user);
            return true;
        }
        
    }
    public function checkEmail($email) {
        $sql = "
            SELECT *
            FROM tb_student
            WHERE s_email='{$email}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $count = count($data);
        if($count>0){
            return true;
        }else{
            return false;
        }
    }

}