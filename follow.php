<?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT * FROM doctorlist");

//Count total number of rows
$rowCount = $query->num_rows;
?>



<html>


<style>
#p01 {
    color: blue;
	margin-left:40px;
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



<body>
<h1 id="p01">FOLLOW UP</h1>
<form action="followup.php" method="POST">

<label>Doctors:</label>
<select id="Name" name="Name"  >
    <option value="">Select Doctor</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 

            echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>
<input type="submit" value="submit">
</body>
</html>