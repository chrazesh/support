<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
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
        <a class="nav-link text-light" href="record1.php">Installation Information</a>
        <a class="nav-link text-dark" href="report.php">Report</a>
        <a class="nav-link text-dark" href="record2.php">Support</a>
        <a class="nav-link text-dark" href="record4.php">Demo</a>
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
$select="select * from installation";
$query=mysqli_query($con, $select); 
$i=1;
while( $result = mysqli_fetch_assoc($query)){
    ?>
<tr>
<td><?php echo $i ?></td>
<?php
 

?> 
                <td><a href="installation1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['company_name'] ?> </a></td>
                <td><a href="installation1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['pan_no'] ?> </a></td>
                <td><a href="installation1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['phone'] ?> </a></td>
                <td><a href="installation1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['address'] ?> </a></td>
</tr>


 <?php
 $i++;
 }
 
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


<div class="installationmain">
<form action="" method="POST" class="needs-validation installationform" novalidate>


<?php
$con = dbConnection();
$id=$_GET['id'];
$select="select * from installation where id='$id'";
$query=mysqli_query($con,$select);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['add1'])){
  $companyname=$_POST['companyname'];
  $cemail=$_POST['cemail'];
    $cname1=$_POST['cname1'];
    $cpemail=$_POST['cpemail'];
    $pan=$_POST['pan'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $type=$_POST['type'];
    $users=$_POST['users'];
    $idate=$_POST['idate'];
    $exp=$_POST['exp'];
    $installed=$_POST['installed'];
    $reference=$_POST['reference'];
    $insertquery="INSERT INTO installation(company_name,company_email,client_name,person_email,pan_no,address,city,phone,mobile,type,no_of_users, installation_date, exp_date,installed_by, referenced_by) VALUES('$companyname','$cemail','$cname1','$cpemail','$pan','$address','$city','$phone','$mobile','$type','$users','$idate','$exp','$installed','$reference')";
    $query=mysqli_query($con,$insertquery);
    if($query){
      echo"<script>
      alert('data inserted successfullly');
      window.location.href='installation.php';
      </script>";
  

    }else{
    
      echo"<script>
      alert('data not inserted');
      window.location.href='installation.php';
      </script>";
    
    }
}
?>

<div class="row">

  <div class="col-4">

    <label class="form-label" >Company Name:</label>
    <div  class="input-group col-4 mb-2">
        <input type="text" name="companyname"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Company Name" value="<?php echo $result['company_name'] ?>" required>
        <i class="fa-solid fa-magnifying-glass input-group-text" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
    </div>

   </div>

   <div  class="col-4 mb-2">
        <label class="form-label" >Company Email:</label>
        <input type="email" name="cemail"  class="form-control" id="exampleFormControlInput1" value="<?php echo $result['company_email'] ?>" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label">Contact Person:</label>
        <input type="text" name="cname1"  class="form-control" id="exampleFormControlInput1" value="<?php echo $result['client_name'] ?>" required>
    </div>
  
</div>



    <div class="row">
    <div  class="col-4 mb-2">
        <label class="form-label" >Contact Person Email:</label>
        <input type="email" name="cpemail"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Client Name" value="<?php echo $result['person_email'] ?>" required>
    </div>

    <div  class="col-4 col-4 mb-2">
        <label class="form-label" >Pan No:</label>
        <input type="number" name="pan"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Pan" value="<?php echo $result['pan_no'] ?>" required>
    </div>
    <div  class="col-4 mb-2">
        <label class="form-label" >Address:</label>
        <input type="text" name="address"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Address" value="<?php echo $result['address'] ?>" required>
    </div>

    </div>


   
<div class="row">
<div  class="col-4 mb-2">
        <label class="form-label" >City:</label>
        <input type="text" name="city"  class="form-control" id="exampleFormControlInput1" placeholder="Enter City" value="<?php echo $result['city'] ?>" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Phone:</label>
        <input type="number" name="phone"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Phone" value="<?php echo $result['phone'] ?>" required>
    </div>
<div  class="col-4 mb-2">
        <label class="form-label" >Mobile:</label>
        <input type="number" name="mobile"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Mobile" value="<?php echo $result['mobile'] ?>" required>
    </div>
   
</div>
   
<div class="row">
<div class="col-4">
        <label class="form-label">Type:</label>
       <select name="type"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Type" required>
       <?php if($result['type']=="New"){?>
          <option <?php $result['type'] =="New" ?"Selected":""?> value="New">New</option>  
          <option value="Renew">Renew</option>
         <?php
        }else{?>
        <option <?php $result['type'] =="Renew" ?"Selected":""?> value="Renew">Renew</option>
        <option value="New">New</option>
        <?php
        }
        ?>
       </select>
    </div>

    <div  class="col-4 mb-2" >
        <label class="form-label" >No of Users:</label>
        <input type="number" name="users"  class="form-control" id="exampleFormControlInput1" placeholder="Enter No. of Users" value="<?php echo $result['no_of_users'] ?>" required>
    </div>
<div  class="col-4 mb-2">
        <label class="form-label">Installation Date:</label>
        <input type="date" name="idate"  class="form-control" id="defaultdate" placeholder="Enter Installation Date" value="<?php echo $result['installation_date'] ?>" required>
    </div>
   
  

</div>

   <div class="row">
   <div  class="col-4 mb-2" >
         <label class="form-label">Referenced By:</label>
        <input type="text" name="reference"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Referenced By" value="<?php echo $result['referenced_by'] ?>" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Expiry Date:</label>
        <input type="date" name="exp"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Expiry Date" value="<?php echo $result['exp_date'] ?>" required>
    </div>

    <div  class="col-4 mb-2" >
         <label class="form-label">Installed By:</label>
        <input type="text" name="installed"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Installed By" value="<?php echo $result['installed_by'] ?>" required>
    </div>
   </div>

    

   <div class="installationbutton">
   <button  type="submit" name="add1">SUBMIT</button>
   <!-- <a href="record1.php"><i class="fa-regular fa-eye"></i>VIEW</a> -->
   </div>

</form>
</div>
<script src="script.js"></script>
</body>
</html>



<!-- 

// if(isset($_POST['update1'])){
//   $cname1=$_POST['cname1'];
//     $idate=$_POST['idate'];
//     $users=$_POST['users'];
//     $type=$_POST['type'];
//     $exp=$_POST['exp'];
//     $reference=$_POST['reference'];
//   $updatequery="update installation set installation_date='$idate',no_of_users='$users',type='$type',exp_date='$exp',referenced_by='$reference' where client_name='$cname1' ";
//   $query1=mysqli_query($con,$updatequery);
//   if($query1){
//       echo"<script>
//       alert('data updated successfullly');
//       window.location.href='index.php';
//       </script>";
//   }else{
//       echo"<script>
//       alert('data not updated');
//       window.location.href='index.php';
//       </script>";
//   }

// }

// if(isset($_POST['delete1'])){
//   $cname1=$_POST['cname1'];
//   $deletequery="delete from installation where client_name='$cname1'";
//   $query2=mysqli_query($con,$deletequery);
//   if($query2){
//       echo"<script>
//       alert('data deleted successfullly');
//       window.location.href='index.php';
//       </script>";
//   }else{
//     echo"<script>
//     alert('data not deleted');
//     window.location.href='index.php';
//     </script>";
//   }
// } -->

