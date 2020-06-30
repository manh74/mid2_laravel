<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Tour</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        @include('blocks.error')
        <p>Add new tour</p>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
        </div>
        <br>
        <div class="row">
        <div class="col">
            <input type="file" class="form-control" name="uploadFile" placeholder="Image">
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="typetour" placeholder="Type tour">
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="schedule" placeholder="Schedule">
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="depart" placeholder="Depart">
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="number" placeholder="Number">
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="price" placeholder="Price">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
</body>
</html>

