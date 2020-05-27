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
           
            require_once(__DIR__.'./navbar.php');
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
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Kullanıcı adı</th>
            <th scope="col">Tarih</th>
            <th scope="col">IP Adresi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
        <?php
            header("Content-type: image/jpeg");
            $resim  = imagecreate(300,300);
            $kirmizi = imagecolorallocate( $resim, 255,0,0 );
            $mor = imagecolorallocate( $resim, 100,50,100 );
            imagefill ( $resim,0,0,$kirmizi );
            
            imageline($resim,150,150,50,50,$mor);
            
            imagejpeg($resim);
            imagedestroy($resim);
            ?>
            
            
            <strong>►Yazı</strong>
            
            Resmimizde istediğimiz koordinata yazı yazmamız mümkündür bunun için imagestring(); fonksiyonunu kullanıyoruz.
            
            Kullanımı: imagestring($resim,$font(int),$x,$y,"Yazı",$renk);
            
            300x300 formatında bir resme 200.200 koordinatlarından başlayan Mor renginde oCRaCy yazalım
            
            
            <?php
            header("Content-type: image/jpeg");
            $resim  = imagecreate(300,300);
            $kirmizi = imagecolorallocate( $resim, 255,0,0 );
            $mor = imagecolorallocate( $resim, 100,50,100 );
            imagefill ( $resim,0,0,$kirmizi );
            
            imagestring($resim,1,200,200,"oCRaCy",$mor);
            
            imagejpeg($resim);
            imagedestroy($resim);
            ?>
    </div>
</body>
</html>