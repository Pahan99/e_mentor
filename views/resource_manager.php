<h1>Manage resources</h1>

<h3>Available Resources</h3>
<br>
<!--<div class="alert alert-success alert-dismissible fade show" role="alert"-->
<!--     style="display:--><?php //echo $success=='' ? 'block' : 'none' ?><!--">-->
<!--    <strong>--><?php //echo $success ?? ''; ?><!--</strong>-->
<!--    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
<!--</div>-->
<br>
<a href="/createresource" class="btn btn-primary"><span class="material-icons">
add_circle
</span> Add a new resource</a>
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


