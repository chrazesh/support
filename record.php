<?php
include 'dbcon.php';
session_start();


if(isset($_SESSION['username'])){
    // echo $_SESSION['username'];
}else{
 echo"<script>window.location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Support-master</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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
        <a class="nav-link text-light" aria-current="page" href="record.php">Master</a>
          <div class="dropdown bg-success">
            <button class="btn btn-success dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">Transaction</button>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="record3.php">Inquiry</a></li>
              <li><a class="dropdown-item" href="record1.php">Installation</a></li>
              <li><a class="dropdown-item" href="record2.php">Support</a></li>
              <li><a class="dropdown-item" href="record4.php">Demo</a></li>
              <li><a class="dropdown-item" href="record5.php">Registration</a></li>
            </ul>
          </div>
        <div class="dropdown bg-success">
          <button class="btn btn-success dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Report</button>
            <ul class="dropdown-menu dropdown-menu-dark ">
              <li><a class="dropdown-item" href="currentinstallation.php">Current Month Installation</a></li>
              <li><a class="dropdown-item" href="currentexpiry.php">Current Month Expiry</a></li>
              <li><a class="dropdown-item" href="expired.php">Expired</a></li>
                <li><a class="dropdown-item" href="regReport.php">Registration Report</a></li>
               <li><a class="dropdown-item" href="support3.php">Support</a></li>
            </ul>
        </div>
        <!-- <a class="nav-link text-light" href="report.php">Report</a> -->
         <a class="nav-link text-dark" href="client-issue.php">Client-Issue</a> 
        <a class="nav-link text-dark" href="payment.php">Payment</a>
        <a class="nav-link text-dark" href="logout.php" style="margin-left:762px"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    
      </div>
    </div>
  </div>
</nav>

      

<!-- Modal -->

<div class="modal fade" id="exampleModal1" aria-labelledby="exampleModalLabel1" tabindex="0">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="text-center rounded-3">Add Customer</h2>
 <div class="addmain">
 
   <form action="" method="POST" class="needs-validation addform" novalidate >


   
 <div class="row">
   <div class="col-4">
     <label  for="exampleFormControlInput1"  class="form-label">Comany Name:</label>
     <div class="input-group mb-3">
      <!-- <input type="hidden" id="dispId"> -->
        <input type="text" name="cname" class="form-control" id="companyName" placeholder="Enter Company Name" required>
        <!-- Button trigger modal -->
        <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer" ></i>
     </div>
  </div>
  <div class="col-4 mb-2">
        <label class="form-label">Contact Person:</label>
    <input type="text" name="cperson" class="form-control special" id="cperson"  placeholder="Enter Contact Person">
    </div>
   
   <div class="col-4 mb-2">
        <label class="form-label">Phone No:</label>
        <input type="text" name="phone" class="form-control special2" id="phone" placeholder="Enter Phone">
    </div>

</div>

<div class="row">

<div class="col-4 mb-2">
        <label class="form-label">Mobile No:</label>
        <input type="text" name="mobile" class="form-control special3" id="mobile" placeholder="Enter Mobile" required>
    </div>
   
   <div class="col-4 mb-2">
        <label  class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
    </div>

    <div class="col-4 mb-2">
        <label  class="form-label">Pan No:</label>
        <input type="text" name="pan" class="form-control special4" id="pan" placeholder="Enter Pan">
    </div>

</div>
<div class="row">
<div class="col-4 mb-2">
        <label  class="form-label">Address:</label>
        <input type="text" name="address" class="form-control special1"  id="address" placeholder="Enter Address">
    </div>

    <div class="col-4 mb-2">
        <label  class="form-label">City:</label>
        <input type="text" name="city" class="form-control special1" id="city"  placeholder="Enter City">
    </div>

   <div class="col-4 mb-2">
        <label class="form-label">Country:</label>
        <input type="text" name="country" class="form-control special" id="country" value="Nepal">
    </div>
   <input type="hidden" id="masterId" name="masterName" value="<?php echo $_SESSION['username']?>">
</div>

<div class="addbutton">
<button  type="submit" name="add"  id="dontRefresh"> SUBMIT</button>

</div>
 

</form>
</div>
      </div>
    
    </div>
  </div>
</div>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="1">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Lists of Companies</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" style="width:98%;height:600px;overflow:scroll">
              <table class="display">
                <thead>
                   <tr>
                       <th>SN</th>
                       <th>Company Name</th>
                       <th>Pan No.</th>
                       <th>Phone</th>
                       <th>Address</th>
                   </tr>
                </thead>
            <tbody>
            <?php  
            $con = dbConnection();
            $select="select * from customer order by entryDate desc";
            $query=mysqli_query($con, $select);
            $i=1;
            while( $result = mysqli_fetch_assoc($query)){
              ?>
              <tr class="clstrCustomer" data-id="<?php echo $result['customer_id']?>" data-company="<?php echo $result['company_name']?>" data-person="<?php echo $result['contact_person']?> " data-phone="<?php echo $result['phone_no']?>" data-mobile="<?php echo $result['mobile']?>" data-email="<?php echo $result['email']?>" data-pan="<?php echo $result['pan_no']?>" data-address="<?php echo $result['address']?>" data-city="<?php echo $result['city']?>" data-country="<?php echo $result['country']?>" >       
                    <td><?php echo $i?></td>
                    <td><?php echo $result['company_name']?></td>
                    <td><?php echo $result['pan_no'] ?></td>
                    <td><?php echo $result['phone_no'] ?></td>
                    <td><?php echo $result['address'] ?> </td>
             </tr>
             <?php
             $i++; 
            }
            ?>
            </tbody>
            </table>             
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
             </div>
          </div>
        </div>
      </div>






 <div class="mx-4 heading">
  <h2>Customer Information</h2>
  <button type="button" class="btn btn-primary mx-2 btnAdd">ADD</button>

</div>

  <div class="mx-4" data-aos="zoom-in-down" style="width:98%;height:590px;overflow:scroll"> 
<form action="" method="POST">
    <table class="display">
      <thead>
      <tr>
       <th>SN</th>
       <th>Company Name</th>
       <th>Contact Person</th>
       <th>Phone Number</th>
       <th>Mobile Number</th>
       <th>Email</th>
       <th>Pan Number</th>
       <th>Address</th>
       <th>City</th>
       <th>Country</th>
       <th>Action</th>
     </tr>
      </thead>
       
      <tbody>
        <?php 
       $con = dbConnection();
        $select="select * from customer order by entryDate DESC";
        $query=mysqli_query($con, $select);
        $i=1;
        while( $result = mysqli_fetch_assoc($query)){
          ?>
       <tr>
           <td><?php echo $i ?></td>
        <td><?php echo $result['company_name'] ?> </i></td>
        <td><?php echo $result['contact_person'] ?></td>
        <td><?php echo $result['phone_no'] ?></td>
        <td><?php echo $result['mobile'] ?></td>
        <td><?php echo $result['email'] ?></td>
        <td><?php echo $result['pan_no'] ?></td>
        <td><?php echo $result['address'] ?></td>
        <td><?php echo $result['city'] ?></td>
        <td><?php echo $result['country'] ?></td>
        <td><a href="update.php?id=<?php echo $result['customer_id'] ?>" type="submit"  class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a  href="#" class="bnone delCustomer"  data-cid="<?php echo $result['customer_id'] ?>"><i class="fa-solid fa-trash"></i></a>
        </td>
        
        <!--<a data-cId="<?php echo $result['customer_id'] ?>" type="submit"  class="bnone delCustomer" ><i class="fa-solid fa-trash"></i></a>-->
       </tr>

        <?php 
        $i++;
      }
      ?>
      </tbody>
    </table>
    </form>
 </div>


 <script>

  AOS.init();
  $(document).ready(function () {
      
     $(document).on('click','.delCustomer',function(){
         
           var customerId= $(this).attr("data-cid");
             if(confirm('Are you sure want to delete?')){
              $.ajax({
              url: '/delete.php',
              type: 'POST',
            //   dataType: 'json',
              data: {customerId: customerId},
               success: function (data) {
                  var da = JSON.parse(data);
                  if(da.status_code == 200) {
                  alert("Deleted");
                  location.reload();
                  }else if(da.status_code == 55) {
                  alert("Cannot delete parent row");
                    // location.reload();
                    
                  }
                  }
            });
             }
     });

 
  $(".display").DataTable({
    //     sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    
    // searching: false,
    dom: "Bfrtip",
  });
  
//   $(".dataTables_filter").children('label').focus();
  $('.dataTables_filter label input').focus();

 
});
$(document).on("click", ".clstrCustomer", function(){

 var _companyName=$(this).attr("data-company");
 var _country= $(this).attr("data-country");
 $("#companyName").val(_companyName );
 $("#cperson").val($(this).attr("data-person"));
 $("#phone").val($(this).attr("data-phone"));
 $("#mobile").val($(this).attr("data-mobile"));
 $("#email").val($(this).attr("data-email"));
 $("#pan").val($(this).attr("data-pan"));
 $("#address").val($(this).attr("data-address") );
 $("#city").val($(this).attr("data-city") );
 $("#country").val(_country);
 $("#exampleModal").modal('hide');

});




</script>
<script src="script.js"></script>
</body>
</html>



<?php 
    $con = dbConnection();
     if(isset($_POST['add'])){
    $cname=$_POST['cname'];
    $cperson=$_POST['cperson'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $pan=$_POST['pan'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $user=$_POST['masterName'];
    $selectquery="select * from customer where company_name='$cname'";
    $query=mysqli_query($con, $selectquery); 
    if(mysqli_num_rows($query)>0){
        
    echo"<script>alert('Company name already exists');window.location.href='record.php'</script>";
            // function tst(){
                // $(document).on('submit','#dontRefresh',function(e) {
                //   e.preventDefault();
                //      alert("Company name already exists");               
                //   return false;
                    
                // })
        // window.location.href="record.php"
            // }
            // tst();
    
        

    }else{
      $insertquery="INSERT INTO customer(company_name, contact_person, phone_no, mobile, email, pan_no, address, city, country,user,entryDate) VALUES('$cname','$cperson','$phone','$mobile','$email','$pan','$address','$city','$country','$user',now())";
      $query1=mysqli_query($con, $insertquery);
      if($query1){
        echo "<script>alert('Data inserted successfully ');
        window.location.href='record.php';</script>";
      }else{
        echo $insertquery;
      }
    }
}


?>


  

