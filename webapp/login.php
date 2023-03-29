
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Payroll</title>
<style>
/* sus */
        *{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    }
    body{
        background-color: #f8efef;
    }
    .center{
            position: absolute;
            left: 50%;
            background-color: white;
            height: 650px;
            width: 500px;
            transform: translate(-50%, 5%);
            border-radius: 19px;

    }
    .center h1{
        margin-top: 280px;
        width: 85%;
        margin-left: 20px;
        text-align: center;
        border-bottom: 2px solid #26919d;
    }
    .center form{
        padding: 0 40px; 
        box-sizing: border-box;
    }
    form .txtfield{
        position: relative;
        margin: 30px 0;
        margin-left: 20px;
    }
    .txtfield input{
        width: 90%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
    }
    .txtfield label{
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: 0.5s;
    }
    .txtfield span::before{
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 90%;
        height: 1px;
        background: #adadad;
        transition: .5s;

    }
    .txtfield input:focus ~ label,
    .txtfield input:valid ~ label{
        top: -5px;
        color: #26919d
        
    }
    .txtfield input:focus ~ span::before,
    .txtfield input:valid ~ span::before {
        width: 90%;
        background: #26919d;
    }
    input[type="submit"]{
        width: 40%;
        border: 1px solid;
        background: #2691d9;
        border-radius: 29px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 500;
        cursor: pointer;
        outline: none;
        margin-left: 120px;
        padding: 10px;
    }
    input[type="submit"]:hover{
        border-color: #2691d9;
        transition: .5s;
        box-shadow: 1px 1px 2px 2px #2691d9;
    }


/* ALERT BOX */
    .dangers , .successs{
        position: absolute;
        top: 100px;
        width: 200px;
        left: 630px;
        padding-top: 3px;
        padding-bottom: 3px;
        font-size: 16px;
    }
    .dangers{
        color: black;
        background: white;
        transition-duration: 2s;
        box-shadow: 1px 1px 3px 3px #e5e5e5;
        border-radius: 9px;
        border-left: 8px solid #ff4b4b;
        padding-left: 20px;
        font-family: 'Open Sans', sans-serif;
    }
    .successs{
        color: black;
        background: white;
        transition-duration: 2s;
        box-shadow: 4px 2px 6px 4px #e5e5e5;
        border-radius: 9px;
        border-left: 8px solid #28fa28;
        padding-left: 20px;
        font-family: 'Open Sans', sans-serif;
        
    }
    img{
        position: absolute;
        height: 220px;
        width: 220px;
        border-radius: 100%;
        top: 40px;
        left: 133px;

    }

/* ===== ROTATE LOGO */ 

    .rotate
    {
    -webkit-animation: rotateanti 5s linear infinite 0s;
    -moz-animation: rotateanti 5s linear infinite 0s;
    -o-animation: rotateanti 5s linear infinite 0s;
    -ms-animation: rotateanti 5s linear infinite 0s;
    animation: rotateanti 5s linear infinite 0s;
    }
    @-o-keyframes rotate {
    from {
        -o-transform: rotate(180deg);
    }
    to {
        -o-transform: rotate(360deg);
    }

    }
    @-ms-keyframes rotate {
    from {
        -ms-transform: rotate(180deg);
    }
    to {
        -ms-transform: rotateY(360deg);
    }

    }

    @-webkit-keyframes rotateanti {
    to {
        -webkit-transform: rotateY(0deg);
    }
    from {
        -webkit-transform: rotateY(360deg);
    }

    }

    @-moz-keyframes rotateanti {
    to {
        -moz-transform: rotateY(0deg);
    }
    from {
        -moz-transform: rotateY(360deg);
    }

    }   
</style>
</head>

<body>

    <!-- ALERT MESSAGE -->
    <div class="alert" id="hidanim">
        <?php
            if(isset($_SESSION['message'])):?>
            <div class="alert-<?=$_SESSION['msg_type']?>">
                <?php
                    if($_SESSION['msg_type'] == 'dngr'): ?>
                        <div class="dangers">
                            <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']); 
                            ?>
                        </div>
                    <?php elseif($_SESSION['msg_type'] == 'sccs'): ?>
                        <div class="successs">
                            <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']); 
                            ?>
                        </div>
                <?php endif ?>
            </div>          
        <?php endif ?>
    </div>
<!-- (END)ALERT MESSAGE -->
    <div class="center">
        <img src="logo.png" alt="" class="rotate">
        <form autocomplete="off" action="checkuser.php" method="POST">
            <h1 style="background:none;padding-bottom:10px;letter-spacing:2px">&nbspLOGIN</h1>
                <div class="txtfield">
                    <input type="text" name="user"  required>
                    <span></span>
                    <label class="label1">Username</label>
                </div>
                <div class="txtfield">
                    <input type="password" name="pass" id="id_password" required>
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                    <span></span>
                    <label class="label2">Password</label><br>
                </div>
            <input type="submit" name="submit" value="LOGIN">
            <p style="text-align: center;margin-top: 40px">Need an account? Contact the ADMIN</p>
        </form> 
        
        <script>
             const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#id_password');
                
                togglePassword.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // toggle the eye slash icon
                    this.classList.toggle('fa-eye-slash');
                });
        </script>
        </div>

<!-- ANIMATION ALERT -->
<script>
        console.log(".alert");
        window.setTimeout(function(){   
            $("#hidanim").fadeTo(500,0).slideUp(500, function(){
                $(this).remove();
            }); 
        }, 2000);
    </script>
<!-- END ANIMATION ALERT-->	
</body>
<!-- (END)BODY -->




</html>