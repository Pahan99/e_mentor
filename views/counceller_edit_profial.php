<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit</title>
</head>
<body>
<h1>Edit profile</h1>
<form action="POST">
    <div>
        <img src="istockphoto-1161336374-612x612.jpg" class="img-thumbnail" alt="doc1">

        Change pitcure

        <input type="file" class="btn btn-primary" id="myFile" name="filename">

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Sahan Chethika">
            &nbsp;&nbsp;
            <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Sahan Chethika">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Sahan@gmail.com">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-primary">Cancel</button>
        </div>

    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
