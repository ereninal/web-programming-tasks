<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Yasaklı Kelimeler</title>
</head>
<body>
    <header>
        <?php
            require_once(__DIR__.'./navbar.php');
        ?>
    </header>
    <div class="container mt-4">
    <form method="post">
    <div class="form-group" >
    <textarea class="form-control is-invalid" name="cumle" placeholder="Cümle girin" required></textarea>
    </div>
    <div class="form-group" >
        <input placeholder="Yasaklı kelime girin.." type="text" class="form-control"  name="yasakli" require>
    </div>
    
    <button type="submit" class="btn btn-primary">Maskele</button>
  </form>
  <?php
    if(isset($_POST['cumle']) && isset($_POST['yasakli'])){
                $cumle = $_POST['cumle'];
                $cumle = str_replace('!','',$cumle);
                $cumle = str_replace('.','',$cumle);
                $cumle = str_replace(',','',$cumle);
                $cumle = str_replace(';','',$cumle);
                $cumle = str_replace(':','',$cumle);

                $yasakliKelime = explode(',',$_POST['yasakli']);
                for ($i=0; $i < count($yasakliKelime); $i++)
                    $yasakliKelime[$i] = trim($yasakliKelime[$i]);
                $words = explode(' ', $cumle);
                
                foreach ($yasakliKelime as $yasakli) {
                    for ($i=0; $i < count($words); $i++) { 
                        if($words[$i] == $yasakli){
                            $words[$i] = str_repeat("*", strlen($words[$i]));
                        }
                    }
                }
                echo implode(' ',$words);
            }
	?>
    </div>
</body>
</html>