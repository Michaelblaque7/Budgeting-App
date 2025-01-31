    <?php  include "partials/header.php";
    require_once "classes/Appointment.php";
    
    $sact = new Appointment();
    $transact = $sact->get_history();
    $transactionsLog = $sact->getTransactionLog();
    $count = 1;
    
    ?>

        <div class="row">
            <div class="col fit mt-4 text-success">
                <h2 style="text-align:center">OVERVIEW</h2>
            </div>
        </div>

        <div class="row">
            <div class="col mt-4">
                <h3 style="text-align:center">SAVINGS AND BUDGET</h3>
                <table border="2" width="80%" cellspacing="20" cellpadding="3" align="center" class="table table-striped" style="border-color: #4CAF50;">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Target</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>

                    <?php foreach($transact as $view){   ?>
                    <tr>
                        <td><?= $view['user_goal_name']; ?></td>  
                        <td><?= $view['goal_desc']; ?></td>  
                        <td><?= $view['user_target_amt']; ?></td>    
                        <td><?= $view['user_end_date']; ?></td> 
                        <td>
                        <a href="delete.php?id=<?= $view['goal_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td> 
                    </tr>
                    <?php  } ?>
                </table>
            </div>
        </div>
            
            <br><br>
            <div class="row">
                <div class="col mt-5">
                    <h3 style="text-align:center">TRANSACTION HISTORY</h3>
                    <table border="1" width="80%" cellspacing="20" cellpadding="3" align="center" class="table table-striped" style="border-color:#4CAF50">
                        <tr>
                            <th>ID</th>
                            <th>Transaction Type</th>
                            <th>Transaction Name</th>
                            <th>Transaction Amount</th>
                            <th>Transaction Date</th>
                        </tr>
                            
                        <?php foreach($transactionsLog as $transaction){   ?>
                        <tr>
                            <td><?= $count++; ?></td> 
                            <td><?= $transaction['transaction_type']; ?></td>  
                            <td><?= $transaction['user_goal_name'] ?? '-'; ?></td> 
                            <td><?= $transaction['amount']; ?></td> 
                            <td><?= $transaction['transaction_date']; ?></td>   
                            
                        </tr>
                        
                        <?php  } ?>
                    </table>
                </div>
            </div>
           
        
    </div>
    <?php  include "partials/footer.php" ?>