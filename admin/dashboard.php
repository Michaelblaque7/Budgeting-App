    <?php
        require_once "partials/joiner.php";
        require_once "classes/Oversight.php";

        session_start(); 
        
        $appointment = new Oversight();
        $stats = $appointment->getTransactionStats();
        

    ?>
<div class="stats-container">
    <div class="card">
        <h3>Total Deposits</h3>
        <p><?= $stats['total_deposits']; ?></p>
    </div>
    <div class="card">
        <h3>Total Withdrawals</h3>
        <p><?= $stats['total_withdrawals']; ?></p>
    </div>
    <div class="card">
        <h3>Weekly Deposits</h3>
        <p><?= $stats['total_deposits_week']; ?></p>
    </div>
    <div class="card">
        <h3>Weekly Withdrawals</h3>
        <p><?= $stats['total_withdrawals_week']; ?></p>
    </div>
    <div class="card">
        <h3>Monthly Deposits</h3>
        <p><?= $stats['total_deposits_month']; ?></p>
    </div>
    <div class="card">
        <h3>Monthly Withdrawals</h3>
        <p><?= $stats['total_withdrawals_month']; ?></p>
    </div>
    <div class="card">
        <h3>Total Users</h3>
        <p><?= $stats['total_users']; ?></p>
    </div>
</div>




        <div class="content pt-3">
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
