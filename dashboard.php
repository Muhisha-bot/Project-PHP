
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style1.css">
        



    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .header {
            background-color: #009579;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .menu {
            float: left;
            width: 20%;
            background-color: #ddd;
            padding: 20px;
            box-sizing: border-box;
        }
        .content {
            float: left;
            width: 80%;
            background-color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
        }
        .menu ul li {
            margin-bottom: 10px;
        }
        .menu ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 5px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .menu ul li a:hover {
            background-color:  #009579;
        }

        
    </style>
</head>
<body>

<div class="header">
    <h1>Welcome to Your Dashboard</h1>
</div>

<div class="container">
    <div class="menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="project.php">Add Project</a></li>
            <li><a href="index.php">Logout</a></li>
        
        </ul>
    </div>
    <div class="content">
       
        <?php 
           require_once('server.php');
$query = "SELECT * FROM proj";


echo '
<div class="container">
   
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table">
                <thead class="thead-primary">
                  <tr>
                    <th>Project Name</th>
                    <th>Client Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["pname"];
        $field2name = $row["cname"];
        $field3name = $row["sdate"];
        $field4name = $row["edate"];
        $field5name = $row["amount"]; 
        $field6name = $row['id'];
        
        
        echo '
        <tbody>
					      <tr>
					        
                            <td>'.$field1name.'</td> 
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td>'.$field4name.'</td> 
                            <td>'.$field5name.'</td> 
                          
					        <td>
                            <a href="update.php?update='.$field6name.'" class="btn btn-primary">update</a></td>
					      </tr>
<tr> 
                 
              </tr>';
    }
    $result->free();
} 
?>
    </div>
</div>

</body>
</html>
