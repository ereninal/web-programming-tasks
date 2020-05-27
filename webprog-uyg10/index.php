<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Harf Bulma</title>
</head>
<body>
    <header>
        <?php
            require_once(__DIR__.'./navbar.php');
        ?>
    </header>
    <div class="container mt-4">
        <form method="post">
            <div class="frm-group">
                <textarea class="form-control is-invalid" name="cumle" id="cumle" placeholder="Cümle Girin" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary mt-3 pt-5 pb-5 w-100" value="Bul">
            </div>
        </form>
        <?php
			$cumle = "";
			$dizi = array();
			if(isset($_POST['cumle'])){
				for($i = 0; $i < mb_strlen($_POST['cumle'], 'UTF-8'); $i++) {
					$char = mb_substr($_POST['cumle'], $i, 1, 'UTF-8');
					if(!array_key_exists($char, $dizi))
						$dizi[$char] = 0;
					$dizi[$char]++;
				}
			}
		?>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Harf</th>
            <th scope="col">Sayısı</th>
            </tr>
        </thead>
        <tbody>
        <?php $veri =1; foreach ($dizi as $value => $key){

            echo '<tr>';
            echo '<th scope="row">'.$veri.'</th>';
            echo '<td>'.$value.'</td>';
            echo ' <td>'.$key.'</td>';
            echo '</tr>';
            $veri++;

        } ?>
        </tbody>
        </table>


    </div>
</body>
</html>