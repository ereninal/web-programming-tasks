<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Otopark</title>
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
        <input placeholder="Zaman Girin" type="text" class="form-control" id="zaman" name="zaman" require>
    </div>
    <div class="frm-group">
        <select class="custom-select custom-select-lg mb-3" name="secim">
            <option selected>Seçim Yapın</option>
            <option value="1">Taksi</option>
            <option value="2">Minibüs</option>
            <option value="3">Ticari Araç</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Hesapla</button>
  </form>
  <?php
		$sonuc = 0;
		$maliyet = 0;
		$gecikme = 0;

		if (isset($_POST['secim'])){
			switch ($_POST['secim']) {
				case '1':
					$maliyet = 2;
					$gecikme = 1.2;
					break;
	
				case '2':
					$maliyet = 3;
					$gecikme = 1.25;
					break;
	
				case '3':
					$maliyet = 2.5;
					$gecikme = 1.25;
					break;
			}
		}

		if (isset($_POST['zaman'])){
			$sonuc = (int)$_POST['zaman'] * $maliyet;
			if((int)$_POST['zaman'] > 1)
                $sonuc *= $gecikme;
        echo 'Otopark Ücretiniz: '.$sonuc.' ₺';
		}
	?>
    </div>
</body>
</html>