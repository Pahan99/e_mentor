<?php
/**@var $model */
?>
<h1>Register as User</h1>
<br>

<form action="" method="post">
    <div class="col-md-6">
        <div class="form-group">
            <label>Full Name :</label>
            <br/>
            <input type="text" name="name" required/>
        </div>
        <br>

        <div class="form-group">
            <label>Email :</label>
            <br>
            <input type="text" name="email" required />
        </div>
        <br>
        <div class="form-group">
            <label>Contact Number :</label>
            <br>
            <input type="tel" name="contact_no" required/>
        </div>
        <br>
        <div class="form-group">
            <label>Password :</label>
            <br>
            <input type="password" name="password" required />
        </div>
        <br>
        <div class="form-group">
            <label>Confirm Password :</label>
            <br>
            <input type="password" name="confirm_pwd" required />
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<hr>
