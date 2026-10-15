<?php
session_start();

// session destroy
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logout</title>

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
    background:linear-gradient(135deg,#ffd6e8,#f8c8dc,#f5d0e6);
    overflow:hidden;
}

/* MAIN BOX */
.container{
    background:rgba(255,255,255,0.95);
    padding:45px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 12px 35px rgba(0,0,0,0.2);
    width:400px;
    animation:fadeIn 1s ease;
}

/* LOADING CIRCLE */
.loader{
    width:70px;
    height:70px;
    border:6px solid #f3c6dd;
    border-top:6px solid #c2185b;
    border-radius:50%;
    margin:0 auto 25px;
    animation:spin 1s linear infinite;
}

h2{
    color:#ad1457;
    margin-bottom:15px;
    font-size:28px;
}

p{
    margin-bottom:25px;
    color:#666;
    line-height:1.6;
}

/* BUTTON */
button{
    padding:12px 28px;
    background:linear-gradient(45deg,#ec407a,#d81b60);
    color:white;
    border:none;
    border-radius:30px;
    cursor:pointer;
    font-size:15px;
    font-weight:bold;
    transition:0.3s;
}

button:hover{
    transform:scale(1.06);
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

/* ANIMATIONS */
@keyframes spin{
    100%{
        transform:rotate(360deg);
    }
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

</style>
</head>

<body>

<div class="container">

    <!-- LOADING -->
    <div class="loader"></div>

    <h2>You have been logged out</h2>

    <p>
        Thank you for using the Online Feedback System
    </p>

    <button onclick="goHome()">
        Go to Home Page
    </button>

</div>

<script>

function goHome(){

    window.location.href = "frontpage.php";

}

</script>

</body>
</html>