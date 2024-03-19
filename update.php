<?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   
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
        .registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

        * {
  box-sizing: border-box;
}
        input[type=text], input[type=password], input[type=date]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=date]:focus,input[type=password]:focus {
  background-color: #ddd;
  outline: none;
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
            height:50%;
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
<h2>Update your project details</h2>
</div>

<div class="container">
    <div class="menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="project.php">Add Project</a></li>
            
        </ul>
    </div>
    <?php 
           require_once('server.php');
$query = "select * from proj where id=$update";
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["pname"];
        $field2name = $row["cname"];
        $field3name = $row["sdate"];
        $field4name = $row["edate"];
        $field5name = $row["amount"]; 
        $field6name = $row['id'];
       
echo'<div class="content">
        <form method="post" action="signin.php?update=1">
        <input type="hidden" name="action" value="update">
        <label for="projectname"><b>Project Name</b></label>
        <input type="text" placeholder="Enter Project Name" name="pname" value='.$field1name.' required>  

    <label for="psw"><b>Client Name</b></label>
    <input type="text" placeholder="Client Name" name="cname" value='.$field2name.' id="psw" required>
     
    <label for="psw-repeat"><b>Start Date</b></label>
    <input type="date"  name="sdate" value='.$field3name.' id="psw-repeat" required>
    <label for="psw-repeat"><b>End Date</b></label>
    <input type="text"  name="edate" value='.$field4name.' required>
    <label for="psw-repeat"><b>Amount</b> </label>
    <input type="text"  name="amount" value='.$field5name.' id="psw-repeat" required>
    <hr>';
    $result->free();
 
  
}}
?>

    <button type="submit" class="registerbtn" >update</button>
    </form>
  </div>
    </div>
</div>

</body>
</html>
