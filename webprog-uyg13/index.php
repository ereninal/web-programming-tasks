<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Fonksiyon</title>
</head>
<body>
    <header>
        <?php
            session_start();
            require_once(__DIR__.'./navbar.php');
            require_once(__DIR__.'./db.php');
        ?>
    </header>
    <div class="container mt-4">
        <form method="post">
        <div class="form-group">
            <input type="email" name ="email" class="form-control" placeholder="Email Adresini Girin">
        </div>
        <div class="form-group">
            <input type="password" name ="password" class="form-control" placeholder="Şifrenizi Girin">
        </div>
        <button type="submit" class="btn btn-primary">Giriş</button>
        </form>
    </div>
    <?php
        if($_POST){
            $email = $_POST['email'];
            $sifre =$_POST['password'];
            if (isset($_POST['email'], $_POST['password'])) {
                $giris = $pdo->prepare("select * from uyg13 where Email='$email' && Sifre ='$sifre'");
                $giris->execute();
                if($giris->rowCount()){
                    foreach ($giris->fetchAll() as $value) {
                        $_SESSION['Id'] = $value['Id'];
                        $_SESSION['email'] = $value['Email'];
                        $_SESSION['sifre'] = $value['Sifre'];
                        $_SESSION['ad'] = $value['Ad'];
                        $_SESSION['soyad'] = $value['Soyad'];
                        $_SESSION['adres'] = $value['Adres'];
                    }
                    header('Location: profil.php');
                }
                else{
                    echo '<p class="text-lg-left text-danger">Email veya Şifre Hatalı</p>';
                }
        }
        
        }
    ?>
</body>
</html>