<h1>Register as Mentor</h1>
<br>
<div class="container">
    <form action="" method="post">
        <div class="general">
            <div class = "form_group">
                <label>Full Name :</label>
                <br>
                <input type = "text" name = "name" required/>
                <br>
            </div>
            <br>
            <div class = "form_group">
                <label>Email :</label>
                <br>
                <input type = "text" name = "email" required />
            </div>
            <br>
            <div class = "form_group">
                <label>Contact Number :</label>
                <br>
                <input type = "text" name = "contact_no" required />
            </div>
            <br>
            <div class = "form_group">
                <label>Password :</label>
                <br>
                <input type = "password" name = "password" required />
            </div>
            <br>
            <div class = "form_group">
                <label>Confirm Password :</label>
                <br>
                <input type = "password" name = "confirm_pwd" required />
            </div>
            <br>
        </div>
        <hr>
        <h5>Session details</h5>
        <h6>Following details will be displayed in your profile.</h6>
        <div class="session">
            <div class = "form_group">
                <label>Description :</label>
                <br>
                <textarea name="description" id="description" cols="60" rows="10">

                </textarea>
                <br>
            </div>
            <br>
            <div class = "form_group">
                <label>Charge per session in LKR:</label>
                <br>
                <input type = "number" name = "session_charge"  />
                <br>
            </div>
            <br>

            <div class = "form_group">
                <label>Duration of a session (in minutes) : </label>
                <br>
                <input type = "number" name = "duration"  />
                <br>
            </div>
            <br>
            <div class = "form_group">
                <label>Capacity of a session : </label>
                <br>
                <input type = "number" name = "capacity"  />
                <br>
            </div>
            <input type="hidden" name="role" value="3">
            <br>
            <div class="SubmitButton">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>

        </div>


    </form>