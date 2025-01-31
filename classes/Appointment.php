<?php

    require_once "Db.php";
    session_start();

    

    class Appointment extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
            $this->user_id = $_SESSION['user_id']; 
           
        }

      

        public function sign_up($fname, $email, $password, $lname){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user_biodata  SET user_fname=?, user_email=?, user_password=?,  user_lname=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$fname,  $email,$hash,$lname]);
            $id = $this->dbconn->lastInsertId();
            return $id;
        }

        public function login($email, $password){
            $sql = "SELECT * FROM user_biodata WHERE user_email=? LIMIT 1";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$email]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            if($records){
                $hashed = $records['user_password'];
                $check = password_verify($password, $hashed);

                if($check){
                    return $records['user_id'];
                }else{
                    $_SESSION['errormsg'] = "incorrect password";
                    return false;
                }
            }else{
                $_SESSION['errormsg'] = "incorrect email";
                return false;
            }  
        }


        public function create_goal($user_goal_name, $user_end_date, $user_target_amt, $goal_desc, $user_category, $userid){
            $sql = "INSERT INTO user_goal(user_goal_name,user_end_date, user_target_amt, goal_desc, user_category, goal_user_id) VALUES(?, ?, ?, ?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$user_goal_name, $user_end_date, $user_target_amt, $goal_desc, $user_category, $userid]);
            return $this->dbconn->lastInsertId();
        }

       

        public function fetch_cat(){
            $sql = "SELECT * FROM categories";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function display(){
            $sql = "SELECT user_goal_name, user_category, goal_user_id, goal_id, user_target_amt FROM user_goal WHERE goal_user_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->user_id]);
            $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }

        public function show($id){
            $sql = "SELECT user_goal_name, user_category, goal_user_id, user_target_amt FROM user_goal WHERE goal_user_id = ? AND goal_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->user_id, $id]);
            $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function get_name(){
            $sql = "SELECT * FROM user_biodata WHERE user_id = $this->user_id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

       

        public function insert_dep($deposit_amt, $user_goal_name, $user_category, $userid) {
            $sql = "SELECT deposit_amt FROM deposit WHERE user_goal_name = ? AND deposit_user_id = ? LIMIT 1";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$user_goal_name, $userid]);
            
            $existing_deposit = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($existing_deposit) {
                $new_balance = $existing_deposit['deposit_amt'] + $deposit_amt;
                $sql = "UPDATE deposit SET deposit_amt = ? WHERE user_goal_name = ? AND deposit_user_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$new_balance, $user_goal_name, $userid]);
                
                echo "Deposit updated. New balance: $new_balance";

            } else {
                $sql = "INSERT INTO deposit(deposit_amt, user_goal_name, category_name, deposit_user_id) VALUES(?, ?, ?, ?)";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$deposit_amt, $user_goal_name, $user_category, $userid]);
                
                echo "New deposit created. Deposit amount: $deposit_amt";
                return $this->dbconn->lastInsertId();
            }
        }

        
        public function get_balance($user_goal_name, $user_category, $userid) {
            $sql = "SELECT deposit_amt AS total_balance FROM deposit WHERE user_goal_name = ? AND category_name = ? AND deposit_user_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$user_goal_name, $user_category, $userid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $res = $result['total_balance'] ?? '';
            return $res;
        }

        public function withdraw($withdraw_amt, $user_goal_name, $user_category, $userid) {
            $sql = "SELECT deposit_amt AS total_balance FROM deposit WHERE user_goal_name = ? AND category_name = ? AND deposit_user_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$user_goal_name, $user_category, $userid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result || $result['total_balance'] <= 0) {
                echo "Insufficient balance.<br>";
                return false;
            }
        
            $current_balance = $result['total_balance'];
        
            if ($withdraw_amt > $current_balance) {
                echo "Withdrawal amount exceeds available balance.<br>";
                return false;
            }
        
            $new_balance = $current_balance - $withdraw_amt;
        
            $sql = "UPDATE deposit SET deposit_amt = deposit_amt - ? WHERE user_goal_name = ? AND category_name = ?  AND deposit_user_id = ?";
            $sql = "INSERT INTO withdraw (withdraw_amt,	withdraw_id, withdraw_date,	withdraw_user_id) VALUES(?, ?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$withdraw_amt, $user_goal_name, $user_category, $userid]);
            echo "Withdrawal successful. New balance: $new_balance<br>";
            return True;
            
        }

        public function get_total_deposit() {
            $sql = "SELECT SUM(deposit_amt) AS total_deposit FROM deposit WHERE deposit_user_id = $this->user_id";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_deposit'];
        }

        public function get_total_withdrawal() {
            $sql = "SELECT SUM(withdraw_amt) AS total_withdrawal FROM withdraw WHERE withdraw_user_id = $this->user_id";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_withdrawal'];
        }

        public function get_history(){
            $sql = "SELECT user_goal_name, goal_desc, user_target_amt, user_end_date, goal_id FROM user_goal WHERE goal_user_id = $this->user_id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function delete_goal($goalid) {
           
            $sql = "DELETE FROM user_goal WHERE goal_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $del= $stmt->execute([$goalid]);
            return $del;
            
        }


        public function getTransactionLog() {
            $sql = "
                SELECT 
                    deposit.deposit_amt AS amount,
                    deposit.user_goal_name,
                    deposit.category_name,
                    deposit.deposit_date AS transaction_date,
                    'Deposit' AS transaction_type
                FROM 
                    deposit
                WHERE 
                    deposit.deposit_user_id = :user_id
                
                UNION ALL
                
                SELECT 
                    withdraw.withdraw_amt AS amount,
                    NULL AS user_goal_name,
                    NULL AS category_name,
                    withdraw.withdraw_date AS transaction_date,
                    'Withdraw' AS transaction_type
                FROM 
                    withdraw
                WHERE 
                    withdraw.withdraw_user_id = :user_id
                
                ORDER BY 
                    transaction_date DESC
            ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(['user_id' => $this->user_id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            return $result;
        }

            function getTransactionTotals() {
                $sql = "
                    -- Total deposits by week
                    SELECT 
                        'deposit_by_week' AS type,
                        SUM(deposit_amt) AS total_amount,
                        WEEK(deposit_date) AS period,
                        YEAR(deposit_date) AS year
                    FROM 
                        deposit
                    WHERE 
                        deposit.deposit_user_id = :user_id
        
                    GROUP BY 
                        year, period
            
                    UNION ALL
            
                    -- Total deposits by month
                    SELECT 
                        'deposit_by_month' AS type,
                        SUM(deposit_amt) AS total_amount,
                        MONTH(deposit_date) AS period,
                        YEAR(deposit_date) AS year
                    FROM 
                        deposit

                    WHERE 
                        deposit.deposit_user_id = :user_id

                    GROUP BY 
                        year, period
            
                    UNION ALL
            
                    -- Total withdrawals by week
                    SELECT 
                        'withdraw_by_week' AS type,
                        SUM(withdraw_amt) AS total_amount,
                        WEEK(withdraw_date) AS period,
                        YEAR(withdraw_date) AS year
                    FROM 
                        withdraw

                    WHERE 
                        withdraw.withdraw_user_id = :user_id

                    GROUP BY 
                        year, period
            
                    UNION ALL
            
                    -- Total withdrawals by month
                    SELECT 
                        'withdraw_by_month' AS type,
                        SUM(withdraw_amt) AS total_amount,
                        MONTH(withdraw_date) AS period,
                        YEAR(withdraw_date) AS year
                    FROM 
                        withdraw

                    WHERE 
                        withdraw.withdraw_user_id = :user_id

                    GROUP BY 
                        year, period
                ";
            
                $stmt = $this->dbconn->prepare($sql);
                 $stmt->execute(['user_id' => $this->user_id]);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

               
                
            
                
                $data = [
                    'deposit_by_week' => [],
                    'deposit_by_month' => [],
                    'withdraw_by_week' => [],
                    'withdraw_by_month' => [],
                ];
            
                
                foreach ($results as $row) {
                    $type = $row['type'];
                    if (array_key_exists($type, $data)) { 
                        $data[$type][] = [
                            'total_amount' => $row['total_amount'],
                            'period' => $row['period'],
                            'year' => $row['year'],
                        ];
                    } else {
                        echo "Undefined type: $type\n"; 
                    }
                }
            
                return $data;
                
            }

            public function complaint($name, $email, $msg, $userid){
                $sql = "INSERT INTO complaint( comp_name, email, comp_message, complaint_user_id  ) VALUES(?, ?, ?, ? )";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$name, $email, $msg, $userid]);
                return $this->dbconn->lastInsertId();
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
        
            

        }

   
    
?>