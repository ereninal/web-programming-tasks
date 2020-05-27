<!DOCTYPE html>
<html lang="en">
	<?php 
		session_start();
		require_once(__DIR__.'./db.php');
		if($_SESSION)
			header("Refresh:1; url=http://localhost/webprog-uyg15/admin.php", true, 303);
		else
			$_SESSION['giris']=false;
		
	?>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<title>Yönetici Girişi</title>
		<style>
			h1, h2, h3, h4{
				width: fit-content;
				margin-left: auto;
				margin-right: auto;
			}
			form{
				display: flex;
				flex-direction: column;
				margin-right: auto;
				margin-left: auto;
			}

			form input{
				margin: 10px;
				padding: 10px;
				width: 95%;
				text-align: center;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<h2 class="mt-2 text-info">Yönetici Giriş</h2>
			<form method="POST">
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email Girin">
				</div>
				<div class="form-group">
					<input type="password" name="sifre" class="form-control" placeholder="Şifre Girin">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Giriş</button>
				</div>
				
			</form>
			<?php
				if($_POST){
					$email = $_POST['email'];
					$sifre = $_POST['sifre'];
					$sorgu =$pdo->prepare("select * from ziyaretkullanicilar");
					$sorgu->execute();
					foreach ($sorgu as $value) {
						if($email==$value['Email']){
							if($sifre==$value['Sifre']){
								echo '<div class="container text-info">Başarılı</div>';
								$_SESSION['id']=$value['Id'];
								$_SESSION['giris']=true;
								header("Refresh:2; url=http://localhost/webprog-uyg15/admin.php", true, 303);
							}
							else
								echo '<div class="container text-lg-left text-danger">Şifre Hatalı</div>';
						}else
							echo '<div class="container text-lg-left text-danger">Kullanıcı Adı Hatalı</div>';
					}

				} 

			?>
		</div>
	</body>
</html>