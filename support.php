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
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
        <a class="nav-link text-dark" href="record1.php">Installation Information</a>
        <a class="nav-link text-dark" href="report.php">Report</a>
        <a class="nav-link text-light" href="record2.php">Support</a>
        <a class="nav-link text-dark" href="record4.php">Demo</a>
          <a class="nav-link text-dark" href="index.php" style="margin-left:762px"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    
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
                    <th>Client Name</th>
                    <th>Call By</th>
                    <th>Date</th>
                </tr>
               <?php 
            $con = dbConnection();
            $select="select * from support";
            $query=mysqli_query($con, $select);
            $i=1;
            while( $result = mysqli_fetch_assoc($query)){
             ?>
           
             <tr>
 
              <td>
              <?php echo $i?>
              </td>

               <td><a href="support1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['company_name'] ?> </a></td>
               <td><a href="support1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['client_name'] ?> </a></td>
               <td><a href="support1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['call_by'] ?> </a></td>
               <td><a href="support1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['date'] ?> </a></td>
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



<div class="supportmain">

  <form action=""  method="POST" class="needs-validation supportform" novalidate>

  <div class="row">
    <div class="col-4">
     <label class="form-label">Company Name</label>
     <div class="input-group mb-3">
       <input type="text" placeholder="Company Name" class="form-control" name="companyname" required>
       <i class="fa-solid fa-magnifying-glass input-group-text" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
     </div>
    </div>

          
    <div class="col-4 mb-2">
       <label class="form-label">Contact Person</label>
       <input type="text" placeholder="Client Name" class="form-control special" name="sname" required>
    </div>

    <div class="col-4 mb-2">
    <label class="form-label">Call By</label>
     <input type="text" placeholder="Call By" class="form-control special" name="scall" required>
    </div>


  </div>
   
  

<div class="row">
   <div class="col-4 mb-2">
    <label class="form-label">Support Staff</label>
    <input type="text" placeholder="Support Staff" class="form-control special" name="ssupport" required>
   </div>

   <div class="col-4 mb-2">
    <label class="form-label">Date</label>
    <input type="date" id="defaultdate" class="form-control" name="sdate" required>
   </div>

   <div class="col-4 mb-2" >
    <label class="form-label">Issue</label>
    <textarea id="" cols="45" rows="3"  placeholder="Issue" class="form-control" name="sissue" required></textarea>
   </div>



</div>


<div class="row">
<div class="col-4 mb-2" >
    <label class="form-label">Feedback</label>
    <textarea id="" cols="45" rows="3"  placeholder="Feedback" class="form-control" name="feedback" required></textarea>
   </div>

   <div class="col-4 mb-2">
    <label class="form-label">Remote/Onsite</label>
    <select name="sremote" class="form-control" required>
    <option value="Remote">Remote</option>
    <option value="Onsite">Onsite</option> 
    </select>
   </div>

   <div class="col-4 mb-2">
    <label class="form-label">Status</label>
    <select name="sstatus" class="form-control" required>
    <option value="Open" >Open</option>
    <option value="Close" >Close</option> 
    </select>
   </div>

</div>
  
  

   <div class="supportbutton">
    <button type="submit" name="Save">SUBMIT</button>
    <!-- <a href="record2.php" name="display"><i class="fa-regular fa-eye"></i>VIEW</a> -->
   </div>

  </form>

</div>

<script src="script.js"></script>

</body>
</html>





<?php 
$con = dbConnection();
if(isset($_POST['Save'])){
  $companyname=$_POST['companyname'];
  $sname=$_POST['sname'];
  $scall=$_POST['scall'];
  $ssupport=$_POST['ssupport'];
  $sdate=$_POST['sdate'];
  $sissue=$_POST['sissue'];
  $feedback=$_POST['feedback'];
  $sremote=$_POST['sremote'];
  $sstatus=$_POST['sstatus'];
  $insertquery="insert into support(company_name,client_name, call_by, support_staff, date, issue, feedback, remote_onsite, status ) values('$companyname','$sname','$scall','$ssupport','$sdate','$sissue','$feedback','$sremote','$sstatus')";
  $query=mysqli_query($con,$insertquery);
  if($query){
    echo"
    <script>
    alert('submitted successfully');
    window.location.href='support.php';
    </script>    
    ";
  }else{
    echo"
    <script>
    alert('Not submitted');
    window.location.href='support.php';
    </script>    
    ";
  }

}

if(isset($_POST['Edit'])){
  $sname=$_POST['sname'];
  $scall=$_POST['scall'];
  $ssupport=$_POST['ssupport'];
  $sdate=$_POST['sdate'];
  $sissue=$_POST['sissue'];
  $sremote=$_POST['sremote'];
  $sstatus=$_POST['sstatus'];
  $sopen=$_POST['sopen'];
  $sforward=$_POST['sforward'];
  $updatequery="update support set call_by='$scall',support_staff='$ssupport',date='$sdate',issue='$sissue',remote_onsite='$sremote',status='$sstatus',open_close='$sopen', forward_to='$sforward' where name='$sname' ";
  $query1=mysqli_query($con,$updatequery);
  if($query1){
      echo"<script>
      alert('data udated successfullly');
      window.location.href='support.php';
      </script>";
  }else{
      echo"$updatequery". mysqli_error($con);
  }

}

if(isset($_POST['Delete'])){
  $sname=$_POST['sname'];
  $deletequery="delete from support where name ='$sname' ";
  $query2=mysqli_query($con,$deletequery);
  if($query2){
      echo"<script>
      alert('data deleted successfullly');
      window.location.href='index.php';
      </script>";
  }else{
      echo"<script>
      alert('data not deleted');
      window.location.href='index.php';
      </script>";
  }
}

?>