<?php
    session_start();
    if( isset($_SESSION["userLogin"]) )
    {
        $_SESSION["userLogin"] = "";
        session_destroy();
        echo "
        <script type='text/javascript'>
            
            window.location.href='login.html';
        </script>
    ";
    }

?>