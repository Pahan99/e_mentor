<h1>Add Doctor / Yoga Coach</h1>
<br>

<form action="" method="post">
    <div class="form-group">
        <label>Select Role :</label>
        <br>
        <input type="radio" id="doctor" name="role" value="doctor" checked>
        <label for="doctor">Doctor</label>
        <input type="radio" id="yoga" name="role" value="yoga">
        <label for="yoga">Yoga Coach</label>

    </div>
    <br>
    <div class="col-md-6">
        <div class="form_group">
            <label>Full Name :</label>
            <br>
            <input type="text" name="name" value="" required/>
            <br>
        </div>
        <br>

        <div class="form_group">
            <label>Email :</label>
            <br>
            <input type="text" name="email" value="" required/>
        </div>
        <br>
        <div class="form_group">
            <label>Contact Number :</label>
            <br>
            <input type="tel" name="contact_no" value="" required/>
        </div>
        <br>
        <div class="form_group">
            <label>Password :</label>
            <br>
            <input type="password" name="password" value="" required/>
        </div>

        <br>
        <div class="SubmitButton">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<br>
<br>
<a href="/admin" class="btn btn-secondary">Back</a>
