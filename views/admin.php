<?php /**@var $members array */ ?>
<h1>Admin Page</h1>
<a href="/logout" class="btn btn-outline-dark">Logout</a>
<hr>
<a href="/resources" class="btn btn-secondary">Manage resources</a>
<a href="/add_user" class="btn btn-secondary">Add Doctor / Yoga Coach</a>
<hr>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>NAME</th>
        <th>ROLE</th>
        <th>STATUS</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($members as $i => $member): ?>
        <tr>
            <td><?php echo $i + 1 ?></td>
            <td><?php echo $member['name']; ?></td>
            <?php
            $role_id = $member['role_id'];
            $role = ($role_id == '1' ? 'User' : ($role_id == '2' ? 'Doctor' : ($role_id == '3' ? 'Mentor' : 'Yoga Coach')));
            ?>
            <td><?php echo $role; ?></td>
            <?php
            $status_id = $member['status'];
            $status = ($status_id == '1' ? 'Not verified' : ($status_id == '2' ? 'Verified' : 'Deleted'));
            //$indicator = ($status_id == '1'?'Not verified':($status_id=='2'?'Verified':'Deleted'));
            $verify = $status_id != '1' && $status != '3';
            $deleted = $status_id == '3';
            ?>

            <td><?php echo $status ?></td>
            <td>
                <a href="/view_user?id=<?php echo $member['id']; ?>" class="btn btn-primary"><span
                            class="material-icons">visibility</span> View</a>
            </td>

            <td>

                <?php if (!$verify): ?>
                    <form action="/verify_user" method="post">
                        <input type="hidden" name="id" value=<?php echo $member['id']; ?>/>
                        <button type="submit" class="btn btn-warning">
                            <span class="material-icons">done</span> Verify
                        </button>
                    </form>
                <?php else: ?>
                    <p class="success">
                        Verified
                    </p>
                <?php endif; ?>
            </td>
            <td>

                <form action="/remove_user" method="post">
                    <input type="hidden" name="id" value=<?php echo $member['id']; ?>/>
                    <button type="submit" class="btn btn-danger">
                        <span class="material-icons">delete</span> Remove
                    </button>
                </form>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




