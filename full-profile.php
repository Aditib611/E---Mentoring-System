<?php
session_start();
include("includes/config.php");
$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "mentoring";
$prefix = "";
$bd = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password) or die("Could not connect database");
mysqli_select_db($bd, $mysqli_database) or die("Could not select database");

?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mentee  Information</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="sanjivani.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0">
<?php 
    $ret = mysqli_query($bd, "SELECT * FROM registration where emailid = '".$_GET['id']."'");
    while ($row = mysqli_fetch_array($ret)) 
			{
			?>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			
			<tr>
			  <td colspan="2"  class="font"><?php echo ucfirst($row['firstName']);?> <?php echo ucfirst($row['lastName']);?>'S <span class="font1"> information &raquo;</span> </td>
  </tr>
			<tr>
			  <td colspan="2"  class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <div align="right">Reg Date : <span class="comb-value"><?php echo $row['postingDate'];?></span></div></td>
  </tr>
			<tr>
			  <td colspan="2"  class="heading" style="color: red;">Acadamic Info &raquo; </td>
  </tr>
			<tr>
			  <td colspan="2"  class="font1"><table width="100%" border="0">

        <tr>
                  <td width="32%" valign="top" class="heading">SSC Marks : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['sscper'];?></span></td>
                    </tr>
                    <tr>
                  <td width="32%" valign="top" class="heading">SSC School : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['sscschool'];?></span></td>
                    </tr>
                    <tr>
                  <td width="32%" valign="top" class="heading">SSC Passing Year : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['sscyear'];?></span></td>
                    </tr>
                    <tr>
                  <td width="32%" valign="top" class="heading">HSC Marks : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['hscper'];?></span></td>
                    </tr>
                    <tr>
                  <td width="32%" valign="top" class="heading">HSC College : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['hsccollege'];?></span></td>
                    </tr>
                    <tr>
                  <td width="32%" valign="top" class="heading">HSC Passing Year : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['hscyear'];?></span></td>
                    </tr>
                    <tr>
                  <td width="32%" valign="top" class="heading">Year Gap : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['yeargap'];?></span></td>
                    </tr>







                <tr>
                  <td width="32%" valign="top" class="heading">current Year : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['year'];?></span></td>
                    </tr>
                  <tr>
                  <td width="22%" valign="top" class="heading">Semister : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['sem'];?></span></td>
                    </tr>
                  
                    <!-- <tr>
                     <!-- <td width="12%" valign="top" class="heading">Mentor : </td>
                      <td class="comb-value1"><?php echo $fpm=$row['mentor'];?></td> -->
                    </tr>  -->
                     <tr>
                    <td width="12%" valign="top" class="heading">Hostel Status: </td>
                      <td class="comb-value1"><?php if($row['hostelstatus']==0)
{
  echo "Hostelier";
}
else
{
  echo "Regular";
}
                      ;?></td>
                    </tr>
                    <tr>
                    <td width="12%" valign="top" class="heading">Birthday: </td>
                      <td class="comb-value1"><?php echo $row['bday'];?></td>
                    </tr>
                    <tr>
                    <td width="12%" valign="top" class="heading">CGPA: </td>
                      <td class="comb-value1"><?php echo $dr=$row['cgpa'];?></td>
                    </tr>
                    
  <tr>
   <td colspan="2" align="left"  class="heading" style="color: red;">Personal Info &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Course: </td>
<td class="comb-value1"><?php echo $row['course'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">PRN no: </td>
<td class="comb-value1"><?php echo $row['prnno'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">First Name: </td>
<td class="comb-value1"><?php echo $row['firstName'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Middle name: </td>
<td class="comb-value1"><?php echo $row['middleName'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Last: </td>
<td class="comb-value1"><?php echo $row['lastName'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Gender: </td>
<td class="comb-value1"><?php echo $row['gender'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Contact No: </td>
<td class="comb-value1"><?php echo $row['contactno'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Email id: </td>
<td class="comb-value1"><?php echo $row['emailid'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Emergency Contact: </td>
<td class="comb-value1"><?php echo $row['egycontactno'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Guardian Name: </td>
<td class="comb-value1"><?php echo $row['guardianName'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Guardian Relation: </td>
<td class="comb-value1"><?php echo $row['guardianRelation'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Guardian Contact: </td>
<td class="comb-value1"><?php echo $row['guardianContactno'];?></td>
</tr>
<tr>
        <td colspan="2"  class="heading" style="color: red;">Correspondence Address  &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Address: </td>
<td class="comb-value1"><?php echo $row['corresAddress'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">City: </td>
<td class="comb-value1"><?php echo $row['corresCIty'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">State: </td>
<td class="comb-value1"><?php echo $row['corresState'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Pincode: </td>
<td class="comb-value1"><?php echo $row['corresPincode'];?></td>
</tr>
<tr>
        <td colspan="2"  class="heading" style="color: red;">Permanent Address  &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Address: </td>
<td class="comb-value1"><?php echo $row['pmntAddress'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">City: </td>
<td class="comb-value1"><?php echo $row['pmntCity'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">State: </td>
<td class="comb-value1"><?php echo $row['pmnatetState'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Pincode: </td>
<td class="comb-value1"><?php echo $row['pmntPincode'];?></td>
</tr>
<tr>
<td width="12%" valign="top" class="heading">State: </td>
<td class="comb-value1"><?php echo $row['pmnatetState'];?></td>
</tr>
<?php } ?>
              
                  </table></td>
                </tr>
               
					
                  </table></td>
                </tr>
              </table></td>
  </tr>
		
           
 
	 
    </table></td>
  </tr>

  
  <tr>
    <td colspan="2" align="right" ><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="14%">&nbsp;</td>
          <td width="35%" class="comb-value"><label>
            <input name="Submit" type="submit" class="txtbox4" value="Prints this Document " onClick="return f3();" />
          </label></td>
          <td width="3%">&nbsp;</td>
          <td width="26%"><label>
            <input name="Submit2" type="submit" class="txtbox4" value="Close this document " onClick="return f2();"  />
          </label></td>
          <td width="8%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
