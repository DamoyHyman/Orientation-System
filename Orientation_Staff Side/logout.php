<htlm>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110491194-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-110491194-1');
        </script>

        <title>Logout</title>
         <script type= "text/javascript" src="js/Js.js"></script>
    </head>
    <body>
<?php
   session_start();
        
   $_SESSION = array();
        
   if (ini_get("session.use_cookies"))
   {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
             );
}

   echo 'You have logged out successfully....';
   header('Refresh: 2; URL = log_staff.php');
   session_destroy();

     ?>
    </body>
</htlm>