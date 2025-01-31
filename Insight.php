<?php  
  include "partials/header.php"; 
  require_once "classes/Appointment.php";
  
  
  $k = new Appointment();

  $cat = $k->fetch_cat();
  $brg = $k->display();
  $totalSavings = $k->get_total_deposit();
  $totalExpenses = $k->get_total_withdrawal();
  $totalTransactions = $k->getTransactionTotals();
 
?>


    

        <div class="row">
            <div class="col mt-5">
                <h4 style="text-align:center">This Week</h4>
                <label for="deposit">Deposit</label>
                <input type="number" value="<?php echo (int)$totalTransactions['deposit_by_week'][0]['total_amount'] ?>" disabled>
                
                <label for="">Withdrawal</label>
                <input type="number" value="<?php echo (int) $totalTransactions['withdraw_by_week'][0]['total_amount']  ?>" disabled>
            </div>   
            <div class="col mt-5">
                <h4 style="text-align:center">This Month</h4>
                <label for="">Deposit</label>
                <input type="number" value="<?php echo (int)$totalTransactions['deposit_by_month'][0]['total_amount']  ?>" disabled>
                <label for="">Withdrawal</label>
                <input type="number" value="<?php echo (int)$totalTransactions['withdraw_by_month'][0]['total_amount']  ?>" disabled>
            </div>
              
        </div>

    <div class="col mt-5 offset-9">
        <a class="navbar-brand teen ms-2 text-primary" href="#" data-bs-toggle="modal" data-bs-target="#create">Create a New Goal</a>
        
        <a class="navbar-brand teen ms-2 text-success" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Deposit</a>
        
        <a class="navbar-brand teen ms-2 text-danger" href="#" data-bs-toggle="modal" data-bs-target="#withdraw">Withdraw</a>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Deposit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add your form or content here -->

        <form action="process/process_deposits.php" method="post">
            <div class="row col-6  offset-3 only">

                <div class="mb-3">
                    <label for="" class="form-label">Deposit Amount</label>
                    <input type="number" class="form-control" name="deposit_amt">
                </div>
                
                <div class="mb-3">
                    <label for="goalname" class="form-label" > Goal name</label>
                    <input type="text" class="form-control" name="user_goal_name" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <select name="user_category" class="form-control">
                      <option value="">Select a category</option>
                        <?php foreach($cat as $p){   ?>
                            <option value="<?php echo $p['category_name']; ?>"><?php echo $p['category_name']; ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <button type="submit" class="btn btn-primary mb-2" name="btndp">Deposit</button>
                </div>
                
            </div>
        </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="withdraw">Withdraw</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add your form or content here -->

        <form action="process/process_withdraw.php" method="post">
            <div class="row col-6  offset-3 only">

                <div class="mb-3">
                    <label for="" class="form-label">Withdrawal Amount</label>
                    <input type="number" class="form-control" name="withdraw_amt">
                </div>
                
                <div class="mb-3">
                    <label for="goalname" class="form-label" > Goal name</label>
                    <input type="text" class="form-control" name="user_goal_name" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <select name="user_category" class="form-control">
                      <option value="">Select a category</option>
                        <?php foreach($cat as $p){   ?>
                            <option value="<?php echo $p['category_name']; ?>"><?php echo $p['category_name']; ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <button type="submit" class="btn btn-primary mb-2" name="btndp">Withdraw</button>
                </div>
                
            </div>
        </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="create">Withdraw</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add your form or content here -->
        <div class="text-center mt-4 text-success">
                <h2>BLAQUE BUDGET</h2>
                <h4>Fill the form below to create a goal</h4>
        </div>

        <form action="process/process_savings.php" method="post">
            <div class="row col-6  offset-3 only">
                
                <div class="mb-3">
                    <label for="goalname" class="form-label" > Goal Name</label>
                    <input type="text" class="form-control" name="user_goal_name" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">End Date</label>
                    <input type="date" class="form-control" name="user_end_date">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Goal Target</label>
                    <input type="number" class="form-control" name="user_target_amt" >
                </div>
                

                <div class="mb-3">
                    <label for="description" class="form-label">Goal Description</label>
                    <textarea name="goal_desc" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <select name="user_category" class="form-control">
                      <option value="">Select a category</option>
                        <?php foreach($cat as $p){   ?>
                            <option value="<?php echo $p['category_name']; ?>"><?php echo $p['category_name']; ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I have read and accepted the Terms of Service </label>
                    <button type="submit" class="btn btn-primary mb-2" name="btncrt">Create Goal</button>
                </div>
                
            </div>
        </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

        <div class="row mt-3">

        <?php foreach($brg as $user){  ?>
            <div class="col-2 mt-5">
            
                <h4 class="text-secondary"><?php echo $user['user_goal_name']; ?></h4>
                <h5 class="text-secondary"><?php echo $user['user_category']; ?></h5>                

                <label for="">Balance</label> 
                <input type="number" value="<?php echo (int)($k->get_balance($user['user_goal_name'], $user['user_category'], $user['goal_user_id'])) ; ?>" disabled>

                <label for="">Target</label>
                <input type="number" class="text-success" name="" value="<?php echo $user['user_target_amt']; ?>" disabled >
           
            </div>   
        <?php  } ?>

      </div>
            
    <div class="row mt-5 offset-1">
        <div class="col mt-5">
            
            <label for="">TOTAL SAVINGS</label>
            <input type="number"  class="text-success" value="<?php echo (int)$totalSavings; ?>" disabled>
        </div>

        <div class="col mt-5">
            <label for="">TOTAL EXPENDITURE</label>
            <input type="text" class="text-danger" value="<?php echo (int)$totalExpenses; ?>" disabled>
        </div>

    </div>
        
    

    <div class="row">
       <div class="col mt-5">
            <img src="images/2.png" class="img-fluid" alt="">
       </div>
       <div class="col mt-5">
           <img src="images/2.png" class="img-fluid" alt="">
       </div>
    </div>



    <?php  include "partials/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>