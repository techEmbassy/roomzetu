<?php
session_start();
if(!isset($_SESSION["authenticated"])){
    header('Location: login.php');
 }
 else{
    header('Location: dashboard.php');
 }
?>
<body>

    <section>
        <div class="container">
            <h1>Welcome to reservation system</h1>
        </div>
    </section>



</body>

</html>
