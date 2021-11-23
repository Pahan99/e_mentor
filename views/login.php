<?php /**@var $error string */
$error = $error??null;
?>
<h1>Login</h1>
<br>
<?php if ($error):?>
<div class="alert alert-danger">
    <strong><?php echo $error?></strong>
</div>
<?php endif;?>
<form action="" method="post">
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email">
    <br>
    <br>
    <label for="password">Password</label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
