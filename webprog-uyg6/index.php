<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Karşılaştırma</title>
</head>
<body>
    <header>
        <?php
            require_once(__DIR__.'./navbar.php');
        ?>
    </header>
    <div class="container">
    <form class="m-6" method="POST">
        <div class="form-row">
            <div class="col">
                <input type="text" name="first" placeholder="First">
            </div>
            <div class="col">
                <input type="text" name="second" placeholder="Last">
            </div>
            <div class="col">
                <input class="btn btn-primary" type="submit" name="submit" value="Dene">
            </div>
        </div>
    </form>
    <?php 
			$first = $_POST['first'];
			$second = $_POST['second'];

			if ($first > $second) {
				echo 'A-B: ';
				echo $first - $second;
			}
			else if($first < $second){
				echo 'A+B: ';
				echo $first + $second;
			}
			else if($first == $second){
				echo 'A*B: ';
				echo $first * $second;
			}
		?>
    </div>
</body>
</html>