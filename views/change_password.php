<?php echo $error ?? '' ?>
<h1>Change Password</h1>
<div class="container" >
    <form method="post" action="">
        <label>Current Password:</label>
        <input type="password" name="curr_pass" value = ""> <br><br>
        <label>New Password:</label>
        <input type="password" name="new_pass" value=""><br><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_pass" value=""><br>
        <button type="submit" class='done_btn'>Done</button>
    </form>
</div>
