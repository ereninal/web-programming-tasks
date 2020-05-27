<?php
		@session_start();
		if($_SESSION['giris']==null){
			echo 'Sayafayı görmeye yetkiniz yok';
			exit();
		}
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
			$data =file_get_contents('mesaj.json');
			$json = json_decode($data,true);
			
			unset($data);
			if (isset($_POST['sil'])) {
				$id=$_POST['id'];
				$s=0;
				foreach ($json as $value) {
					if($id == $value['id']){
						unset($json[$s]);
						echo $s.'<br>'.$id;
						echo '<div class="text-danger">Mesaj Kaldırıldı</div>';
					}
					$s++;
				}
				file_put_contents('mesaj.json',json_encode($json));
				unset($json);
			}
			else if(isset($_POST['guncelle'])){
				foreach ($json as $value) {
					if((int)$_POST['id']==$value['id']){
						$json[array_search((int)$_POST['id'],$json)] = array(
							'id' => (int)$_POST['id'],
							'ad' =>	$_POST['ad'],
							'soyad' =>$_POST['soyad'],
							'eposta'=> $_POST['email'],
							'baslik' => $_POST['baslik'],
							'mesaj' => $_POST['mesaj'],
							'tarihzaman' =>date('r', time())
						);
						file_put_contents('mesaj.json',json_encode($json));
					}
					unset($json);
				}
				
			}
		?>
	</h3>

	<h2><a href="/webprog-uyg13-Haftalik/">Mesajlara Dön</a></h2>
	<h2><a href="/webprog-uyg13-Haftalik/cikis.php">Çıkış Yap</a></h2>
	<form method="POST">
		<?php

				$data =file_get_contents('mesaj.json');
				$jeson = json_decode($data,true);
				foreach($jeson as $value): 
		?>
		<div class="container">
			<form method=post>
			<div class="form-group">
					<input type="hidden" name="id" value="<?= $value['id']; ?>" hidden >
				</div>
				<div class="form-group">
					<label>Zaman Damgası:</label>			
					<input type="text" name="zaman" class="form-control" value="<?= $value['tarihzaman']; ?>" disabled >
				</div>
				<div class="form-group">
					<label>Gönderici Adı:</label>			
					<input type="text" name="ad" class="form-control" value="<?= $value['ad']; ?>"  >
				</div>
				<div class="form-group">
					<label>Gönderici Soyad:</label>			
					<input type="text" name="soyad"  class="form-control" value="<?= $value['soyad']; ?>"  >
				</div>
				<div class="form-group">
					<label>Gönderici E-Posta:</label>			
					<input type="email" name="email"  class="form-control" value="<?= $value['eposta']; ?>"  >
				</div>
				<div class="form-group">
					<label>Başlık</label>			
					<input type="text" name="baslik"  class="form-control" value="<?= $value['baslik']; ?>"  >
				</div>
				<div class="form-group">
					<label>Gönderici Mesaj:</label>
					<textarea class="form-control"  class="form-control" name="mesaj" rows="3"><?= $value['mesaj']; ?></textarea>
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