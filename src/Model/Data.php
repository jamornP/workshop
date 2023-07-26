<?php
namespace App\Model;
use App\Database\DbWorkshop;
class Data extends DbWorkshop {
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
    // รววม
    public function dataWorkshop(){
        $sql = "
            select s.s_email,t.ti_name,s.s_name,s.s_surname,w.w_name, wd.wd_date,wd.wd_time_start,wd.wd_time_end,wd.wd_round,d.d_name,wd.wd_address,wd.wd_amount
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
        return $data;
        
    }
    // workshop data
    public function getWorkshopDataById($action,$w_id){
        $sql = "
            SELECT *
            FROM tb_workshop_data
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
}