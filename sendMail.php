<?php
//declare and set variables with empty value
session_start();
$fname = $lname = $email = $mobile = $degree = $skills = $experience = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = trim($_POST["firstname"]);
    $lname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $degree = trim($_POST["degree"]);
    $skills = trim($_POST["skills"]);
    $experience = trim($_POST["experience"]);
}
//verify mobile Number
if (!preg_match("/^[0-9]{10}$/", $mobile)) {
    echo $mobile;
    $_SESSION['error'] = "Error : Enter Valid Mobile Number";
    header("location: index.php");
    exit();
}

//save data to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    $_SESSION['error'] = "Error : ".$e->getMessage();
    header("location: index.php");
    exit();
}

//add data to database
try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT into applications(fname,lname,email,mobile,degree,skills,experience) values(?,?,?,?,?,?,?)");
    $res = $stmt->execute([$fname,$lname,$email,$mobile,$degree,$skills,$experience]);

    if ($res == true) {
      $_SESSION['success'] = "Application submitted successfully.";
    }
    else {
      $_SESSION['Error'] = "Something went wrong!";
      header("location: index.php");
      exit();
    }
  } catch(PDOException $e) {
  $_SESSION['Error'] = $e->getMessage();
  header("location: index.php");
  exit();
}

//send mail
$subject = "Job application received";
$header = '';
$header .= 'Content-type:text/html;charset=UTF-8'."\r\n";
$header .= 'From: some name <xyz@example.com>'."\r\n";

$message = "<html>
<head>
<title>Job Application details received.</title>
</head>
<body>
<p>We have received following details from you.</p>
<table border='1' style='width=100%;'>
<tr>
<th>Firstname</th>
<th>".$fname."</th>
</tr>
<tr>
<th>Lastname</th>
<th>".$lname."</th>
</tr>
<tr>
<th>Email</th>
<th>".$email."</th>
</tr>
<tr>
<th>Mobile</th>
<th>".$mobile."</th>
</tr>
<tr>
<th>Degree</th>
<th>".$degree."</th>
</tr>
<tr>
<th>Skills</th>
<th>".$skills."</th>
</tr>
<tr>
<th>Experience</th>
<th>".$experience."</th>
</tr>
</table>
</body>
</html>
";

if(!mail($email,$subject,$message,$header)){
    $_SESSION['error'] = "Error: Mail sending failed.";
}


header("location: index.php");
exit();
?>
