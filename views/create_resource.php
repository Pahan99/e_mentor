<h1>Manage resources</h1>
<h3>Add Resource</h3>
<br>
<form action="" method="post">
    <label for="type">Choose a resource type:</label>

    <select name="type_id" id="type_id">
        <option value="1">Youtube</option>
        <option value="2">Web page</option>
    </select>
    <br>
    <br>
    <div class="form-group">
        <label for="url">Enter URL</label>
        <br/>
        <input type="url" name="url" id="url"
               class="form-control<?php echo $model->hasError('url') ? ' is-invalid' : '' ?>"/>
        <div class="invalid-feedback">
            <?php echo $model->getFirstError('url') ?>
        </div>
    </div>
    <br/>
    <br/>
    <label for="title">Enter title</label>
    <br/>
    <input type="text" name="title" id="title"
           class="form-control<?php echo $model->hasError('url') ? ' is-invalid' : '' ?>"/>
    <br/>
    <br/>

    <label for="description">Enter description</label>
    <br/>
    <textarea
            name="description"
            id="description"
            cols="50"
            rows="5"
    ></textarea>
    <br/>
    <br/>
    <button type="submit" class="btn btn-primary">Add Resource</button>
</form>