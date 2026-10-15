<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Online Feedback System</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    /* ✅ SOFT PINK BACKGROUND */
    background:linear-gradient(135deg,#ffd6e8,#f8bbd0,#e1bee7);
}

/* MAIN CONTAINER */
.container{
    width:90%;
    height:85vh;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 40px rgba(0,0,0,0.5);
}

/* BOTH SECTIONS */
.section{
    flex:1;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:white;
    position:relative;
    transition:0.4s;
}

/* HOVER OVERLAY */
.section::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.15);
    opacity:0;
    transition:0.3s;
    pointer-events:none;
}

.section:hover::before{
    opacity:1;
}

.section:hover{
    flex:1.1;
}

/* LEFT SIDE */
.left{
    background:linear-gradient(135deg,#f48fb1,#ce93d8);
}

/* RIGHT SIDE */
.right{
    background:linear-gradient(135deg,#ec407a,#ba68c8);
}

/* TEXT */
h1{
    font-size:35px;
    margin-bottom:15px;
    z-index:2;
}

p{
    width:70%;
    line-height:1.7;
    margin-bottom:25px;
    z-index:2;
}

/* BUTTON */
button{
    padding:13px 32px;
    border:none;
    border-radius:30px;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
    position:relative;
    z-index:2;
}

.btn-feedback{
    background:white;
    color:#d81b60;
}

.btn-login{
    background:white;
    color:#ab47bc;
}

button:hover{
    transform:scale(1.08);
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
}

/* REMOVE LINK UNDERLINE */
a{
    text-decoration:none;
}

/* MOBILE */
@media(max-width:768px){

.container{
    flex-direction:column;
    height:95vh;
}

.section{
    padding:30px;
}

}

</style>
</head>

<body>

<div class="container">

    <!-- LEFT SECTION -->
    <div class="section left">

        <h1>Give Feedback</h1>

        <p>
            Share your valuable feedback to help improve
            teaching quality and enhance the learning experience.
        </p>

        <!-- FEEDBACK PAGE LINK -->
        <a href="feedback.php">
            <button type="button" class="btn-feedback">
                Start Feedback
            </button>
        </a>

    </div>

    <!-- RIGHT SECTION -->
    <div class="section right">

        <h1>Teacher Login</h1>

        <p>
            Teachers can login to access dashboard,
            view ratings and analyze student feedback.
        </p>

        <!-- LOGIN PAGE LINK -->
        <a href="login.php">
            <button type="button" class="btn-login">
                Login Now
            </button>
        </a>

    </div>

</div>

</body>
</html>