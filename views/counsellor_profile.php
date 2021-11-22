<?php /**@var $user array */

//echo '<pre>';
//var_dump($user);
//echo '</pre>';
//exit();
?>
<h1>Edit profile</h1>
<form action="" method="post">
    <div>
<!--        <img src="istockphoto-1161336374-612x612.jpg" class="img-thumbnail" alt="doc1">-->
<!---->
<!--        Change pitcure-->
<!---->
<!--        <input type="file" class="btn btn-primary" id="myFile" name="filename">-->

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Full Name</span>
            <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value=<?php echo $_SESSION['user']["name"] ;?>>
            &nbsp;&nbsp;
            </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            <input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value=<?php echo $user["email"];?> >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Contact number</span>
            <input name="contact_no" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value=<?php echo $user["contact_no"];?>>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
            <input name="description" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value=<?php echo $user["description"];?>>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Charge per session in LKR</span>
            <input name="session_charge" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Sahan@gmail.com">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Duration of a session (in minutes)</span>
            <input name="duration" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Sahan@gmail.com">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Capacity of a session</span>
            <input name="capacity" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Sahan@gmail.com">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
