<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
         .container{
            background-color: azure;
            min-height: 1000px;
            width: 100%;
        }
        .navbar{
            background-color: cadetblue;
        }
        .foot{ height:80px;background-color:gray; color:lightcyan;text-align:center;padding:2px 4px;}
    </style>
    <title>HomePage</title>
</head>
<body>

    <div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg ">
              <div class="container-fluid nav">
                <a class="navbar-brand teen ms-2" href="home.php">BLAQUE BUDGET</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse offset-6" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active text-light" aria-current="page" href="home.php">Home</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link  text-light" href="transactions.php" role="button">Transactions</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link  text-light" href="Insight.php" role="button">Savings/Budgets</a>
                    </li>

                    <li class="nav-item mb-lg-2">
                      <a class="nav-link active text-light" aria-current="page" href="support.php">Support </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="login.php">Log Out</a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>

        </div>
