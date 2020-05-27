<?php
    require_once(__DIR__.'./db.php');
    if($_GET){
        
        $id = $_GET['id'];
        
        $giris = $pdo->prepare("delete from {$TableName} where Id='$id'");
        $giris->execute();
        if($giris->rowCount()>0){
            echo '<div class="container text-lg-left text-info">Kayıt Silindi. Anasayfaya Yönlendiriliyorsunuz..</div>';
            header( "Refresh:5; url=http://localhost/webprog-odev8/index.php", true, 303);
        }
        else{
            echo '<div class="container text-lg-left text-danger">Birşey ters gitti</div>';
        }
    
    }
?>