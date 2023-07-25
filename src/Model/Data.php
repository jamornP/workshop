<?php
namespace App\Model;
use App\Database\DbWorkshop;
class Data extends DbWorkshop {
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

}