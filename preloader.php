<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
    <link rel="stylesheet" href="preloaderStyle.css">
</head>
<body onload="myfunction()">
    <div class="center" id="preloader">
        <div class="ring"></div>
        <span>globaltech.....</span>
    </div>
//     <script>
let preloader=document.getElementById('preloader');
function myFunction(){
     setInterval(function(){
    preloader.style.display='none';
  }, 1000);
}

// </script>
</body>
</html>