<?php /** @var $list array  */?>
<h1>Manage resources</h1>

<h3>Available Resources</h3>
<br>
<a href="/admin" class="btn btn-secondary">Manage users</a>
<hr>
<a href="/createresource" class="btn btn-primary"><span class="material-icons">
add_circle
</span> Add a new resource</a>
<br>
<br>
<a href="/admin" class="btn btn-secondary">Back</a>
<br>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th class="table-header">#</th>
        <th class="table-header">TYPE</th>
        <th class="table-header">TITLE</th>
        <th class="table-header">DESCRIPTION</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $resourceList = $list;
    foreach ($resourceList as $i => $resource): ?>
        <tr>
            <td><?php echo $i + 1 ?></td>
            <td><?php echo $resource['type'] ?></td>
            <td><a href=<?php echo $resource['url']; ?>><?php echo $resource['title'] ?></a></td>
            <td><?php echo $resource['description'] ?></td>

            <td>
                <a href="/resources/edit?id=<?php echo $resource['id']; ?>" class="btn btn-warning"><span
                            class="material-icons">edit</span></a>
            </td>
            <td>
                <form action="/resources/delete" method="post">
                    <input type="hidden" name="id" value=<?php echo $resource['id']; ?>/>
                    <button type="submit" class="btn btn-danger">
                        <span class="material-icons">delete</span></button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


