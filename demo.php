<?php 
include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  
  <link rel="stylesheet" href="style.css">
</head>   

<body>
  
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <a class="navbar-brand text-dark" href="curmonthinstallation.php">globalTech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark" aria-current="page" href="record.php">Master</a>
        <a class="nav-link text-dark" href="record3.php">Inquiry</a>
        <a class="nav-link text-dark" href="record1.php">Installation Information</a>
        <a class="nav-link text-dark" href="report.php">Report</a>
        <a class="nav-link text-dark" href="record2.php">Support</a>
        <a class="nav-link text-light" href="record4.php">Demo</a>
          <a class="nav-link text-dark" href="index.php" style="margin-left:762px">Logout</a>

    
      </div>
    </div>
  </div>
</nav>

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Lists of Companies</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
               <table class="table table-striped text-center">
                <tr>
                    <th>SN</th>
                    <th>Company Name</th>
                    <th>Pan No.</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
               <?php 
           $con = dbConnection();
            $select="select * from demo";
            $query=mysqli_query($con, $select);
            $i=1;
            while( $result = mysqli_fetch_assoc($query)){
             ?>
           
             <tr>
 
              <td>
              <?php echo $i?>
              </td>

               <td><a href="demo1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['company_name'] ?> </a></td>
               <td><a href="demo1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['pan_no'] ?> </a></td>
               <td><a href="demo1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['phone'] ?> </a></td>
               <td><a href="demo1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['address'] ?> </a></td>
             </tr>

             <?php
             $i++; 

            }
            //  echo"</ol>";
             ?>
               </table>
            
        
             
          
             </div>
             <div class="modal-footer">
               <!-- <button type="button" class="btn btn-primary">Ok</button> -->
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
             </div>
          </div>
        </div>
    </div>




<div class="demomain">
<form action="" method="POST" class="needs-validation demoform" novalidate>

<div class="row">
<div  class="col-4 mb-2">
        <label class="form-label">Date:</label>
        <input type="date" name="date" class="form-control" id="defaultdate" required>
    </div>
     <div class="col-4">
     <label class="form-label">Company Name:</label>
    <div  class="input-group mb-2">
        <input type="text" name="companyname" class="form-control" placeholder="Enter Company Name" required>
        <i class="fa-solid fa-magnifying-glass input-group-text" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
    </div>

     </div>
 
    <div  class="col-4 mb-2">
        <label class="form-label" >Client Name:</label>
        <input type="text" name="clientname" class="form-control special" placeholder="Enter Name" required>
    </div>


</div>
   
<div class="row">

<div  class="col-4 mb-2">
        <label class="form-label" >Address:</label>
        <input type="text" name="address" class="form-control special1" placeholder="Enter Address" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Phone:</label>
        <input type="number" name="phone" class="form-control" placeholder="Enter Phone" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Mobile:</label>
        <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile" required>
    </div>

</div>

<div class="row">
<div  class="col-4 mb-2">
        <label class="form-label" >Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Pan No:</label>
        <input type="number" name="pan" class="form-control" placeholder="Enter Pan" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Feedback</label>
    <textarea name="feedback" class="form-control" cols="30" rows="3"  placeholder="Enter Feedback" required></textarea>
    </div>

</div>

  <div class="row">
    <div  class="col-4 mb-2">
        <label class="form-label" >Remark:</label>
        <textarea name="remark" class="form-control" cols="30" rows="3"  placeholder="Enter remark" required></textarea>
    </div>


  </div>
    


   <div class="demobutton">
     <button  type="submit"  name="add">SUBMIT</button>
     <!-- <a href="record4.php"><i class="fa-regular fa-eye"></i>VIEW</a> -->
   </div>

</form>
</div>


<script src="script.js"></script>

<!-- <script>

$(function(){
 $("#btnAdd1").on("click",function(e){
 e.preventDefault();
//  $(".clsrequired").each(function(){
 
        //  $(this).attr("style","border-color:red");
       //$(this).attr("placeholder","required");
       


   $('#exampleFormControlInput1').append('<style>#exampleFormControlInput1::placeholder{color:red;}#exampleFormControlInput1{border-color:red;}</style>');

//  });
 });

  });
 </script> -->

</body>
</html>





<?php 
$con = dbConnection();

if(isset($_POST['add'])){
    $date=$_POST['date'];
    $companyname=$_POST['companyname'];
    $clientname=$_POST['clientname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $pan=$_POST['pan'];
    $feedback=$_POST['feedback'];
    $remark=$_POST['remark'];
    $insertquery="INSERT INTO demo(date,company_name,client_name,address, phone, mobile, email, pan_no,feedback,remarks) VALUES('$date','$companyname','$clientname','$address','$phone','$mobile','$email','$pan','$feedback','$remark')";
    $query=mysqli_query($con,$insertquery);
    if($query){
        ?>
        <script>
              
                alert("Data inserted successfully");
           window.location.href="demo.php";
         
        </script>
<?php
    }else{
      echo $insertquery;
    ?>
  <?php
    
    }
}

?>



