<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Telefon Doğrulama</title>
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
                <input type="tel" class="form-control "name="tel" required id="tel">
            </div>
            <div class="form-group">
                <input type="text" class="btn btn-primary mt-3" value="Doğrula">

            </div>
        </form>
        <?php
            $re = '/\+[0-9]{2} \(([0-9]{3})\) ([0-9]{6,7})/';
            $matches = array();
            if(
                isset($_POST['tel']) &&
                preg_match_all($re, $_REQUEST['tel'], $matches, PREG_SET_ORDER, 0)
            )
            {
                echo 'Alan Kodu: '.$matches[0][1].'<br>';
                echo 'Tel: '.$matches[0][2].'<br>';
            }
	    ?>

    </div>
</body>
</html>