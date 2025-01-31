
<?php   
        require_once "classes/Appointment.php";
        include "partials/header.php";
        include "partials/card.php";
        


    $log = new Appointment();
    $stats = $log->getTransactionStats();
    $transactionsLog = $log->getTransactionLog();
    $name = $log->get_name();
    $display = $log->display();
    
    $count = 1;
    $counts = 1;

    

?>



    <div class="text-success text-center mt-4">
        <h4>Welcome <i><?= $name[0]['user_fname'].' '. $name[0]['user_lname']; ?>,</i></h4>
    </div>

<div class="stats-container">
    <div class="card card-1">
        <h3>Total Deposits</h3>
        <p><?= $stats['total_deposits']; ?></p>
    </div>

    <div class="card card-2">
        <h3>Total Withdrawals</h3>
        <p><?= $stats['total_withdrawals']; ?></p>
    </div>

    <div class="card card-3">
        <h3>Weekly Deposits</h3>
        <p><?= $stats['total_deposits_week']; ?></p>
    </div>

    <div class="card card-5">
        <h3>Weekly Withdrawals</h3>
        <p><?= $stats['total_withdrawals_week']; ?></p>
    </div>

    <div class="card card-4">
        <h3>Monthly Deposits</h3>
        <p><?= $stats['total_deposits_month']; ?></p>
    </div>

    <div class="card card-7">
        <h3>Monthly Withdrawals</h3>
        <p><?= $stats['total_withdrawals_month']; ?></p>
    </div>

    <div class="card card-6">
        <h3>Total Users</h3>
        <p><?= $stats['total_users']; ?></p>
    </div>
</div>

<div class="row">
    
    <div class="col-md-8 mt-5 mx-auto">
        <h4 align="center">MY GOALS</h4>
        <table class="table table-striped">
            <tr>
                <th>S/N</th>
                <th>Goal Name</th>
                <th>Action</th>
        
            </tr>
            <?php foreach ($display as $index => $u): ?>
                <tr>
                    <td><?= $counts++; ?></td>
                    <td><?= htmlspecialchars($u['user_goal_name']); ?></td>
                    <td>
                        <a class="navbar-brand teen ms-2 text-primary" href="#" data-bs-toggle="modal" data-bs-target="#viewGoalModal<?= $index; ?>">View Details</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    
    <div class="col-md-6 mt-5">
        <?php foreach ($display as $index => $user): ?>
           
            <div class="modal fade" id="viewGoalModal<?= $index; ?>" tabindex="-1" aria-labelledby="viewGoalLabel<?= $index; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewGoalLabel<?= $index; ?>">Goal Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="goal-name-<?= $index; ?>">Goal Name</label>
                            <input type="text" id="goal-name-<?= $index; ?>" name="goal-name" class="form-control" value="<?= htmlspecialchars($user['user_goal_name']); ?>" disabled>

                            <label for="goal-category-<?= $index; ?>" class="mt-3">Goal Category</label>
                            <input type="text" id="goal-category-<?= $index; ?>" name="goal-category" class="form-control" value="<?= htmlspecialchars($user['user_category']); ?>" disabled>

                            <label for="goal-balance-<?= $index; ?>" class="mt-3">Balance</label>
                            <input type="text" id="goal-balance-<?= $index; ?>" name="goal-balance" class="form-control" value="<?= (int)$log->get_balance($user['user_goal_name'], $user['user_category'], $user['goal_user_id']); ?>" disabled>

                            <label for="goal-target-<?= $index; ?>" class="mt-3">Target</label>
                            <input type="text" id="goal-target-<?= $index; ?>" name="goal-target" class="form-control" value="<?= htmlspecialchars($user['user_target_amt']); ?>" disabled>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



<div class="col-md-12 mt-5">
    <h4 align="center">TRANSACTION HISTORY</h4>
    <table border="1" width="80%" cellspacing="20" cellpadding="3" align="center" class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Transaction Type</th>
            <th>Transaction Name</th>
            <th>Transaction Amount</th>
            <th>Transaction Date</th>
        </tr>
        <?php foreach($transactionsLog as $transaction): ?>
            <tr>
                <td><?= $count++; ?></td> 
                <td><?= $transaction['transaction_type']; ?></td>  
                <td><?= $transaction['user_goal_name'] ?? '-'; ?></td> 
                <td><?= $transaction['amount']; ?></td> 
                <td><?= $transaction['transaction_date']; ?></td>   
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>

<?php  include "partials/footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>

    console.log("mikeeeee")
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('view');

    modal.addEventListener('show.bs.modal', function (event) {
        // Get the button that triggered the modal
        console.log("modal clickkkk")

        const button = event.relatedTarget;

        // Extract data from the button's data-* attributes
        const goalName = button.getAttribute('data-goal-name');

        console.log("goal name", goalName)
        const goalCategory = button.getAttribute('data-goal-category');
        const goalBalance = button.getAttribute('data-goal-balance');
        const goalTarget = button.getAttribute('data-goal-target');

        // Update modal fields with the extracted data
        modal.querySelector('input[name="goal-name"]').value = goalName;
        modal.querySelector('input[name="goal-category"]').value = goalCategory;
        modal.querySelector('input[name="goal-balance"]').value = goalBalance;
        modal.querySelector('input[name="goal-target"]').value = goalTarget;
    });
});
</script>