<?php
       
       require_once "partials/joiner.php";
       require_once "classes/Oversight.php";
       


       $v = new Oversight;
       $complaint = $v->complaint();
       $count = 1;

    ?>



    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>Message</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        
                        
                    </tr>
                <?php foreach($complaint as $u){   ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $u['comp_message']; ?></td>
                        <td><?php echo $u['comp_name']; ?></td>
                        <td><?php echo $u['email']; ?></td>
                       
                    </tr>
                <?php  } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>