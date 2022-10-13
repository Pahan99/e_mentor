<?php
/**@var $user array
 * @var $counsellor_data array
 */


?>
<h1>Member Profile</h1>

<form action="" method="post">
    <div class="general">
        <div class="form_group">
            <label>Full Name :</label>
            <br>
            <?php echo '<input type="text" name="name" disabled value=' . $user["name"] . ' />' ?>
            <br>
        </div>
        <br>
        <div class="form_group">
            <label>Email :</label>
            <br>
            <?php echo '<input type="text" name="name" disabled value=' . $user["email"] . ' />' ?>
        </div>
        <br>
        <div class="form_group">
            <label>Contact Number :</label>
            <br>
            <?php echo '<input type="text" name="name" disabled value=' . $user["contact_no"] . ' />' ?>
        </div>
        <br>


    </div>
    <?php
    if (!empty($counsellor_data)): ?>
    <hr>
    <h5>Session details</h5>

    <div class="session">
        <div class="form_group">
            <label>Description :</label>
            <br>
            <textarea name="description" id="description" cols="60" rows="10" disabled>
<?php echo $counsellor_data["description"]; ?>
                </textarea>
            <br>
        </div>
        <br>
        <div class="form_group">
            <label>Charge per session in LKR:</label>
            <br>
            <?php echo '<input type="text" name="name" disabled value=' . $counsellor_data["session_charge"] . ' />' ?>
            <br>
        </div>
        <br><div class="form_group">
            <label>Session Duration (min):</label>
            <br>
            <?php echo '<input type="text" name="name" disabled value=' . $counsellor_data["duration"] . ' />' ?>
            <br>
        </div>
        <br><div class="form_group">
            <label>Session capacity:</label>
            <br>
            <?php echo '<input type="text" name="name" disabled value=' . $counsellor_data["capacity"] . ' />' ?>
            <br>
        </div>
        <br>


        <?php endif; ?>
    </div>

</form>
<div class="container">
    <?php if ($_SESSION["user"]["role_id"] === "5"): ?>
        <form action="/remove_user" method="post">
            <input type="hidden" name="id" value=<?php echo $user['id']; ?>/>
            <button type="submit" class="btn btn-danger">
                <span style="margin-right: 10px" class="material-icons">person_remove</span>Remove User
            </button>
        </form>
    <?php endif; ?>
    <br>
    <br>
    <a href="/admin" class="btn btn-secondary">Back</a>
</div>

