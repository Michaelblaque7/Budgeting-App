<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar {
      height: 100vh; 
      position: sticky;
      top: 0;
    }
    .sidebar h5 {
      margin-top: 1rem;
      text-transform: uppercase;
      font-weight: bold;
    }
    .sidebar .nav-link {
      font-size: 1rem;
      color: #fff;
    }
    .sidebar .nav-link:hover {
      background-color: #495057;
      color: #f8f9fa;
    }
    .navbar {
      background-color: #343a40;
    }
    .navbar .nav-link {
      color: #f8f9fa;
    }
    .navbar .nav-link:hover {
      color: #adb5bd;
    }
    .content {
      min-height: 100vh;
    }

    .stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    padding: 20px;
}

.card {
    background-color: #969696;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card h3 {
    margin: 0;
    font-size: 1.2em;
    color: #333;
}

.card p {
    margin: 10px 0 0;
    font-size: 1.5em;
    font-weight: bold;
    color: #007bff;
}
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-3 col-lg-2 bg-dark sidebar text-white">
        <div class="position-sticky pt-3">
          <h5 class="text-center">Admin Dashboard</h5>
          <ul class="nav flex-column mt-4">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_category.php">Add category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_user.php">View Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_complaint.php">View Complaints</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <a href="admin_logout.php" class="btn btn-outline-danger"><li class="nav-item">Logout</li></a>
          </ul>
        </div>
      </div>
    </nav>