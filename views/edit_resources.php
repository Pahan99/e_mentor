<h3>Edit Resource</h3>
<?php

?>
<br>
<form action="" method="post" class="">
    <label for="type">Resource type:</label>

    <select name="type_id" id="type_id" >
        <option value="1" <?php echo $model->type_id == 1?'selected':''?>>Youtube</option>
        <option value="2" <?php echo $model->type_id == 2?'selected':''?>>Web page</option>
    </select>
    <br>
    <br>
    <div class="form-group">
        <label for="url">Enter URL</label>
        <br />
        <input type="url" name="url" id="url" class="form-control" value=<?php echo $model->url ?>/>

    </div>
    <br />
    <br />
    <label for="title">Enter title</label>
    <br />
    <input type="text" name="title" id="title" class="form-control" value=<?php echo $model->title ?>/>
    <br />
    <br />

    <label for="description">Enter description</label>
    <br />
    <textarea
        name="description"
        id="description"
        cols="50"
        rows="5"

    ><?php echo $model->description ?></textarea>
    <br />
    <br />
    <button type="submit" class="btn btn-primary">Update Resource</button>
</form>
