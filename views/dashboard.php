<?php
$user = $_SESSION['user']['name'] ?? 'Guest';
?>
<h1>Hello <?php echo $user ?></h1>
<a href="/profile?id=<?php echo $_SESSION['user']['id']; ?>" class="link">Edit profile</a>
<br>
<a href="/logout" class="btn btn-secondary">Logout</a>