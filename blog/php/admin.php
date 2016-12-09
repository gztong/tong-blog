<?php 
  require_once("./db.php");
  session_start();
  if(!$_SESSION['user']){
    header("location: login.php");
  }
  $user = $_SESSION['user'];
?>

<head>
  <meta charset='UTF-8'>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container toolbar">
      <button type="button" class="btn btn-default navbar-btn"><a href="../">Home</a></button>      
      <button type="button" class="btn btn-default navbar-btn logout"><a href="logout.php">Logout <?php Print "$user" ?> </a></button>
    </div>
  </nav>  
  
  <div class="project-container">
    <h2 align="center">My Projects</h2>
    <table border="1px">
    <tr>
      <th>name</th>
      <th>subtitle</th>
      <th>image</th>
      <th>demo</th>
      <th>description</th>
      <th>operation</th>
    </tr>
    <?php
      $query = $mysqli->query("Select * from projects"); // SQL Query
      while($row = $query->fetch_array())
      {
        Print "<tr>";
        Print '<td align="center">'. $row['name'] . "</td>";
        Print '<td align="center">'. $row['subtitle'] . "</td>";
        Print '<td align="center">'. $row['image'] . "</td>";
        Print '<td align="center">'. $row['demo']. "</td>";
        Print '<td align="center">'. $row['description']. "</td>";
        Print '<td align="center"><a href="delete.php?table='.'projects'.'&id='.$row['id'] .'")">delete</a> </td>';
        Print "</tr>";
      }
    ?>
  </table>

  <div class="form-container col-md-12">
    <form action="addProject.php" method="POST" role="form">
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Name" name="name">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="subtitle" name="subtitle">
      </div>    
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="appstore" name="appstore">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="playstore" name="playstore">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="image" name="image">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="url" name="url">
      </div>    
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="github" name="github">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="demo" name="demo">
      </div>
      <div class="col-md-12">
        <textarea class="form-control" rows="6" placeholder="description" name="description"></textarea>
      </div>
      <div class="col-md-6">
        <div class="input-group same-line">
          <span class="label label-default">public</span>
           <input type="checkbox" class="form-control" name="public" value="public" checked>
        </div>
      </div>
      <div class="col-md-6">
        <input class="btn btn-primary add-button" type="submit" value="ADD" class="form-control">
      </div>
    </form>  
  </div>
  </div>
  

  <br><br><br>
  <div class="experience-container">
    <h2 align="center">My Experiences</h2>
    <table border="1px">
      <tr>
        <th>role</th>
        <th>time</th>
        <th>team</th>
        <th>location</th>
        <th>description</th>
        <th>operation</th>
      </tr>
      <?php
        $query = $mysqli->query("Select * from experiences"); // SQL Query
        while($row = $query->fetch_array())
        {
          Print "<tr>";
          Print '<td align="center">'. $row['role'] . "</td>";
          Print '<td align="center">'. $row['time'] . "</td>";
          Print '<td align="center">'. $row['team']. "</td>";
          Print '<td align="center">'. $row['location']. "</td>";
          Print '<td align="center">'. $row['description'] . "</td>";
          Print '<td align="center"><a href="delete.php?table='.'experiences'.'&id='.$row['id'] .'")">delete</a> </td>';
          Print "</tr>";
        }
      ?>
    </table>

    <div class="form-container">
      <form action="add.php" method="POST" role="form">
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Role" name="role">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Time" name="time">
        </div>    
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Team" name="team">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Location" name="location">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="image" name="image">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="url" name="url">
        </div>    
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="github" name="github">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="demo" name="demo">
        </div>

        <div class="col-md-12">
          <textarea class="form-control" rows="6" placeholder="description" name="description"></textarea>
        </div>
        <div class="col-md-6">
          <div class="input-group same-line">
            <span class="label label-default">public</span>
             <input type="checkbox" class="form-control" name="public" value="public" checked>
          </div>
        </div>
        <div class="col-md-6">
          <input class="btn btn-primary add-button" type="submit" value="ADD" class="form-control">
        </div>
      </form>
    </div>
  </div>
</body>

<footer class="text-center" id="foot">
  <div class="container">
    <div class="row">
    </div>
    <p>Built by Gangzheng | 2016 | <a href="../">home</a></p>
  </div>
</footer>
    


