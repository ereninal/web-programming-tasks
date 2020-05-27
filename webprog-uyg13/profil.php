<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Profil</title>
</head>
<body>
    <header>
        <?php
            session_start();
            require_once(__DIR__.'./navbar.php');
            require_once(__DIR__.'./db.php');
            $id=$_SESSION['Id'];
            $email = $_SESSION['email'];
            $sifre= $_SESSION['sifre'];
            $ad= $_SESSION['ad'];
            $soyad=$_SESSION['soyad'];
            $adres= $_SESSION['adres'];
            
        ?>
    </header>
    <div class="container mt-4">
        <form method="post">
        <div class="form-group">
            <label >Email:</label>
            <input type="email" name ="email" value="<?php echo $email;?>" class="form-control" placeholder="Email Adresini Girin">
        </div>
        <div class="form-group">
            <label >Şifre</label>
            <input type="text" name ="sifre" value="<?php echo $sifre;?>" class="form-control" placeholder="Şifrenizi Girin">
        </div>
        <div class="form-group">
            <label >Ad</label>
            <input type="text" name ="ad" value="<?php echo $ad;?>" class="form-control" placeholder="Şifrenizi Girin">
        </div>
        <div class="form-group">
            <label >Soyad</label>
            <input type="text" name ="soyad" value="<?php echo $soyad;?>" class="form-control" placeholder="Şifrenizi Girin">
        </div>
        <div class="form-group">
            <label >Adres</label>
            <textarea class="form-control is-invalid" name="adres" id="adres" placeholder="Required example textarea" required><?php echo $adres;?>"</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
    <?php
        if($_POST){
            $email = $_POST['email'];
            $sifre= $_POST['sifre'];
            $ad= $_POST['ad'];
            $soyad=$_POST['soyad'];
            $adres= $_POST['adres'];
            
            if (isset($_POST['email'], $_POST['sifre'])) {
                $giris = $pdo->prepare("update {$TableName} set 
                Ad='$ad',
                Soyad='$soyad',
                Adres='$adres',
                Sifre='$sifre',
                Email='$email'
                where Id='$id'");
                $giris->execute();
                if($giris->rowCount()){
                    echo '<div class="container text-lg-left text-info">Güncellendi.</div>';
                }
                else{
                    echo '<p class="text-lg-left text-danger">Birşey ters gitti</p>';
                }
            }
        
        }
    ?>
</body>
</html>