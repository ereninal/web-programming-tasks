<?php
		@session_start();
		if(!$_SESSION['giris']){
			echo 'Sayafayı görmeye yetkiniz yok';
			exit();
		}
		require_once(__DIR__.'./db.php');
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	<title>Yönetim Paneli</title>
	<style>
		h1, h2, h3, h4 {
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			width: 50%;
		}

		.message_form{
			display: flex;
			flex-direction: column;
			margin: 0 auto 3em auto;
			width: 90%;
			justify-content: center;
			align-items: center;
			border: 3px solid #333;
			border-radius: 2em;
			padding: 2em 5em 2em 2em;
		}

		.message_form input[type="submit"]{
			padding: 10px;
			width: 102%;
			margin: 10px auto;
		}

		.message_form input[type="submit"]:hover{
			cursor: pointer;
		}

		.message_form label{
			width: 100%;
		}

		.message_form label input, .message_form label textarea{
			margin: 10px;
			padding: 10px;
			width: 100%;
		}
	</style>
</head>
<body>
	<h1>Merhaba <?= $_SESSION['ad'] ?></h1>
	<h3>
		<?php 
			if (isset($_POST['sil'])) {
				$kid = $_SESSION['id'];
				$id = $_POST['id'];
				$sorgu = $pdo->prepare("delete from ziyaretmesaj where Id='$id'");
				$sorgu->execute();
				if($sorgu->rowCount()>0){
						echo '<div class="text-danger">Mesaj Kaldırıldı</div>';
					}
					else
						echo '<div class="text-danger">Bir Sorun oluştu</div>';
			}
			else if(isset($_POST['guncelle'])){
				$id=$_POST['id'];
					$mesaj= $_POST['mesaj'];
					$ad= $_POST['ad'];
					$soyad=$_POST['soyad'];
					$baslik= $_POST['baslik'];
					$email= $_POST['email'];
					$kAdi =$_SESSION['id'];
					$zaman = date('Y-m-d');
					$sorgu = $pdo->prepare("update ziyaretmesaj  set Ad=?,Soyad=?,Eposta=?,Baslik=?,Mesaj=?,Zaman=?,YoneticiId=? where Id='$id'");
					$sorgu->bindParam(1,$ad,PDO::PARAM_STR);
					$sorgu->bindParam(2,$soyad,PDO::PARAM_STR);
					$sorgu->bindParam(3,$email,PDO::PARAM_STR);
					$sorgu->bindParam(4,$baslik,PDO::PARAM_STR);
					$sorgu->bindParam(5,$mesaj,PDO::PARAM_STR);
					$sorgu->bindParam(6,$zaman,PDO::PARAM_STR);
					$sorgu->bindParam(7,$kAdi,PDO::PARAM_STR);
					$sorgu->execute();
					if($sorgu->rowCount()>0){
						echo '<div class="container text-lg-left text-info">Güncelleme Başarılı</div>';
						
					}
					else{
						echo '<div class="container text-lg-left text-danger">Birşey ters gitti</div>';
					}
				
			}
		?>
	</h3>

	<h2><a href="/webprog-uyg15/">Mesajlara Dön</a></h2>
	<h2><a href="/webprog-uyg15/cikis.php">Çıkış Yap</a></h2>
	<form method="POST">
		<?php

			$sorgu = $pdo->prepare("select * from ziyaretmesaj order by Id desc");
			$sorgu->execute();
			foreach($sorgu as $value): 
		?>
		<div class="container">
			<form method=post>
			<div class="form-group">
					<input type="hidden" name="id" value="<?= $value['Id']; ?>" hidden >
				</div>
				<div class="form-group">
					<label>Zaman Damgası:</label>			
					<input type="text" name="zaman" class="form-control" value="<?= $value['Zaman']; ?>" disabled >
				</div>
				<div class="form-group">
					<label>Gönderici Adı:</label>			
					<input type="text" name="ad" class="form-control" value="<?= $value['Ad']; ?>"  >
				</div>
				<div class="form-group">
					<label>Gönderici Soyad:</label>			
					<input type="text" name="soyad"  class="form-control" value="<?= $value['Soyad']; ?>"  >
				</div>
				<div class="form-group">
					<label>Gönderici E-Posta:</label>			
					<input type="email" name="email"  class="form-control" value="<?= $value['Eposta']; ?>"  >
				</div>
				<div class="form-group">
					<label>Başlık</label>			
					<input type="text" name="baslik"  class="form-control" value="<?= $value['Baslik']; ?>"  >
				</div>
				<div class="form-group">
					<label>Gönderici Mesaj:</label>
					<textarea class="form-control"  class="form-control" name="mesaj" rows="3"><?= $value['Mesaj']; ?></textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
					<button type="submit" name="sil"  class="btn btn-danger">Sil</button>
				</div>
			</form>
		</div>
		<?php endforeach; ?>
	</form>
</body>
</html>