<?php
namespace App\Model;
use App\Database\DbWorkshop;
class Data extends DbWorkshop {
    // data
    public function addData($data){
        $sql = "
            INSERT INTO tb_data (
                wd_id,
                s_id,
                data_time
            ) VALUES (
                :wd_id,
                :s_id,
                :data_time
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function delData($data){
        $sql = "
            DELETE FROM `tb_data` WHERE s_id=:s_id AND wd_id=:wd_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function getDataByWId($action,$wd_id)  {
        $sql ="
            SELECT d.data_id,d.data_time,w.w_id,w.w_name,wd.wd_date,wd.wd_time_start,wd.wd_time_end,wd.wd_round,wd.wd_address,wd.wd_amount,t.ti_name,s.s_name,s.s_surname,s.s_id
            FROM tb_data as d
            LEFT JOIN tb_workshop_data as wd ON wd.wd_id = d.wd_id
            LEFT JOIN tb_workshop as w ON w.w_id = wd.w_id
            LEFT JOIN tb_student as s ON s.s_id = d.s_id
            LEFT JOIN tb_title as t ON t.ti_id = s.ti_id
            WHERE d.wd_id = {$wd_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
            // return $sql;
        }else{
            return $data;
        }
    }
    public function ckData($dataU){
        $sql = "
            SELECT * 
            FROM tb_data
            WHERE s_id = :s_id AND wd_id = :wd_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($dataU);
        $data = $stmt->fetchAll();
        if(count($data)>0){
            return true;
        }else{
            return false;
        }

    }
    // workshop
    public function getWorkshop($action) {
        $sql = "
            SELECT *
            FROM tb_workshop 
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getWorkshopAll($action) {
        $sql = "
            SELECT  *
            FROM tb_workshop as w
            left join tb_workshop_data  as wd on wd.w_id = w.w_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getWorkshopBySt($s_id){
        $sql = "
            select w.*,wd.*
            from tb_student as s
            LEFT JOIN tb_staff as st ON st.s_id = s.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = st.w_id
            LEFT JOIN tb_workshop_data as wd ON wd.w_id = st.w_id
            WHERE s.s_id = {$s_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getWorkshopBySt2($s_id){
        $sql = "
            select w.*,wd.*
            from tb_student as s
            LEFT JOIN tb_staff as st ON st.s_id = s.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = st.w_id
            LEFT JOIN tb_workshop_data as wd ON wd.w_id = st.w_id
            WHERE s.s_id = {$s_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    // title
    public function getTitle(){
        $sql = "
            SELECT * 
            FROM `tb_title`
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    // Member
    public function getMember($action){
        $sql = "
            SELECT *
            FROM tb_student
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    // Title
    public function getIdTitle($ti_name){
        $sql = "
            SELECT *
            FROM tb_title
            WHERE ti_name = '{$ti_name}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0]['ti_id'];
    }
    // รวม
    public function dataWorkshop2($action){
        $sql = "
            select s.s_id,s.s_email,t.ti_name,s.s_name,s.s_surname,w.w_id,w.w_name,wd.wd_id, wd.wd_date,wd.wd_time_start,wd.wd_time_end,wd.wd_round,d.d_name,wd.wd_address,wd.wd_amount
            from tb_student as s
            LEFT JOIN tb_title as t ON t.ti_id = s.ti_id
            LEFT JOIN tb_staff as st ON st.s_id = s.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = st.w_id
            LEFT JOIN tb_workshop_data as wd ON wd.w_id = st.w_id
            LEFT JOIN tb_department as d ON d.d_id = wd.d_id
            WHERE s.role = 'staff' 
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
        
    }
    public function dataWorkshop($action,$s_id){
        $sql = "
            select s.s_id,s.s_email,t.ti_name,s.s_name,s.s_surname,w.w_id,w.w_name,wd.wd_id, wd.wd_date,wd.wd_time_start,wd.wd_time_end,wd.wd_round,d.d_name,wd.wd_address,wd.wd_amount
            from tb_student as s
            LEFT JOIN tb_title as t ON t.ti_id = s.ti_id
            LEFT JOIN tb_staff as st ON st.s_id = s.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = st.w_id
            LEFT JOIN tb_workshop_data as wd ON wd.w_id = st.w_id
            LEFT JOIN tb_department as d ON d.d_id = wd.d_id
            WHERE s.s_id = {$s_id} 
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
        
    }
    public function dataWorkshopBySIdDate($action,$s_id,$date,$time){
        $sql = "
            select s.s_id,s.s_email,t.ti_name,s.s_name,s.s_surname,w.w_id,w.w_name,wd.wd_id, wd.wd_date,wd.wd_time_start,wd.wd_time_end,wd.wd_round,d.d_name,wd.wd_address,wd.wd_amount
            from tb_student as s
            LEFT JOIN tb_title as t ON t.ti_id = s.ti_id
            LEFT JOIN tb_staff as st ON st.s_id = s.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = st.w_id
            LEFT JOIN tb_workshop_data as wd ON wd.w_id = st.w_id
            LEFT JOIN tb_department as d ON d.d_id = wd.d_id
            WHERE s.s_id = {$s_id} AND wd.wd_date = '{$date}' AND (ADDTIME('{$time}','00:30:00') BETWEEN wd.wd_time_start AND wd.wd_time_end)
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
            // return $sql;
        }
        
    }
    public function dataWorkshopBydate($action,$date,$time){
        $sql = "
            select s.s_id,s.s_email,t.ti_name,s.s_name,s.s_surname,w.w_id,w.w_name,wd.wd_id, wd.wd_date,wd.wd_time_start,wd.wd_time_end,wd.wd_round,d.d_name,wd.wd_address,wd.wd_amount
            from tb_student as s
            LEFT JOIN tb_title as t ON t.ti_id = s.ti_id
            LEFT JOIN tb_staff as st ON st.s_id = s.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = st.w_id
            LEFT JOIN tb_workshop_data as wd ON wd.w_id = st.w_id
            LEFT JOIN tb_department as d ON d.d_id = wd.d_id
            WHERE wd.wd_date = '{$date}' AND (ADDTIME('{$time}','00:30:00') BETWEEN wd.wd_time_start AND wd.wd_time_end)
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else if($action=="sql"){
            return $sql;
        }else{
            return $data;
            // return $sql;
        }
        
    }
    public function getSql($date,$time){
        $sql = "
            select s.s_id,s.s_email,t.ti_name,s.s_name,s.s_surname,w.w_id,w.w_name,wd.wd_id, wd.wd_date,wd.wd_time_start,wd.wd_time_end,wd.wd_round,d.d_name,wd.wd_address,wd.wd_amount
            from tb_student as s
            LEFT JOIN tb_title as t ON t.ti_id = s.ti_id
            LEFT JOIN tb_staff as st ON st.s_id = s.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = st.w_id
            LEFT JOIN tb_workshop_data as wd ON wd.w_id = st.w_id
            LEFT JOIN tb_department as d ON d.d_id = wd.d_id
            WHERE wd.wd_date = '{$date}' AND (ADDTIME('{$time}','00:30:00') BETWEEN wd.wd_time_start AND wd.wd_time_end)
        ";
            return $sql;
            // return $sql;
        
    }
    // workshop data
    public function getWorkshopDataById($action,$w_id){
        $sql = "
            SELECT *
            FROM tb_workshop_data as wd
            LEFT JOIN tb_department as d ON d.d_id = wd.d_id 
            WHERE w_id = {$w_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getWorkshopDataByTime($w_id,$date,$time){
        $sql = "
            SELECT *
            FROM tb_workshop_data as wd
            LEFT JOIN tb_department as d ON d.d_id = wd.d_id 
            WHERE wd.w_id={$w_id} AND wd.wd_date = '{$date}' AND (ADDTIME('{$time}','00:30:00') < wd.wd_time_end) 
            ORDER BY wd.wd_time_start
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    //  Student
    public function getStudentById($s_id){
        $sql ="
            SELECT * 
            FROM tb_student
            WHERE s_id = {$s_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getStudentByRole($role){
        $sql ="
            SELECT * 
            FROM tb_student
            WHERE role = '{$role}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getStudentByRoleSt($role){
        $sql ="
            SELECT * 
            FROM tb_student as st
            LEFT JOIN tb_staff as s ON s.s_id = st.s_id
            LEFT JOIN tb_workshop as w ON w.w_id = s.w_id
            WHERE st.role = '{$role}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function updateStudent($stu){
        $sql ="
            UPDATE 
                tb_student 
            SET
                ti_id = :ti_id,
                s_name = :s_name,
                s_surname = :s_surname,
                s_school = :s_school,
                s_tel = :s_tel
            WHERE
                s_id = :s_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($stu);
        return true;
    }
}