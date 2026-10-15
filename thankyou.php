<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Thank You</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(135deg, #e0c3fc, #f9c5d1, #d9a7c7);
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: rgba(255, 255, 255, 0.9);
    padding: 40px;
    border-radius: 18px;
    text-align: center;
    width: 400px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    backdrop-filter: blur(8px);
    animation: fadeIn 1s ease;
}

h1 {
    color: #7b68ee;
    margin-bottom: 10px;
}

p {
    color: #555;
    margin-bottom: 20px;
}

.icon {
    font-size: 55px;
    margin-bottom: 15px;
}

button {
    padding: 12px 25px;
    background: linear-gradient(45deg, #b39ddb, #ce93d8);
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #9575cd, #ba68c8);
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
</head>

<body>

<div class="container">

<div class="icon">✨</div>

<h1>Thank You!</h1>

<p>Your feedback has been submitted successfully.</p>

<p>We truly appreciate your valuable response.</p>

<button onclick="goHome()">
    Go to Home Page
</button>

</div>

<script>
function goHome() {

    // ✅ HOME PAGE OPEN HOGA
    window.location.href = "frontpage.php";

}
</script>

</body>
</html>