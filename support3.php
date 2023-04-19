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
  <title>Support</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="style.css"> 
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
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
          <button class="btn btn-success dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Report</button>
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
<div class="support3">
    <div class='dateFromTo'>
      <div class="dateFrom">
        <label style="margin-right:25px">Date:</label>    
        <label>From:</label>
         <input <input type="text" class="datepicker" id="defaultdate" size="20" style="padding:5px" required>
      </div>
      <div class="dateTo">
        <label class="ms-2">To:</label>
        <input <input type="text" class="datepicker" id="to_range" size="20"  style="padding:5px" required>
      </div>
       
    </div>
    
    <div class='supportBy'>
     <label style="margin-right:25px">Support By:</label>    
     <select id="support" placeholder="Select support staff" required>
         <option value="" style="display:none">Select support staff</option>
       <?php 
       
       $con = dbConnection();
       $selectUsers="select distinct name from registration where staff='staff'";
       $passSelectUsers=mysqli_query($con,$selectUsers);
       while($result=mysqli_fetch_assoc($passSelectUsers)){
       ?>
       <option value="<?php echo $result['name'] ?>"><?php echo $result['name'] ?></option>
       <?php
       
       }
      ?>
     </select>
    </div>    
    
    <div class='companyName'>
       <label style="margin-right:25px">Company Name:</label>    
       <input type="text" name="cname"  id="companyName" placeholder="Enter Company Name" readonly required>
       <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer"></i>
       <input type="button" style="padding:0px 10px;margin-left:13px" id="supportSearch" value="Search" onclick="GetReportBy('search')">
    </div>
</div>
<!--modal-->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content" style=" height:95vh;overflow:scroll;">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Lists of Companies</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
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
              <tr class="clstrCustomer" data-id="<?php echo $result['customer_id']?>" data-company="<?php echo $result['company_name']?>">       
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

 <div class="mx-4" data-aos="zoom-in-up" style=" width: 98%;height: 600px;overflow-x: scroll;">
<form action="" method="POST">
    <table class="display">
      <thead>
    <tr>
          <th>SN</th>
          <th>Company Name</th>
          <th>Contact Person</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
            <th>Call By</th>
            <th>Support Staff</th>
            <th>Date</th>
            <th>Forward To</th>
              <th>Priority</th>
            <th>Issue</th>
            <th>Feedback</th>
            <th>Remote/Onsite</th>
            <th>Status</th>
            <!--<th>Action</th>-->
           
        </tr>
    </thead>
       
      <tbody id="tbody_2">
        <?php 
       $con = dbConnection();
        $select="select * from support order by entryDate desc";
      $query=mysqli_query($con, $select);
      $i=1;
      while( $result = mysqli_fetch_assoc($query)){
        ?>
      
      <tr>
          <td><?php echo $i ?></td>
        <td><?php echo $result['company_name'] ?></td>
        <td><?php echo $result['client_name'] ?></td>
        <td><?php echo $result['phone'] ?></td>
        <td><?php echo $result['email'] ?></td>
        <td><?php echo $result['address'] ?></td>
        <td><?php echo $result['call_by'] ?></td>
        <td><?php echo $result['support_staff'] ?></td>
        <td><?php echo $result['date'] ?></td>
        <td><?php echo $result['forward'] ?></td>
        <td><?php echo $result['priority'] ?></td>
        <td><?php echo $result['issue'] ?></td>
        <td><?php echo $result['feedback'] ?></td>
        <td><?php echo $result['remote_onsite'] ?></td>
        <td><?php echo $result['status'] ?></td>
      </tr>

        <?php 
        $i++;
      }
      ?>
      </tbody>
    </table>
    </form>
 </div>


<script src="script.js"></script>
<script>
// $(document).on("click","#supportSearch", function(){
//   if($("#from_range").val()==""){
//       $("#from_range").prop('required',true);
//   } 
// });


  AOS.init();

 $( function() {
    $( ".datepicker" ).datepicker({
        showAnim: 'slideDown',
         dateFormat: 'yy-mm-dd'
        
    });

  } );
  $(document).on("click", ".clstrCustomer", function(){
 var _companyName=$(this).attr("data-company");
  $("#companyName").prop('disabled', false);
   $("#companyName").attr('required', true);
 $("#companyName").val(_companyName );
 $("#exampleModal").modal('hide');

});
function GetReportBy(ReportBy){
    var from = $("#defaultdate").val();
    var to = $("#to_range").val();
    var support= $("#support").val(); 
     var company= $("#companyName").val(); 
     if(to=="" && support=="" && company=="" ){
         return false;
     }else{
         $.ajax({
               url:"reportGen.php",
               method:"POST",
               data:{reportBy:ReportBy,from:from,to:to,support:support,company:company},
               success: function (data) {
                   $("#tbody_2").empty();
                   console.log(data);
                   var da = JSON.parse(data);
                   if(da.status_code == 200) {
                   $("#tbody_2").append(da.data);
                   }else if(da.status_code == 404) {
                     var html = '<tr><td class="text-center" colspan="17">'+da.message+'</td></tr>';
                     $("#tbody_2").append(html);
                   }
                   }
               }); 
     }
   
}
 $(document).ready(function(){
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
 });
</script>
</boody>
</html>
