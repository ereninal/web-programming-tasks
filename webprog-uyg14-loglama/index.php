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
        <?php
            if($_POST){
                $isim = $_POST['email'];
                $dosya = fopen('log.txt','a');
                $cumle = $isim.'-'.date('d.m.Y H:i:s').'-'.$_SERVER['REMOTE_ADDR']; 
                fwrite($dosya,''.PHP_EOL);
                fwrite($dosya,$cumle);
                fclose($dosya);
            }
        ?>
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
        <?php  
            if(file_exists('log.txt')){
                $dosya = fopen('log.txt','r');
                $s=1;
                while(!(feof($dosya))){
                    $satir =fgets($dosya);
                    $satir = explode("-",$satir);
                    echo '<tr>
                    <th scope="row">'.$s.'</th>
                    <td>'.$satir[0].'</td>
                    <td>'.$satir[1].'</td>
                    <td>'.$satir[2].'</td>
                    </tr>';
                    $s++;
                }
                fclose($dosya);
            }
            else{
                echo '<tr>
                <th scope="row">1</th>
                <td>Dosya Bulunamadı</td>
                </tr>';
            }

        ?>
            
        </tbody>
        </table>
        
    </div>
</body>
</html>