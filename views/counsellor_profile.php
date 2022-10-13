<?php /**@var $user array
 * @var $counsellor array
 */

?>
<h1>Edit profile</h1>
<form action="" method="post">
    <div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Full Name</span>
            <?php echo '<input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value=' . $user["name"] . '>' ?>
            &nbsp;&nbsp;
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            <input disabled name="email" type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" value=<?php echo $user["email"]; ?>>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Contact number</span>
            <input name="contact_no" type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" value=<?php echo $user["contact_no"]; ?>>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
            <textarea name="description" type="text" class="form-control" aria-label="Sizing example input"
                      aria-describedby="inputGroup-sizing-default"><?php echo $counsellor["description"]; ?> </textarea>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Charge per session in LKR</span>
            <input name="session_charge" type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" value=<?php echo $counsellor["session_charge"]; ?>>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Duration of a session (in minutes)</span>
            <input name="duration" type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" value=<?php echo $counsellor["duration"]; ?>>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Capacity of a session</span>
            <input name="capacity" type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" value=<?php echo $counsellor["capacity"]; ?>>
        </div>
        <a href="/change_password" class="btn btn-secondary">change password</a>
        <br>
        <br>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/dashboard" class="btn btn-primary">cancel</a>
        </div>

    </div>
</form>