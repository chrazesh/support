
<?php
include 'dbcon.php';
session_start();
$con = dbConnection();
if(isset($_POST['reportBy'])){
    // global $con;
    $_repBy=$_POST['reportBy'];
    $_row='';
       switch($_repBy){
                case 'filDate':
               $selectQuery="SELECT * from inquiry where date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' order by entryDate desc";
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['company_name'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td>'.$result['miti'].'</td>';
                $_row=$_row.'<td>'.$result['client_name'].'</td>';
                $_row=$_row.'<td>'.$result['address'].'</td>';
                $_row=$_row.'<td>'.$result['company_email'].'</td>';
                $_row=$_row.'<td>'.$result['person_email'].'</td>';
                $_row=$_row.'<td>'.$result['reference_by'].'</td>';
                $_row=$_row.'<td>'.$result['software_type'].'</td>';
                $_row=$_row.'<td>'.$result['organization_type'].'</td>';
                $_row=$_row.'<td>'.$result['phone'].'</td>';
                $_row=$_row.'<td>'.$result['pan_no'].'</td>';
                $_row=$_row.'<td>'.$result['follow_up'].'</td>';
                $_row=$_row.'<td>'.$result['next_follow'].'</td>';
                 $_row=$_row.'<td><a href="update3.php?id=' .$result['inquiry_id'].'" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" data-Iid="'.$result['inquiry_id'].'" class="bnone delCustomer"><i class="fa-solid fa-trash"></i></a></td></tr>';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                  break;

               case 'filDate1':
               $selectQuery="SELECT * from installation where installation_date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."'order by entryDate desc";
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['company_name'].'</td>';
                $_row=$_row.'<td>'.$result['company_email'].'</td>';
                $_row=$_row.'<td>'.$result['client_name'].'</td>';
                $_row=$_row.'<td>'.$result['person_email'].'</td>';
                $_row=$_row.'<td>'.$result['pan_no'].'</td>';
                $_row=$_row.'<td>'.$result['address'].'</td>';
                $_row=$_row.'<td>'.$result['city'].'</td>';
                $_row=$_row.'<td>'.$result['phone'].'</td>';
                $_row=$_row.'<td>'.$result['mobile'].'</td>';
                $_row=$_row.'<td>'.$result['no_of_users'].'</td>';
                $_row=$_row.'<td>'.$result['installation_date'].'</td>';
                $_row=$_row.'<td>'.$result['exp_date'].'</td>';
                $_row=$_row.'<td>'.$result['support_officer'].'</td>';
                  $_row=$_row.'<td>'.$result['feedback'].'</td>';
                 $_row=$_row.'<td><a href="update1.php?id='.$result["id"].'" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" data-insId="'.$result['id'].'" class="bnone delCustomer"><i class="fa-solid fa-trash" ></i></a></td></tr>';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                     break;

               case 'filDate2':
               $selectQuery=" select renew.*,installation.installation_date from renew left join installation on renew.installationId=installation.id where date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' order by entryDate desc";
                // $selectQuery="SELECT * from renew where date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."'";
              
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['company_name'].'</td>';
                $_row=$_row.'<td>'.$result['installation_date'].'</td>';
                $_row=$_row.'<td>'.$result['client_name'].'</td>';
                $_row=$_row.'<td>'.$result['phone'].'</td>';
                $_row=$_row.'<td>'.$result['email'].'</td>';
                $_row=$_row.'<td>'.$result['address'].'</td>';
                $_row=$_row.'<td>'.$result['call_by'].'</td>';
                $_row=$_row.'<td>'.$result['support_staff'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td>'.$result['forward'].'</td>';
                $_row=$_row.'<td>'.$result['priority'].'</td>';
                $_row=$_row.'<td>'.$result['timePeriod'].'</td>';
                $_row=$_row.'<td>'.$result['feedback'].'</td>';
                $_row=$_row.'<td>'.$result['remote_onsite'].'</td>';
                $_row=$_row.'<td>'.$result['status'].'</td>';
                 $_row=$_row.'<td><a href="update5.php?id='.$result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" class="bnone delCustomer" data-renewId="'.$result['id'].'"><i class="fa-solid fa-trash"></i></a></td></tr>"';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                   break;

               case 'filDate3':
                //   $selectCompany="select * from registration where'".$_SESSION['username']."'";
                //   $passSelectCompany=mysqli_query($con,$selectCompany);
                //   $resulttt=mysqli_fetch_assoc($passSelectCompany);
                //   $resulttt['name'];
               $selectQuery="SELECT * from issue where (user='".$_POST['name']."') AND (date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') order by entryDate desc";
            //   echo $selectQuery;
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['companyName'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td><a href='. $result['path'].$result['attachment'].'download><img src='. $result['path'].$result['attachment'] .' width="100" height="110"></a></td>';
                $_row=$_row.'<td>'.$result['issue'].'</td>';
                 $_row=$_row.'<td>'.$result['client_status'].'</td>';
                 $_row=$_row.'<td><a href="issueReport.php?id=' .$result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-eye text-dark"></a></td></tr>';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                  
                   break;

               case 'pending':
               $selectQuery="SELECT * from issue where (client_status='Open') AND (assigned='1') AND (assigned_officer='".$_POST['filPending']."') AND (date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') order by entryDate desc";
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['id'].'</td>';
                $_row=$_row.'<td>'.$result['companyName'].'</td>';
                 $_row=$_row.'<td>'.$result['assigned_officer'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td><a href='.$row['path'] . $row['attachment'].' download><img src='. $result['path'] . $result['attachment'].' width="100" height="110" ></td>';
                $_row=$_row.'<td>'.$result['issue'].'</td>';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                  
                     break;

               case 'open':
                   if($_POST['username']=='oms'){
               $selectQuery="SELECT * from support where status='Open' order by entryDate desc";
                       
                       
                   }else{
                         $selectQuery="SELECT * from support where status='Open' and support_staff='".$_POST['username']."'order by entryDate desc";
                   }
                   
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['company_name'].'</td>';
                $_row=$_row.'<td>'.$result['client_name'].'</td>';
                $_row=$_row.'<td>'.$result['phone'].'</td>';
                $_row=$_row.'<td>'.$result['email'].'</td>';
                $_row=$_row.'<td>'.$result['address'].'</td>';
                $_row=$_row.'<td>'.$result['call_by'].'</td>';
                $_row=$_row.'<td>'.$result['support_staff'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td>'.$result['forward'].'</td>';
                $_row=$_row.'<td>'.$result['priority'].'</td>';
                $_row=$_row.'<td>'.$result['issue'].'</td>';
                $_row=$_row.'<td>'.$result['feedback'].'</td>';
                $_row=$_row.'<td>'.$result['remote_onsite'].'</td>';
                $_row=$_row.'<td>'.$result['status'].'</td>';
                $_row=$_row.'<td><a href="update2.php?id=' .$result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" class="bnone delCustomer" data-supportId="'.$result['id'].'" ><i class="fa-solid fa-trash" ></i></a><a href="transfer.php?id='.$result['id'].'"  class="bnone"><i class="fa-solid fa-arrow-right-arrow-left"></i></a><a href="adminViewActivity.php?id='. $result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-eye"></i></a></td></tr>';
                 $i++;
                
               
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                      break;

               case 'close':
                   
                   if($_POST['username']=='oms'){
               $selectQuery="SELECT * from support where status='Close'";
                       
                       
                   }else{
                         $selectQuery="SELECT * from support where status='Close' and support_staff='".$_POST['username']."'";
                   }
                   
            //   $selectQuery="SELECT * from support where status='Close'";
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['company_name'].'</td>';
                $_row=$_row.'<td>'.$result['client_name'].'</td>';
                $_row=$_row.'<td>'.$result['phone'].'</td>';
                $_row=$_row.'<td>'.$result['email'].'</td>';
                $_row=$_row.'<td>'.$result['address'].'</td>';
                $_row=$_row.'<td>'.$result['call_by'].'</td>';
                $_row=$_row.'<td>'.$result['support_staff'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td>'.$result['forward'].'</td>';
                $_row=$_row.'<td>'.$result['priority'].'</td>';
                $_row=$_row.'<td>'.$result['issue'].'</td>';
                $_row=$_row.'<td>'.$result['feedback'].'</td>';
                $_row=$_row.'<td>'.$result['remote_onsite'].'</td>';
                $_row=$_row.'<td>'.$result['status'].'</td>';
                 $_row=$_row.'<td><a href="update2.php?id=' .$result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a href="#"  class="bnone delCustomer" data-supportId="'.$result['id'].'" ><i class="fa-solid fa-trash" ></i></a><a href="transfer.php?id='.$result['id'].'"  class="bnone"><i class="fa-solid fa-arrow-right-arrow-left"></i></a><a href="adminViewActivity.php?id='. $result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-eye"></i></a></td></tr>';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                   
            //       break;

            //   case 'open1':
            //   $selectQuery="SELECT * from issue where client_status='Open'";
            //   $queryPass=mysqli_query($con,$selectQuery);
            //   $i=1;
            //   while( $result = mysqli_fetch_assoc($queryPass)){
            //     $_row=$_row.'<tr><td>'.$i.'</td>';
            //     $_row=$_row.'<td>'.$result['id'].'</td>';
            //     $_row=$_row.'<td>'.$result['companyName'].'</td>';
            //     $_row=$_row.'<td>'.$result['assigned_officer'].'</td>';
            //     $_row=$_row.'<td>'.$result['date'].'</td>';
            //     $_row=$_row.'<td><a href="'. $result['path'] . $result['attachment'].'" download> <img src="'.$result['path'] . $result['attachment'].'" width="100" height="110"></a></td>';
            //     $_row=$_row.'<td>'.$result['issue'].'</td>';
            //     $_row=$_row.'<td>'.$result['client_status'].'</td></tr>';
       
            //      $i++;
            //   }
            //   if($_row==""){ 
            //       $response=array('message'=>'no record found', 'status_code'=>'404');
            //       echo json_encode($response);
            //   }else {
            //           $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
            //      echo json_encode($response);
            //       }

            //           break;

            //   case 'close1':
            //   $selectQuery="SELECT * from issue where client_status='Close'";
            //   $queryPass=mysqli_query($con,$selectQuery);
            //   $i=1;
            //   while( $result = mysqli_fetch_assoc($queryPass)){
            //     $_row=$_row.'<tr><td>'.$i.'</td>';
            //     $_row=$_row.'<td>'.$result['id'].'</td>';
            //     $_row=$_row.'<td>'.$result['companyName'].'</td>';
            //     $_row=$_row.'<td>'.$result['assigned_officer'].'</td>';
            //     $_row=$_row.'<td>'.$result['date'].'</td>';
            //       $_row=$_row.'<td><a href="'. $result['path'] . $result['attachment'].'" download> <img src="'.$result['path'] . $result['attachment'].'" width="100" height="110"></a></td>';
            //     $_row=$_row.'<td>'.$result['issue'].'</td>';
            //     $_row=$_row.'<td>'.$result['client_status'].'</td></tr>';
            //      $i++;
            //   }
            //   if($_row==""){ 
            //       $response=array('message'=>'no record found', 'status_code'=>'404');
            //       echo json_encode($response);
            //   }else {
            //           $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
            //      echo json_encode($response);
            //       }
                 break;

               case 'client-issue':
               if($_POST['username']=='oms'){
                    $select="select * from issue where client_status='Open' and assigned='0' and date BETWEEN '".$_POST['from']."' and '".$_POST['to']."' order by date desc"; 
               }else{
               $select="SELECT * from issue where client_status='Open' and assigned='2' and assigned_officer='".$_POST['username']."' and date BETWEEN '".$_POST['from']."' and '".$_POST['to']."' order by entryDate desc";
                   
               }
           
               $queryPass=mysqli_query($con,$select);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['companyName'].'</td>';
                 $_row=$_row.'<td>'.$result['assigned_officer'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td><a href='. $result['path'] . $result['attachment'].' download><img src='. $result['path'] . $result['attachment'].' width="100" height="110"></a></td>';
                $_row=$_row.'<td>'.$result['issue'].'</td>';
                 $_row=$_row.'<td>'.$result['client_status'].'</td>';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                  
                    break;

               case 'filDate4':
                   if($_POST['username']=='oms'){
               $selectQuery="SELECT * from support where date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' order by entryDate desc";
                       
                   }else{
                          $selectQuery="SELECT * from support where support_staff='".$_POST['username']."' and date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' order by entryDate desc";
                       
                   }
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['company_name'].'</td>';
                $_row=$_row.'<td>'.$result['client_name'].'</td>';
                $_row=$_row.'<td>'.$result['phone'].'</td>';
                $_row=$_row.'<td>'.$result['email'].'</td>';
                $_row=$_row.'<td>'.$result['address'].'</td>';
                $_row=$_row.'<td>'.$result['call_by'].'</td>';
                $_row=$_row.'<td>'.$result['support_staff'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td>'.$result['forward'].'</td>';
                $_row=$_row.'<td>'.$result['priority'].'</td>';
                $_row=$_row.'<td>'.$result['issue'].'</td>';
                $_row=$_row.'<td>'.$result['feedback'].'</td>';
                $_row=$_row.'<td>'.$result['remote_onsite'].'</td>';
                $_row=$_row.'<td>'.$result['status'].'</td>';
                 $_row=$_row.'<td><a href="update2.php?id='.$result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" class="bnone delCustomer" data-supportId="'.$result['id'].'"><i class="fa-solid fa-trash"></i></a><a href="transfer.php?id='.$result['id'].'"  class="bnone"><i class="fa-solid fa-arrow-right-arrow-left"></i></a><a href="adminViewActivity.php?id='. $result['id'].'" type="submit" class="bnone"><i class="fa-solid fa-eye"></i></a></td></tr>"';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                  
                   break;

               case 'adminPending':
               $selectQuery="SELECT * from issue where (client_status='Open') AND (assigned='1') AND (date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') order by entryDate desc";
               $queryPass=mysqli_query($con,$selectQuery);
               $i=1;
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td>'.$i.'</td>';
                $_row=$_row.'<td>'.$result['id'].'</td>';
                $_row=$_row.'<td>'.$result['companyName'].'</td>';
                 $_row=$_row.'<td>'.$result['assigned_officer'].'</td>';
                $_row=$_row.'<td>'.$result['date'].'</td>';
                $_row=$_row.'<td><a href='.$row['path'] . $row['attachment'].' download><img src='. $result['path'] . $result['attachment'].' width="100" height="110" ></a></td>';
                $_row=$_row.'<td>'.$result['issue'].'</td>';
                  $_row=$_row.'<td>'.$result['client_status'].'</td>';
                 $i++;
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
            }
      
    }

    
?>
  

