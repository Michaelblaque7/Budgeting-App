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
                <p>Login to continue</p>
                <?php if(isset($_SESSION['feedback']))
                        echo $_SESSION['feedback'];
                    ?>
        </div>
        <form action="process/process_login.php" method="post">
            <div class="row col-6  offset-3 only">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">I have read and accepted the Terms of Service and the Privacy Policy</label>
                </div>
                <button class="btn btn-primary mb-2" name="btngo">Log In</button>
                
                <div class="row">
                    <div class="col-6">
                        <p>Dont have an account?<a class="nav-link active text-primary" aria-current="page" href="signup.php">Sign Up</a></p> 
                    </div>
                    
                </div>
                </div>
            </form>    
        </div>
    </div>
</body>
</html>