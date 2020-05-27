<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Adres Defteri</title>
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
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Kayıt No</th>
            <th scope="col">Ad</th>
            <th scope="col">Soyad</th>
            <th scope="col">Adres</th>
            <th scope="col">Telefon</th>
            <th scope="col">İşlem</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $giris = $pdo->prepare("select * from adresdefteri");
            $giris->execute();
            if($giris->rowCount()){
                foreach ($giris->fetchAll() as $value) {
                    echo '<tr>
                    <th scope="row">'.$value['Id'].'</th>
                    <td>'.$value['Ad'].'</td>
                    <td>'.$value['Soyad'].'</td>
                    <td>'.$value['Adres'].'</td>
                    <td>'.$value['Telefon'].'</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                İşlem Seçin
                            </a>
                    
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="duzenleme.php?id='.$value['Id'].'">Düzelt</a>
                                <a class="dropdown-item" href="sil.php?id='.$value['Id'].'">Sil</a>
                            </div>
                    </div>
                    </td>
                    </tr>';
                }
            }
            else{
                echo '<div class="container text-lg-left text-danger">Birşey ters gitti</p>';
            }
        
        ?>
            
        </tbody>
    </table>
    </div>
    
</body>
</html>