<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    background-color: #f9f9f9;
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

.card-1 {
    background-color: #ffcccc; 
}

.card-2 {
    background-color: #ccffcc; 
}

.card-3 {
    background-color: #cce5ff; 
}

.card-4 {
    background-color: #fff3cd; 
}

.card-5 {
    background-color: #e2e2e2; 
}

.card-6 {
    background-color: #f3e5f5; 
}

.card-7 {
    background-color: #ffebd6; 
}


.card p {
    margin: 10px 0 0;
    font-size: 1.5em;
    font-weight: bold;
}

   
    .modal { 
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); 
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #E8FFFB; 
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 300px;
      text-align: center;
      
    }

  
    </style>


</head>
<body>
    
</body>
</html>