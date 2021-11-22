<?php /**@var $user array */

?>
<h1>Edit User Profile</h1>
<div class="container" >
    <form action="" method="post">
        <label>Full Name:</label><br>
        <input type="text" name="name" value = <?php echo $user["name"] ?>> <br><br>
        <label>Email:</label><br>
        <input type="text" name="email" value=<?php echo $user["email"] ?> readonly id='email'><br><br>
        <label>Contact Number:</label><br>
        <input type="text" name="contact_no" value=<?php echo $user["contact_no"] ?>><br><br>
        <button name="done", class="btn btn-primary">Done</button>
        <a class="btn btn-secondary" href="/dashboard">Cancel</a>
    </form>
    <button onclick="location.href = 'change_password.php'" class='changebtn'>Change Password</button>
</div>
