
<?php
include 'dbcon.php';

$con = dbConnection();
if(isset($_POST['reportBy'])){
    global $con;
    $_repBy=$_POST['reportBy'];
    $_row='';
       switch($_repBy){
               case 'search':
            // $selectQuery="SELECT * from support where (date BETWEEN'".$_POST['from'].'" AND '".$_POST['to']."') AND (support_staff='".$_POST['support']."') AND (company_name='".$_POST['company']."')";
                 $selectQuery="SELECT * from support";
           if($_POST['from']!='' && $_POST['to']!='' && $_POST['support']!='' && $_POST['company']!=''){
                 $selectQuery="SELECT * from support where (date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') AND (support_staff='".$_POST['support']."') AND (company_name='".$_POST['company']."')";
            }else if($_POST['from']!='' && $_POST['to']!='' && $_POST['support']!='' && $_POST['company']==''){
                 $selectQuery=" SELECT * from support where (date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') AND (support_staff='".$_POST['support']."')"; 
           }else if($_POST['from']!='' && $_POST['to']!='' && $_POST['support']=='' && $_POST['company']!=''){
                 $selectQuery="SELECT * from support where (date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') AND (company_name='".$_POST['company']."')";
           }else if($_POST['from']!='' && $_POST['to']!='' && $_POST['support']=='' && $_POST['company']==''){
                 $selectQuery="SELECT * from support where (date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."')";
           }else if($_POST['from']!='' && $_POST['to']=='' && $_POST['support']!='' && $_POST['company']!=''){
                 $selectQuery="SELECT * from support where (support_staff='".$_POST['support']."') AND (company_name='".$_POST['company']."')";
           }else if($_POST['from']!='' && $_POST['to']=='' && $_POST['support']!='' && $_POST['company']==''){
                 $selectQuery="SELECT * from support where (support_staff='".$_POST['support']."')";
           }else if($_POST['from']!='' && $_POST['to']=='' && $_POST['support']=='' && $_POST['company']!=''){
                 $selectQuery="SELECT * from support where (company_name='".$_POST['company']."')";
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
                $_row=$_row.'<td>'.$result['status'].'</td></tr>';
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

