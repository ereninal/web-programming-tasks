<!DOCTYPE html>
<html lang="en">
	<?php 
		session_start();
		if($_SESSION){
			header( "Refresh:2; url=http://localhost/webprog-uyg13-Haftalik/admin.php", true, 303);
						
		}
		else{
			$_SESSION['giris']=false;
		}
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
				if(isset($_POST['email'], $_POST['sifre'])){
					$ad = $_POST['email'];
					$sifre =$_POST['sifre'];
					$data =file_get_contents('kullanici.json');
					$json = json_decode($data,true);
					foreach ($json as $value) {
						if($ad==$value['ad']){
							if($sifre==$value['sifre']){
								echo '<p class="text-info">Giriş Başarılı.Admin Sayfasına yönlendiriliyorsunuz..</P>';
								$_SESSION['giris']=true;
								$_SESSION['ad']=$ad;
								header( "Refresh:2; url=http://localhost/webprog-uyg13-Haftalik/admin.php", true, 303);

							}
							else{
								echo '<p class="text-info">Şifre Hatalı</P>';
							}
						}else{
							echo '<p class="text-info">Kullanıcı Adı Hatalı</P>';
						}
					}
				}
			?>
		</div>
	</body>
</html>