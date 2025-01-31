<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Log In</title>
    <style>
        .only{
            margin-top: 100px;
        }
        
        .rr{
            background-color: azure;
            min-height: 700px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="rr">
        <div class="container">
            <div class="text-center mt-4">
                <h2>BLAQUE BUDGET</h2>
                <h3>Administrator's Login</h3>
                <p>Login to continue</p>
                <?php if(isset($_SESSION['feedback']))
                        echo $_SESSION['feedback'];
                    ?>
        </div>
        <form action="process/login_process.php" method="post">
            <div class="row col-6  offset-3 only">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button class="btn btn-primary mb-2" name="btngo">Log In</button>
                
            </div>
            </form>    
        </div>
    </div>
</body>
</html>