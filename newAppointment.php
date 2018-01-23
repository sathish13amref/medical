<?php
header("Cache-Control: private, must-revalidate, max-age=0");
  header("Pragma: no-cache");
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT * FROM doctorlist");

//Count total number of rows
$rowCount = $query->num_rows;

$query1= $db->query("SELECT * FROM services");

$rowCount1= $query1->num_rows;
?>


<html>


<style>
#p01 {
    color: blue;
}

select {

  display: block;
  padding: 10px 70px 10px 13px !important; 
  max-width: 100%; height: auto !important; 
  border: 1px solid #e3e3e3; border-radius: 3px; 
  background: url("https://image.ibb.co/iMeAJv/selectbox_arrow.png") right center no-repeat;
  background-color: #fff; color: #444444;
  font-size: 12px;
  line-height: 16px !important;
  appearance: none;
  /* this is must */ -webkit-appearance: none; 
  -moz-appearance: none; } 

Read more at: https://www.proy.info/style-select-dropdown-using-css/
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var doctorID = $(this).val();
		var Name= $(this).val();
        if(doctorID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'doctor_id='+doctorID,
			
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select doctor first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
         
        }
    });

});
</script>

<body>
<h1 id="p01">Appointment page</h1>

<form name="form1" action="store.php" method="Post">
<label>Services:</label>
<select id="ser"  >
    <option value="">Select Services</option>
    <?php
    if($rowCount1 > 0){
        while($row = $query1->fetch_assoc()){ 

            echo '<option value="'.$row['services'].'">'.$row['services'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select></br>	
<select id="country" name="Name"  >
    <option value="">Select Doctor</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 

            echo '<option value="'.$row['doctor_id'].'">'.$row['Name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>
</br>
<select id="state" name="date">
    <option value="">Select Dates availbale</option>
</select>
<input type="submit" value="submit" name="submit">
</form>
</body>
</html>