<?php
session_start();

$conn = new mysqli("localhost","root","","feedback_system");

if(isset($_POST['register'])){

    $teacher_name = $_POST['teacher_name'];
    $userid = $_POST['new_userid'];
    $password = $_POST['new_password'];

    $insert = "INSERT INTO teachers 
    (teacher_name, userid, password)
    VALUES
    ('$teacher_name','$userid','$password')";

    if($conn->query($insert)){
        $success = "Registration Successful!";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){

    $user = $_POST['userid'];
    $pass = $_POST['password'];

    // DATABASE LOGIN
    $sql = "SELECT * FROM teachers 
            WHERE userid='$user' 
            AND password='$pass'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $_SESSION['teacher'] = $row['teacher_name'];

        header("Location: dashboard.php");
        exit();
    }
    else{
        $error = "Invalid Login!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Teacher Login</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:30px;

    background:
    linear-gradient(135deg,
    #ffe0ef,
    #f4d7ff,
    #e5dcff,
    #ffd6e8);

    background-size:400% 400%;

    animation:bgMove 12s ease infinite;

    overflow:hidden;
}

/* GLOW EFFECTS */

body::before,
body::after{

    content:"";
    position:absolute;
    width:350px;
    height:350px;
    border-radius:50%;
    filter:blur(90px);
    z-index:0;

}

body::before{

    background:#ff9bc9;
    top:-100px;
    left:-100px;

}

body::after{

    background:#b88cff;
    bottom:-100px;
    right:-100px;

}

/* HOME BUTTON */

.home-btn{

    position:absolute;
    top:25px;
    left:25px;

    padding:12px 25px;

    text-decoration:none;

    color:white;

    font-weight:bold;

    border-radius:30px;

    background:
    linear-gradient(45deg,
    #ff4f9a,
    #c84bff);

    box-shadow:
    0 8px 20px rgba(0,0,0,0.2);

    transition:0.3s;

    z-index:5;
}

.home-btn:hover{

    transform:scale(1.05);

    box-shadow:
    0 10px 25px rgba(0,0,0,0.3);
}

/* CONTAINER */

.container{

    width:900px;

    display:flex;
    gap:30px;

    position:relative;
    z-index:2;

    flex-wrap:wrap;
    justify-content:center;
}

/* BOX */

.box{

    flex:1;
    min-width:320px;

    background:rgba(255,255,255,0.35);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    padding:35px;

    border-radius:25px;

    text-align:center;

    box-shadow:
    0 15px 35px rgba(0,0,0,0.18),
    0 0 20px rgba(255,255,255,0.2);

    transition:0.4s;
}

.box:hover{

    transform:translateY(-6px);

    box-shadow:
    0 20px 45px rgba(0,0,0,0.25);

}

/* HEADINGS */

h2{

    color:#a0005a;

    margin-bottom:25px;

    font-size:28px;

    font-weight:700;
}

/* INPUTS */

input{

    width:100%;

    padding:14px;

    margin:12px 0;

    border:none;

    outline:none;

    border-radius:12px;

    background:rgba(255,255,255,0.8);

    font-size:15px;

    transition:0.3s;
}

input:focus{

    background:white;

    box-shadow:
    0 0 10px rgba(200,75,255,0.3);
}

/* BUTTON */

button{

    width:100%;

    padding:14px;

    margin-top:15px;

    border:none;

    border-radius:30px;

    cursor:pointer;

    font-size:16px;

    font-weight:bold;

    color:white;

    background:
    linear-gradient(45deg,
    #ff4f9a,
    #c84bff);

    transition:0.4s;
}

button:hover{

    transform:
    translateY(-2px)
    scale(1.02);

    box-shadow:
    0 10px 25px rgba(0,0,0,0.25);
}

/* SUCCESS + ERROR */

.error{

    color:#d50000;

    margin-top:15px;

    font-weight:bold;
}

.success{

    color:#008a3d;

    margin-top:15px;

    font-weight:bold;
}

/* ANIMATIONS */

@keyframes bgMove{

    0%{
        background-position:0% 50%;
    }

    50%{
        background-position:100% 50%;
    }

    100%{
        background-position:0% 50%;
    }
}

/* MOBILE */

@media(max-width:768px){

    .container{
        flex-direction:column;
        width:100%;
    }

    .home-btn{

        top:15px;
        left:15px;

        padding:10px 18px;

        font-size:14px;
    }

}

</style>
</head>

<body>

<!-- HOME BUTTON -->
<a href="frontpage.php" class="home-btn">
    Home Page
</a>

<div class="container">

    <!-- LOGIN BOX -->
    <div class="box">

        <h2>Teacher Login</h2>

        <form method="POST">

            <input type="text"
                   name="userid"
                   placeholder="Enter User ID"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Enter Password"
                   required>

            <button type="submit" name="login">
                Login Now
            </button>

        </form>

        <?php if(isset($error)){ ?>

            <p class="error">

                <?php echo $error; ?>

            </p>

        <?php } ?>

    </div>

    <!-- REGISTER BOX -->
    <div class="box">

        <h2>Teacher Registration</h2>

        <form method="POST">

            <input type="text"
                   name="teacher_name"
                   placeholder="Teacher Name"
                   required>

            <input type="text"
                   name="new_userid"
                   placeholder="Create User ID"
                   required>

            <input type="password"
                   name="new_password"
                   placeholder="Create Password"
                   required>

            <button type="submit" name="register">
                Register Now
            </button>

        </form>

        <?php if(isset($success)){ ?>

            <p class="success">

                <?php echo $success; ?>

            </p>

        <?php } ?>

    </div>

</div>

</body>
</html>