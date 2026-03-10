<?php include'db.php'?>

<!DOCTYPE html>
<html>
<head>
<title>Marks Form</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#6a11cb,#2575fc);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.form-box{
    background:white;
    padding:30px;
    width:350px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

label{
    font-weight:bold;
}

input{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:6px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    background:#2575fc;
    color:white;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#1a5ed8;
}

</style>

</head>

<body>

<div class="form-box">

<h2>Enter Student Marks</h2>

<form method="POST">

<label>Roll No</label>
<input type="text" name="roll" placeholder="Enter Roll Number">

<label>Subject</label>
<input type="text" name="subject" placeholder="Enter Subject">

<label>Marks</label>
<input type="number" name="marks" placeholder="Enter Marks">

<button type="submit" name="submit">Save Marks</button>

</form>

</div>

</body>
</html>
<?php

if (isset($_POST['submit'])){
    
      $roll=$_POST['roll'];
      $subject=$_POST['subject'];
      $marks=$_POST['marks'];

      $sql = "INSERT INTO st_mark (roll_no, subject, marks) VALUES('$roll', '$subject', '$marks')";

        if(mysqli_query($conn, $sql)) {echo "<script>alert('Successfull')</script>";}
 
        else{echo "<script>alert('Unsuccessfull')</script>";}
}

?>
