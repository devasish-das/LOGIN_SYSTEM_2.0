<?php include('includes/db.php'); ?>
<?php
    $showAlert=false;
    $showError=false;
  if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $existsql= "select * from `users1` where username='$username'";
        $result=mysqli_query($conn,$existsql);
        $numexits=mysqli_num_rows($result);
        if($numexits>0){
            $showError= "username already Exists";
        }else{
            
            if($password==$cpassword){
                $hash= password_hash($password, PASSWORD_DEFAULT);
                $sql=" INSERT INTO `users1` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result) $showAlert=true;
            
            }else{
                $showError="Passwords do not match!!";
            }
        }

        
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <?php require('includes/nav.php'); ?>
    <?php
    if($showAlert)
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You have successfully Signed up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        if($showError)
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
     ?>

    <
    <div class="container">
        <h2 class="text-center">Signup to our Website</h2>
        <form action="/login2/signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">UserName</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            
            <div id="emailHelp" class="form-text">Make sure to write the same password.</div>
            <div>

                <button type="submit" class="btn btn-primary">signup</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>