<?php /**@var $user array */
 ?>

<h1>Profile</h1>
<form action="" method="post">
    <div class="col-md-6">
        <div class="form_group">
            <label>Full Name :</label>
            <br>

            <input type="text" name="name" value=<?php echo $user["name"] ;?> />
            <br>
        </div>
        <br>

        <div class="form_group">
            <label>Email :</label>
            <br>
            <input type="text" name="email" value=<?php echo $user["email"];?> disabled/>
        </div>
        <br>
        <div class="form_group">
            <label>Contact Number :</label>
            <br>
            <input type="text" name="contact_no" value=<?php echo $user["contact_no"];?>/>
        </div>
        <br>

        <div class="SubmitButton">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>