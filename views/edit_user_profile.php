<?php /**@var $user array */

?>
<h1>Edit User Profile</h1>
<div class="container">
    <form action="" method="post">
        <div class="col-lg-3">
            <label>Full Name:</label><br>
            <?php echo '<input class="form-control" type="text" name="name" value = ' . $user["name"] . ' > <br><br>'; ?>
            <label>Email:</label><br>
            <input class="form-control" type="text" name="email" value=<?php echo $user['email'] ?> readonly id='email'><br><br>
            <label>Contact Number:</label><br>
            <input class="form-control" type="text" name="contact_no" value=<?php echo $user['contact_no'] ?>><br><br>
            <a href="/change_password" class="btn btn-outline-dark">Change Password</a><br><br>
            <button name="done" , class="btn btn-primary">Done</button>
            <a class="btn btn-secondary" href="/dashboard">Cancel</a>
        </div>
    </form>
</div>

