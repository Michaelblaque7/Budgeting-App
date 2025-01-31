<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Mini Project</title>
    <style>

         

        .container{
            width: 100%;
        }

        .flow{
            background-color: cornflowerblue;
            min-height: 300px;
            
        }
        .second{
            min-height: 300px;
            
        }
        .third{
            background-color: azure;
            min-height: 300px;
        }
        .fourth{
            min-height: 300px; 
        }

        .footer{ height:80px;background-color:gray; color:lightcyan;text-align:center;padding:2px 2px;}

   

    </style>
</head>
<body>
    <div class="container mt-3">
		<div class="row  ">
			<div class="col-md-12 shadow p-3 mb-1 rounded">
				<nav class="navbar navbar-expand-lg bg-light">
				  <div class="container-fluid nav">
				    <a class="navbar-brand teen ms-2" href="#">BLAQUE BUDGET</a>
				    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				      <span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse offset-7" id="navbarSupportedContent">
				      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				        <li class="nav-item">
				          <a class="nav-link active text-primary" aria-current="page" href="home.php">Home</a>
				        </li>

                        <li class="nav-item ">
                            <a class="nav-link  text-primary" href="#" role="button">Support</a>
                        </li>

				        <li class="nav-item mb-lg-2">
				          <a class="nav-link active text-primary" aria-current="page" href="login.php">Log In</a>
				        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary" aria-current="page" href="signup.php">Sign Up</a>
                          </li>
				      </ul>
				    </div>
				  </div>
				</nav>

			</div>

        <div class="row flow shadow p-3 mb-5 rounded mt-2">
            <div class="col text-light offset-3 mt-5 ">
                <h1>Fast and Easy Budgeting</h1>
                <!-- <h2>Expenses Manager</h2> -->
                <h5>Manage your personal finances and easily track your money, expenses and budget</h5>
            </div>

            <hr> 

            <div class="col text-light offset-3">
                <h4>Download the App for your devices </h4>
            </div>
        </div>

        <div class="row second mt-5 ">
            <div class="col ">
                <img src="images/1.jpg" style="width:100%" class="img-fluid shadow p-3 rounded" alt="">
            </div>
            <div class="col">
                <h1>Overview</h1>
                <p>A personal budgeting application that helps users track their income, expenses and also manage their budgets. </p>
                <img src="images/f.WEBP" style="width:100%" class="img-fluid shadow p-3 rounded" alt="">
            </div>
        </div>

        <div class="row third ">
            <div class="col mt-5">
            <img src="images/6.WEBP" style="width:100%" class="img-fluid shadow p-3  rounded" alt="">
            </div>
            <div class="col mt-5">
                <h1>Savings and Budgets</h1>
                <p>Create custom savinggs and budgets to always know how much money you still have available.</p>
                <p>It's possible to select more than one category for each savings and budget.</p>
                <p>Keep track of your savings to make sure you meet up target</p>
            </div>
        </div>

        <div class="row fourth">
            <div class="col mt-5">
            <img src="images/5.jpg" style="width:100%" class="img-fluid shadow p-3  rounded" alt="">
            </div>

            <div class="col mt-5">
                <h1>Transactions</h1>
                <p>Manage your daily expenses as you wish. You can create unlimited categories and subcategories to track them better.</p>
                <p>Keep track of your expenditures to make sure not to go overboard</p>
            </div>
        </div>

        <?php  include "partials/footer.php" ?>