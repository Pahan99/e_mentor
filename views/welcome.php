<?php
/**@var $resources array
 * @var $counsellors array
 */
?>

<h1>Welcome</h1>
<div class="d-flex justify-content-around">
    <a href="/login" class="btn btn-primary col-md-3 ml-md-autoo">Login</a>
    <br>
    <a href="/register_user" class="btn btn-outline-primary col-md-3 ml-md-auto">Register as a user</a>
    <br>
    <a href="/register_mentor" class="btn btn-outline-primary col-md-3 ml-md-auto">Register as a mentor</a>

</div>

<br>

<h2>
    Resources
</h2>
<br>
<div class="row" style="background-color: #c3faff; padding: 20px; border-radius: 10px">

    <?php
    foreach ($resources
             as $resource):
        ?>
        <div class="col-lg-4">

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://i.scdn.co/image/ab67616d0000b2730dfbc9b1b61097ebe0daf236"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $resource["title"]; ?></h5>
                    <p class="card-text"><?php echo $resource["description"]; ?></p>
                    <div class="row">
                        <div class="col">

                            <a href=<?php echo $resource["url"]; ?> class="btn btn-primary">Watch</a>
                        </div>
                        <div class="col">

                            <p><?php echo $resource["type_id"] == 1 ? '<i class="fab fa-youtube"></i>' : '<span class="material-icons">
language
</span>' ?></p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    <?php endforeach; ?>
    <br>

</div>
<h2>Counsellors</h2>
<div class="row", style="padding: 20px; background-color: #bed5ff ; border-radius: 10px">
    <?php foreach ($counsellors as $counsellor) : ?>
        <div class="col-lg-6">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counsellor['name']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted "><?php echo($counsellor['role_id'] == '2' ? 'Doctor' : ($counsellor['role_id'] == '3' ? 'Mentor' : 'Yoga Coach')) ?></h6>

                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>