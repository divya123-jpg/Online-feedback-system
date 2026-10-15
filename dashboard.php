<?php
session_start();

/* LOGIN CHECK */
if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

/* DATABASE CONNECTION */
$conn = new mysqli("localhost","root","","feedback_system");

if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}

/* LOGIN TEACHER NAME */
$teacher = $_SESSION['teacher'];

/* FILTERS */
$semester = $_GET['semester'] ?? '';
$subject = $_GET['subject'] ?? '';

/* ONLY LOGIN TEACHER FEEDBACK */
$sql = "SELECT * FROM feedback 
        WHERE TRIM(LOWER(teacher_name)) = TRIM(LOWER('$teacher'))";

if($semester != ''){
    $sql .= " AND semester='$semester'";
}

if($subject != ''){
    $sql .= " AND subject='$subject'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Teacher Dashboard</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#fde7f3;
    padding:20px;
}

/* WELCOME */
.welcome-box{
    background:white;
    padding:18px;
    border-radius:12px;
    text-align:center;
    margin-bottom:20px;
    box-shadow:0 5px 15px rgba(0,0,0,0.15);
}

.welcome-box h2{
    color:#8e24aa;
}

/* TOP BAR */
.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:10px;
    margin-bottom:20px;
}

.filters{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

select{
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
    min-width:180px;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:6px;
    background:#8e24aa;
    color:white;
    cursor:pointer;
    font-weight:bold;
    transition:0.3s;
}

button:hover{
    background:#6a1b9a;
    transform:scale(1.03);
}

.logout-btn{
    background:#e53935;
}

.logout-btn:hover{
    background:#c62828;
}

/* TABLE BOX */
.table-box{
    background:white;
    padding:15px;
    border-radius:12px;
    overflow-x:auto;
    box-shadow:0 5px 20px rgba(0,0,0,0.2);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    table-layout:fixed;
}

/* CELLS */
th, td{
    border:1px solid #999;
    padding:8px;
    text-align:center;
    font-size:12px;
    word-wrap:break-word;
}

/* HEADER */
th{
    background:#e1bee7;
    color:#4a148c;
    font-size:11px;
    line-height:1.4;
}

/* ROWS */
tr:nth-child(even){
    background:#faf5fc;
}

/* TOTAL ROW */
.total-row{
    background:#f3d7ff;
    font-weight:bold;
}

/* STUDENT COLUMN */
th:first-child,
td:first-child{
    width:120px;
    font-weight:bold;
}

/* TOTAL COLUMN */
th:last-child,
td:last-child{
    width:110px;
    font-weight:bold;
}

/* QUESTION COLUMN */
th:not(:first-child):not(:last-child),
td:not(:first-child):not(:last-child){
    width:120px;
}

/* NO DATA */
.no-data{
    text-align:center;
    color:red;
    margin-top:20px;
    font-size:18px;
}

/* MOBILE */
@media(max-width:1200px){

    th, td{
        font-size:10px;
        padding:6px;
    }

    th{
        font-size:10px;
    }

}

</style>

</head>

<body>

<!-- WELCOME -->
<div class="welcome-box">

    <h2>
        Welcome,
        <?php echo $teacher; ?>
    </h2>

</div>

<!-- TOP BAR -->
<div class="top-bar">

    <!-- FILTER -->
    <form method="GET" class="filters">

        <!-- SEMESTER -->
        <select name="semester" required>

            <option value="">Select Semester</option>

            <option value="1st" <?php if($semester=="1st") echo "selected"; ?>>1st</option>

            <option value="2nd" <?php if($semester=="2nd") echo "selected"; ?>>2nd</option>

            <option value="3rd" <?php if($semester=="3rd") echo "selected"; ?>>3rd</option>

            <option value="4th" <?php if($semester=="4th") echo "selected"; ?>>4th</option>

            <option value="5th" <?php if($semester=="5th") echo "selected"; ?>>5th</option>

            <option value="6th" <?php if($semester=="6th") echo "selected"; ?>>6th</option>

        </select>

        <!-- SUBJECT -->
        <select name="subject" required>

            <option value="">Select Subject</option>

            <option value="Computer Networking"
            <?php if($subject=="Computer Networking") echo "selected"; ?>>
            Computer Networking
            </option>

            <option value="Web Technology"
            <?php if($subject=="Web Technology") echo "selected"; ?>>
            Web Technology
            </option>

            <option value="DBMS"
            <?php if($subject=="DBMS") echo "selected"; ?>>
            DBMS
            </option>

            <option value="Software Engineering"
            <?php if($subject=="Software Engineering") echo "selected"; ?>>
            Software Engineering
            </option>

            <option value="Operating system"
            <?php if($subject=="Operating system") echo "selected"; ?>>
            Operating system
            </option>

            <option value="Maths"
            <?php if($subject=="Maths") echo "selected"; ?>>
            Maths
            </option>

            <option value="Physics"
            <?php if($subject=="Physics") echo "selected"; ?>>
            Physics
            </option>

            <option value="Physics-II"
            <?php if($subject=="Physics-II") echo "selected"; ?>>
            Physics-II
            </option><option value="Chemistry"
            <?php if($subject=="Chemistry") echo "selected"; ?>>
            Chemistery
            </option>
            <option value="Maths-II"
            <?php if($subject=="Maths-II") echo "selected"; ?>>
            Maths-II
            </option>
            <option value="Mechanics"
            <?php if($subject=="Mechanics") echo "selected"; ?>>
            Mechanics
            </option>
            <option value="FEEE"
            <?php if($subject=="FEEE") echo "selected"; ?>>
             FEEE
            </option>
            <option value="Communication skills"
            <?php if($subject=="Communication skills") echo "selected"; ?>>
            Communication skills
            </option>
            <option value="IT system"
            <?php if($subject=="IT system") echo "selected"; ?>>
             IT system
            </option>
            <option value="Mobile computing"
            <?php if($subject=="Mobile computing") echo "selected"; ?>>
            Mobile computing
            </option>
            <option value="Disaster management"
            <?php if($subject=="Disaster management") echo "selected"; ?>>
            Disaster management
            </option>
            <option value="Artificial intelligence"
            <?php if($subject=="Artificial intelligence") echo "selected"; ?>>
            Artificial intelligence
            </option>
             <option value="Introduction of e-governance"
            <?php if($subject=="Introduction e-governance") echo "selected"; ?>>
            Introduction of e-governance
            </option>
             <option value="Multimedia technologies"
            <?php if($subject="Multimedia technologies") echo "selected"; ?>>
            Multimedia technologies
            </option>
            
           <option value="Renewable energy technologies"
            <?php if($subject=="Renewable energy technologies") echo "selected"; ?>>
            Renewable energy technologies
            </option>
            
          <option value="Information security"
            <?php if($subject=="Information security") echo "selected"; ?>>
            Information security
            </option>
            
         <option value="Internet of things"
            <?php if($subject=="Internet of things") echo "selected"; ?>>
            Internet of things
            </option>
         <option value="Advance computer networks"
            <?php if($subject=="Advance computer networks") echo "selected"; ?>>
            Advance computer networks
            </option>
            <option value="Data sciences"
            <?php if($subject=="Data sciences") echo "selected"; ?>>
            Data sciences
            </option>
            <option value="Operation research"
            <?php if($subject=="Operation research") echo "selected"; ?>>
            Operation research
            </option>
             <option value="Network forensics"
            <?php if($subject=="Network forensics") echo "selected"; ?>>
            Network forensics
            </option>
             <option value="Software testing"
            <?php if($subject=="Software testing") echo "selected"; ?>>
            Software testing
            </option>
             <option value="Free and open source software"
            <?php if($subject=="Free and open source software") echo "selected"; ?>>
            Free and open source software
            </option>
             <option value="Engineering economics and accountancy"
            <?php if($subject=="Engineering economics and accountancy") echo "selected"; ?>>
            Engineering economics and accountancy
            </option>
            <option value="Project management"
            <?php if($subject=="Project management") echo "selected"; ?>>
            Project management
            </option>

        </select>

        <button type="submit">
            Filter
        </button>

    </form>

    <!-- LOGOUT -->
    <button class="logout-btn"
            onclick="logout()">

        Logout

    </button>

</div>

<!-- TABLE -->
<div class="table-box">

<?php
if($semester != '' && $subject != ''){
?>

<table>

<tr>

    <th>Student Name</th>

    <th>Covered Entire Syllabus</th>

    <th>Relevant Topics Beyond Syllabus</th>

    <th>Technical Content Effectiveness</th>

    <th>Communication Skills</th>

    <th>Use of Teaching Aids</th>

    <th>Pace of Content Coverage</th>

    <th>Motivation & Inspiration</th>

    <th>Development of Student Skills</th>

    <th>Clarity of Expectations</th>

    <th>Total</th>

    <th>Total Ratings</th>

</tr>

<?php

$q1_total=0;
$q2_total=0;
$q3_total=0;
$q4_total=0;
$q5_total=0;
$q6_total=0;
$q7_total=0;
$q8_total=0;
$q9_total=0;

$grand_total = 0;
$total_students = 0;

if($result && $result->num_rows > 0){

    while($row = $result->fetch_assoc()){

        $student = trim($row['student_name']);

        if($student == ''){
            $student = "Anonymous";
        }

        $total =
            $row['q1'] + $row['q2'] + $row['q3'] +
            $row['q4'] + $row['q5'] + $row['q6'] +
            $row['q7'] + $row['q8'] + $row['q9'];

        /* TOTAL RATING OUT OF 25 */
        $rating25 = round(($total * 25) / 45, 2);

        $q1_total += $row['q1'];
        $q2_total += $row['q2'];
        $q3_total += $row['q3'];
        $q4_total += $row['q4'];
        $q5_total += $row['q5'];
        $q6_total += $row['q6'];
        $q7_total += $row['q7'];
        $q8_total += $row['q8'];
        $q9_total += $row['q9'];

        $grand_total += $total;
        $total_students++;
?>

<tr>

    <td><?php echo $student; ?></td>

    <td><?php echo $row['q1']; ?></td>

    <td><?php echo $row['q2']; ?></td>

    <td><?php echo $row['q3']; ?></td>

    <td><?php echo $row['q4']; ?></td>

    <td><?php echo $row['q5']; ?></td>

    <td><?php echo $row['q6']; ?></td>

    <td><?php echo $row['q7']; ?></td>

    <td><?php echo $row['q8']; ?></td>

    <td><?php echo $row['q9']; ?></td>

    <td>
        <?php echo $total; ?> / 45
    </td>

    <td>
        <?php echo $rating25; ?>
    </td>

</tr>

<?php
    }

    $final_average = round($grand_total / $total_students, 2);

    $final_rating25 = round(($final_average * 25) / 45, 2);
?>

<tr class="total-row">

    <td>AVERAGE</td>

    <td><?php echo round($q1_total / $total_students,2); ?></td>

    <td><?php echo round($q2_total / $total_students,2); ?></td>

    <td><?php echo round($q3_total / $total_students,2); ?></td>

    <td><?php echo round($q4_total / $total_students,2); ?></td>

    <td><?php echo round($q5_total / $total_students,2); ?></td>

    <td><?php echo round($q6_total / $total_students,2); ?></td>

    <td><?php echo round($q7_total / $total_students,2); ?></td>

    <td><?php echo round($q8_total / $total_students,2); ?></td>

    <td><?php echo round($q9_total / $total_students,2); ?></td>

    <td>
        <?php echo round($final_average,2); ?> / 45
    </td>

    <td>
        <?php echo $final_rating25; ?>
    </td>

</tr>

<?php
}
else{
    echo "</table>";
    echo "<p class='no-data'>No Feedback Available</p>";
}
?>

<?php
}
else{
    echo "<p class='no-data'>Please Select Semester and Subject</p>";
}
?>

</div>

<script>

function logout(){

    window.location.href = "logout.php";

}

</script>

</body>
</html>