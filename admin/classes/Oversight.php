<?php

require_once "Db.php";

class Oversight extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
        
    }


    public function login($username, $password){
        $sql = "SELECT * FROM admin_data WHERE admin_username=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$username]);
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        if($records){
            $hashed = $records['admin_password'];
            $check = password_verify($password, $hashed);

            if($check){
                return $records['admin_id'];
            }else{
                $_SESSION['errormsg'] = "incorrect password";
                return false;
            }
        }else{
            $_SESSION['errormsg'] = "incorrect email";
            return false;
        }
       
    }


    public function view_user(){
        $sql = "SELECT * FROM user_biodata";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
    }

    public function insert_category( $add){
        $sql = "INSERT INTO categories(category_name) VALUES(?)";
        $stmt = $this->connect()->prepare($sql);
        $res = $stmt->execute([ $add]);
        return $res;
    }

    public function delete($userid){
        $sql = "DELETE FROM user_biodata WHERE user_id=?";
        $stmtdel = $this->dbconn->prepare($sql);
        $stmtdel->execute([$userid]);
    }

    public function remove($userid){
        $sql = "DELETE FROM user_biodata WHERE user_id=?";
        $stmtdel = $this->dbconn->prepare($sql);
        $stmtdel->execute([$userid]);
    }


    function getTransactionStats() {
        $sql= "
            -- Total deposits
            SELECT 
                COUNT(*) AS count,
                'total_deposits' AS type
            FROM 
                deposit
    
            UNION ALL
    
            -- Total withdrawals
            SELECT 
                COUNT(*) AS count,
                'total_withdrawals' AS type
            FROM 
                withdraw
    
            UNION ALL
    
            -- Total deposits this week
            SELECT 
                COUNT(*) AS count,
                'total_deposits_week' AS type
            FROM 
                deposit
            WHERE 
                WEEK(deposit_date) = WEEK(CURDATE()) AND YEAR(deposit_date) = YEAR(CURDATE())
    
            UNION ALL
    
            -- Total withdrawals this week
            SELECT 
                COUNT(*) AS count,
                'total_withdrawals_week' AS type
            FROM 
                withdraw
            WHERE 
                WEEK(withdraw_date) = WEEK(CURDATE()) AND YEAR(withdraw_date) = YEAR(CURDATE())
    
            UNION ALL
    
            -- Total deposits this month
            SELECT 
                COUNT(*) AS count,
                'total_deposits_month' AS type
            FROM 
                deposit
            WHERE 
                MONTH(deposit_date) = MONTH(CURDATE()) AND YEAR(deposit_date) = YEAR(CURDATE())
    
            UNION ALL
    
            -- Total withdrawals this month
            SELECT 
                COUNT(*) AS count,
                'total_withdrawals_month' AS type
            FROM 
                withdraw
            WHERE 
                MONTH(withdraw_date) = MONTH(CURDATE()) AND YEAR(withdraw_date) = YEAR(CURDATE())
    
            UNION ALL
    
            -- Total users
            SELECT 
                COUNT(*) AS count,
                'total_users' AS type
            FROM 
                user_biodata
        ";
    
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        
        $data = [];
        foreach ($results as $row) {
            $data[$row['type']] = $row['count'];
        }
    
        return $data;
    }


    public function complaint(){
        $sql = "SELECT * FROM complaint";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
   

}




?>