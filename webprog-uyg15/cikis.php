<?php 
   // cikis.php
   session_start();
   ?>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

   <?php
   $_SESSION["giris"] = false;  
   session_destroy();
   echo " Çıkış Yapıldı";
   echo "<a href='adminLogin.php'>Admin sayfası</a>";
         
 ?>