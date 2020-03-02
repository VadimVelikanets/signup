<?php
require './signup.php';
require './signout.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Main page</title>
</head>
<body>
    <div class="container">
        <?php if(empty($_COOKIE['username'])) : ?>
        <h2>Please, sign in or sign up</h2>
        <a href="">Sign in</a>
        <a href="">Sign up</a>
        
        <form class='regist' method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <h3>Regisration</h3>
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name='username' id="inputEmail3" value=''>
            </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" name='password' class="form-control" id="inputPassword3">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Repeat Password</label>
                <div class="col-sm-10">
                <input type="password" name='password2' class="form-control" id="inputPassword3">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
            </div>
        </form>
        <form class='auth' method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h3>Authorisation</h3>
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name='username' id="inputEmail3" value=''>
            </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" name='password' class="form-control" id="inputPassword3">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
        <?php  else: ?>
         <h4>Welcome,  <?= $_COOKIE['username']; ?></h4>   
         <a href="">Exit</a>
        <?php  endif?>
        <?php if(isset($message)) : ?>
         <h4><?= $message; ?></h4> 
        <?php endif; ?> 
    </div>
    
    
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
</html>