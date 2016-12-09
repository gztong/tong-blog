<!DOCTYPE html>
<html>
<head>
  <title>Site Admin - Gangzheng </title>
  <meta charset="utf-8">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/admin-style.css">
  <link rel="shortcut icon" href="../favicon.ico"/>
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container toolbar">
      <button type="button" class="btn btn-default navbar-btn"><a href="../">Home</a></button>      
    </div>
  </nav>  

  <div class="info">
    <h1>
      Login to My Admin
    </h1>
  </div>
  <div class="content">
    <form action="checklogin.php" method="POST">
      <div class="input-group input-group-lg row">
        <input type="text" class="form-control" name="username" required="required" placeholder="Username" />
      </div>
      <div class="input-group input-group-lg row">
        <input type="password" class="form-control" name="password" required="required" placeholder="Password" /> 
      </div>
      <div class="row">
        <input class="btn btn-primary btn-lg login-button" type="submit" value="submit">
      </div>
    </form>
  </div>
</body>

<footer class="text-center" id="foot">
  <div class="container">
  <div class="row"></div><div class="row"></div>
    <p>Built by Gangzheng | 2016 | <a href="../">home</a></p>
  </div>
</footer>

</html>