    <?php
       
       require_once "partials/joiner.php";
       require_once "classes/Oversight.php";
       


       $v = new Oversight;
       $view = $v->view_user();
       $count = 1;
       

    ?>



    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Last Name</th>
                        <th>Registration Date</th>
                        <th>Action</th>
                    </tr>
                <?php foreach($view as $u){   ?>
                    <tr>
                        <td><?php echo $u['user_id']; ?></td>
                        <td><?php echo $u['user_fname']; ?></td>
                        <td><?php echo $u['user_email']; ?></td>
                        <td><?php echo $u['user_lname']; ?></td>
                        <td><?php echo ($u['user_reg_date']); ?></td>
                        <td>
                        <a href="delete_user.php?id=<?php echo $u['user_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php  } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>