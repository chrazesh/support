<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Service Attached Table</title>
  </head>
  <body>

  <div id="accordion">

<div class="card">
  <div class="card-header">
    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
      Collapsible Group Item #1
    </a>
  </div>
  <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
    <div class="card-body">
      Lorem ipsum..
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
      Collapsible Group Item #2
    </a>
  </div>
  <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
    <div class="card-body">
      Lorem ipsum..
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
      Collapsible Group Item #3
    </a>
  </div>
  <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
    <div class="card-body">
      Lorem ipsum..
    </div>
  </div>
</div>

</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>