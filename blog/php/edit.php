<?php 
  session_start();
  if($_SESSION['user']){

  }else{
    header("location: login.php");
  }

  if(!empty($_GET['id']))
  {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $id_exists = true;
    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("first_db") or die("Cannot connect to database"); //connect to database
    $query = mysql_query("Select * from experiences Where id='$id'"); // SQL Query
    $count = mysql_num_rows($query);
    if($count > 0)
    {
      $row = mysql_fetch_array($query);
    }
    else
    {
      $id_exists = false;
    }
  }

  if($id_exists)
  {
  Print '
  <form action="edit.php" method="POST">
    Enter new detail: <input type="text" name="details"/><br/>
    public post? <input type="checkbox" name="public[]" value="yes"/><br/>
    <input type="submit" value="Update List"/>
  </form>
  ';
  }
  else
  {
    Print '<h2 align="center">There is no data to be edited.</h2>';
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <form action="add.php" method="POST" role="form">
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Role" name="role" value="<?php Print $row['role']?>" >
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Time" name="time" value="<?php Print $row['time']?>" >
    </div>    
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Team" name="team" value="<?php $row['team']?>" >
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Location" name="location" value="<?php Print $row['location']?>" >
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="image" name="image" value="<?php Print $row['image']?>" >
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="url" name="url" value="<?php Print $row['url']?>" >
    </div>    
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="github" name="github" value="<?php Print $row['github']?>" >
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="demo" name="demo" value="<?php Print $row['demo']?>" >
    </div>
    <div class="col-md-6">
      public: <input type="checkbox" class="form-control" placeholder="public" name="public" value="<?php Print $row['public']?>" >
    </div>

    <div class="col-md-12">
      <div contenteditable="true">
        <?php Print $row['description']?>
      </div>
    </div>
    
    <div class="col-md-12">
      <input type="submit" value="ADD" class="form-control">
    </div>
  </form>
</body>
</html>