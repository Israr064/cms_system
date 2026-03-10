<?php include"db.php"
?>

<!DOCTYPE html>
<html>
<head>
<title>View Marks</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#43cea2,#185a9d);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.form-box{
    background:white;
    padding:35px;
    width:320px;
    border-radius:12px;
    box-shadow:0 12px 25px rgba(0,0,0,0.25);
}

h2{
    text-align:center;
    margin-bottom:25px;
}

label{
    font-weight:bold;
}

input[type="text"]{
    width:100%;
    padding:10px;
    margin-top:6px;
    margin-bottom:18px;
    border:1px solid #ccc;
    border-radius:6px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    background:#43cea2;
    color:white;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#2fbf92;
}

</style>

</head>

<body>

<div class="form-box">

<h2>Check Student Marks</h2>

<form method="POST">

<label>Roll No</label>
<input type="text" name="roll" placeholder="Enter Roll Number">

<button type="submit" name="view">View Marks</button>

</form>

</div>

</body>
</html>

<?php
if (isset($_POST['view'])) {
    $roll = $_POST['roll'];

    $sql = "SELECT * FROM st_mark WHERE roll_no = '$roll'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2 style='text-align:center;'>Your Marks</h2>";
        echo "<table style='margin: 0 auto; border-collapse: collapse; width: 50%;'>";
        echo "<tr style='background-color:#43cea2; color:white;'>
                <th style='padding:10px; border:1px solid #ccc;'>Subject</th>
                <th style='padding:10px; border:1px solid #ccc;'>Marks</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td style='padding:10px; border:1px solid #ccc; text-align:center;'>{$row['subject']}</td>
                    <td style='padding:10px; border:1px solid #ccc; text-align:center;'>{$row['marks']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align:center; color:red;'>No records found for Roll No: $roll</p>";
    }
}
?>