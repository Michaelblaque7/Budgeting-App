<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Sign Up</title>
    <style>
        .only{
            margin-top: 70px;
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
                <p>Fill the form below</p>
            </div>

            <?php

                if(isset($_SESSION['errormsg'])){
                    echo "<div class='alert alert-danger'>". $_SESSION['errormsg']."</div>";
                    unset($_SESSION['errormsg']);
                }

                if(isset($_SESSION['feedback'])){
                    echo "<div class='alert alert-success'>". $_SESSION['feedback']. "</div>";
                    unset($_SESSION['feedback']);
                }


            ?>

            <form action="process/process_signup.php" method="post">
            <div class="row col-6  offset-3 only">
                
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                   
                </div>

                 
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                   
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <p><i>Password must match</i></p>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I have read and accepted the Terms of Service and the Privacy Policy</label>
                </div>

                <button type="submit" class="btn btn-primary mb-2" name="btnsg">Sign Up</button>
                <div class="row">
                    <div class="col-6">
                        <p>Click here to<a class="nav-link active text-primary" aria-current="page" href="login.php">Log in</a></p> 
                    </div>
                    
                </div>
              
            
            </div>
        </form>    
    </div>
</div>
</body>
</html>