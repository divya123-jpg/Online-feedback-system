<?php
session_start();

$conn = new mysqli("localhost","root","","feedback_system");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $student = $_POST['student_name'];
    $teacher = $_POST['teacher_name'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];

    $q1=$_POST['q1']; 
    $q2=$_POST['q2']; 
    $q3=$_POST['q3'];
    $q4=$_POST['q4']; 
    $q5=$_POST['q5']; 
    $q6=$_POST['q6'];
    $q7=$_POST['q7']; 
    $q8=$_POST['q8']; 
    $q9=$_POST['q9'];

    $comment = $_POST['comment'];

    $sql = "INSERT INTO feedback 
    (student_name, teacher_name, semester, subject, q1,q2,q3,q4,q5,q6,q7,q8,q9, comment)
    VALUES 
    ('$student','$teacher','$semester','$subject',
     '$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$comment')";

    if($conn->query($sql)){

        header("Location: thankyou.php");
        exit();

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Feedback Form</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI';
}

body{
    background:#ffd6e8;
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */

.sidebar{
    width:220px;
    background:#ff8fb1;
    padding:30px 20px;
    position:fixed;
    height:100%;
    left:0;
    top:0;
}

.sidebar h3{
    color:white;
    margin-bottom:30px;
    text-align:center;
    font-size:24px;
}

.sidebar a{
    display:block;
    text-decoration:none;
    background:white;
    color:#d63384;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
    text-align:center;
    font-weight:bold;
    transition:0.3s;
}

.sidebar a:hover{
    background:#ffe5ef;
}

/* MAIN CONTENT */

.main-content{
    margin-left:240px;
    width:100%;
    padding:30px;
}

.container{
    max-width:800px;
    margin:auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:20px;
    color:#d63384;
}

.form-group{
    margin-bottom:15px;
}

label{
    font-weight:bold;
    display:block;
    margin-bottom:5px;
}

input, select{
    width:100%;
    padding:10px;
    border-radius:6px;
    border:1px solid #ccc;
}

.question{
    background:#fff0f6;
    padding:15px;
    border-radius:10px;
    margin-bottom:15px;
}

.question p{
    margin-bottom:10px;
    font-weight:bold;
    color:#c2185b;
}

.options{
    display:flex;
    justify-content:space-between;
}

textarea{
    width:100%;
    height:80px;
    padding:10px;
    border-radius:6px;
    border:1px solid #ccc;
}

.submit-btn{
    display:block;
    margin:20px auto;
    padding:12px 30px;
    background:#d63384;
    color:white;
    border:none;
    border-radius:25px;
    cursor:pointer;
    font-size:16px;
}

.submit-btn:hover{
    background:#c2185b;
}

</style>
</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h3>Menu</h3>

<a href="frontpage.php">🏠 Home Page</a>

</div>

<!-- MAIN CONTENT -->

<div class="main-content">

<div class="container">

<h2>Student Feedback Form</h2>

<form method="POST">

<div class="form-group">
<label>Student Name (Optional)</label>
<input type="text" name="student_name">
</div>

<div class="form-group">
<label>Teacher Name</label>
<select name="teacher_name" required>
<option value="">Select Teacher</option>
<option>Mr. Anoop Rathore</option>
<option>Ms. Tripti Singh</option>
<option>Ms. Pragati Gautam</option>
<option>Mr. Ram singh</option>
<option>Ms. Kokila jaiswal </option>
<option>Mr. Rakesh sir</option>
<option>Mr. Amit sir</option>
<option>Mr. Ashish chandelkar </option>
</select>
</div>

<div class="form-group">
<label>Semester</label>
<select name="semester" required>
<option value="">Select Semester</option>
<option>1st</option>
<option>2nd</option>
<option>3rd</option>
<option>4th</option>
<option>5th</option>
<option>6th</option>
</select>
</div>

<div class="form-group">
<label>Subject</label>
<select name="subject" required>
<option value="">Select Subject</option>
<option>Operating system</option>
<option>Computer networking</option>
<option>DBMS</option>
<option>Web technology</option>
<option>Maths</option>
<option>Physics</option>
<option>Chemistry</option>
<option>Mechanics</option>
<option>FEEE</option>
<option>Maths-II</option>
<option>C programming</option>
<option>Communication skills</option>
<option>IT system</option>
<option>Data structure</option>
<option>Scipting language</option>
<option>Algorithm</option>
<option>CSO</option>
<option>Physics-II</option>
<option>Introduction of e-governance</option>
<option>Internet of things</option>
<option>Multimedia technologies</option>
<option>Advance computers</option>
<option>Data sciences</option>
<option>Renewable energy technologies</option>
<option>Operation research</option>
<option>Mobile computing</option>
<option>Network forensics</option>
<option>Software testing</option>
<option>FREE AND OPEN SOURCE SOFTWARE</option>
<option>Disaster management</option>
<option>Project management</option>
<option>Artificial intelligence</option>
<option>Engineering ecomics and accountancy</option>
<option>Software engineering</option>

</select>
</div>

<!-- QUESTION 1 -->
<div class="question">
<p>1.Has the Teacher covered entire Syllabus as prescribed?</p>

<div class="options">
<label><input type="radio" name="q1" value="1" required>1</label>
<label><input type="radio" name="q1" value="2">2</label>
<label><input type="radio" name="q1" value="3">3</label>
<label><input type="radio" name="q1" value="4">4</label>
<label><input type="radio" name="q1" value="5">5</label>
</div>
</div>

<!-- QUESTION 2 -->
<div class="question">
<p>2.Has the Teacher covered relevant topics beyond syllabus?</p>

<div class="options">
<label><input type="radio" name="q2" value="1" required>1</label>
<label><input type="radio" name="q2" value="2">2</label>
<label><input type="radio" name="q2" value="3">3</label>
<label><input type="radio" name="q2" value="4">4</label>
<label><input type="radio" name="q2" value="5">5</label>
</div>
</div>

<!-- QUESTION 3 -->
<div class="question">
<p>3.Effectiveness in terms of technical content</p>

<div class="options">
<label><input type="radio" name="q3" value="1" required>1</label>
<label><input type="radio" name="q3" value="2">2</label>
<label><input type="radio" name="q3" value="3">3</label>
<label><input type="radio" name="q3" value="4">4</label>
<label><input type="radio" name="q3" value="5">5</label>
</div>
</div>

<!-- QUESTION 4 -->
<div class="question">
<p>4.Communication skills of teacher</p>

<div class="options">
<label><input type="radio" name="q4" value="1" required>1</label>
<label><input type="radio" name="q4" value="2">2</label>
<label><input type="radio" name="q4" value="3">3</label>
<label><input type="radio" name="q4" value="4">4</label>
<label><input type="radio" name="q4" value="5">5</label>
</div>
</div>

<!-- QUESTION 5 -->
<div class="question">
<p>5.Use of teaching aids</p>

<div class="options">
<label><input type="radio" name="q5" value="1" required>1</label>
<label><input type="radio" name="q5" value="2">2</label>
<label><input type="radio" name="q5" value="3">3</label>
<label><input type="radio" name="q5" value="4">4</label>
<label><input type="radio" name="q5" value="5">5</label>
</div>
</div>

<!-- QUESTION 6 -->
<div class="question">
<p>6.Pace on which contents were covered</p>

<div class="options">
<label><input type="radio" name="q6" value="1" required>1</label>
<label><input type="radio" name="q6" value="2">2</label>
<label><input type="radio" name="q6" value="3">3</label>
<label><input type="radio" name="q6" value="4">4</label>
<label><input type="radio" name="q6" value="5">5</label>
</div>
</div>

<!-- QUESTION 7 -->
<div class="question">
<p>7.Motivation and inspiration for students to learn</p>

<div class="options">
<label><input type="radio" name="q7" value="1" required>1</label>
<label><input type="radio" name="q7" value="2">2</label>
<label><input type="radio" name="q7" value="3">3</label>
<label><input type="radio" name="q7" value="4">4</label>
<label><input type="radio" name="q7" value="5">5</label>
</div>
</div>

<!-- QUESTION 8 -->
<div class="question">
<p>8.Support for development of student skills</p>

<div class="options">
<label><input type="radio" name="q8" value="1" required>1</label>
<label><input type="radio" name="q8" value="2">2</label>
<label><input type="radio" name="q8" value="3">3</label>
<label><input type="radio" name="q8" value="4">4</label>
<label><input type="radio" name="q8" value="5">5</label>
</div>
</div>

<!-- QUESTION 9 -->
<div class="question">
<p>9.Clarity of expectations of students</p>

<div class="options">
<label><input type="radio" name="q9" value="1" required>1</label>
<label><input type="radio" name="q9" value="2">2</label>
<label><input type="radio" name="q9" value="3">3</label>
<label><input type="radio" name="q9" value="4">4</label>
<label><input type="radio" name="q9" value="5">5</label>
</div>
</div>

<div class="form-group">
<label>Additional Comments</label>
<textarea name="comment"></textarea>
</div>

<button type="submit" class="submit-btn">
Submit Feedback
</button>

</form>

</div>
</div>

</body>
</html>