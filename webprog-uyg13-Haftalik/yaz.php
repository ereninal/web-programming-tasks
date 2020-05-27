<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Ziyaretçi Defteri - Mesaj Yaz</title>
	<style>
		body {
			font: 10pt verdana;
			background: #c5e5fa;
		}

		td {
			font: 10pt verdana;
		}


		a,
		a:link {
			color: #0000ff;
		}

		a:visited {
			color: #800080;
		}

		a:hover,
		a:active {
			color: #ff0000;
		}

		#tasiyici {
			margin: auto;
			width: 800px;
			background: #ffffff;
			padding: 5px 5px 0 5px;
		}

		#ust_bolum {
			padding: 5px;
			background: #5bbffa url(data:image/gif;base64,R0lGODlhCQBOAOYAAAWG1QyL2AiJ11C39Uex8Q6M2Vq++Uu08xSQ3Den6juq7Dam6huV3z6s7RqU3i+i51a7+A+N2U629BaS3Sac41i8+FW791u/+hmU3kKu7yGZ4Uiy8j2r7RWR3EWw8FG49iKZ4jCi5yme5Sid5AWH1gSG1QuK2DGj6Cyg5lu++VK59lO59h6X4Dio6zqp7EGt7kqz8gaH1iWb4wqK1z+s7iqf5Q2M2Uy18xCO2jSl6RKP2y2h5h+Y4UOv8COa4lS69xGO2hiT3Uax8ROQ21e8+E+39R2W30219DOk6QmJ1weI1lm9+QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAAAALAAAAAAJAE4AAAf/gCWCg4MAhoeHJIqLizGOj49KkpOUlZMCmJmZSZydnTOgoaEmpKWlAaipqTasra0FsLGxEbS1tTi4ublAvL29OsDBwUPExcUIyMnJHczNzRPQ0dFB1NXVGNjZ2Q7c3d0M4OHhRuTl5Szo6ek87O3tGvDx8SD09fU++Pn5Mvz9/RQAAwYcQbBgQREIEyaswbBhQxQQI0bcQbFixQcYM2YMwbFjxxMgQ4ZEQrJkyRwoU6ZcwLJlywQwY8ZsQbNmTRc4c+ZUwLNnTw5AgwZtQLRoURpIkyZ9wbRp0wxQo0btQbVqVQ9Ys2YVwrVrVwJgw4bdQLZsWRho06Y9wLZt2xtwTuPGPUK3bl0JePPmLcK3b98BgAMH/kC4cGEViBMnXsG4ceMfkCNHtkC5cmUImDNnJsK5c+cKoEOHXkK6tOnTpQ2oXr06hevXry/Inj07EAA7) repeat-x;
			text-align: center;
		}

		#ust_bolum h1 {
			padding: 5px 0 10px 0;
			margin: 0;
			color: #ffffff;
			font: italic bold 24pt georgia;
		}

		#ust_bolum #ust_metin {
			background: #57bcf8;
			border: 1px solid #77c6f5;
			color: #fff;
			margin: 5px 0 0 0;
			padding: 5px;
		}

		#govde {
			display: block;
			overflow: visible;
		}

		#govde .mesajoku_govde {
			margin: 5px 0 0 0;
			padding: 0;
			border: 1px solid #c8dcfe;
			display: block;
			overflow: visible;
		}

		#govde .mesajno_gonderen_tarih {
			display: block;
			overflow: visible;
			margin: 0;
			padding: 3px 0 0 0;
			background: #c3eafd;
			border-bottom: 4px solid #dbf6ff;
		}

		#govde .mesajoku_mesajno {
			float: left;
			padding: 2px 5px 6px 5px;
			color: #0b67a3;
		}

		#govde .mesajoku_gonderen {
			float: left;
			color: #0b67a3;
			font-weight: bold;
			padding: 2px 0 6px 0;
		}

		#govde .mesajoku_eposta_website {
			clear: both;
			display: block;
			color: #0b67a3;
			font-size: 10px;
			padding: 3px 0 2px 5px;
			background: #dbf6ff;
		}

		#govde .mesajoku_eposta_website span {
			margin-left: 20px;
		}

		#govde .mesajno_gonderen_tarih .son {
			clear: both;
		}

		#govde .mesajoku_tarihsaat {
			float: right;
			width: 150px;
			font-size: 8pt;
			color: #0b67a3;
			text-align: right;
			padding: 2px 5px 0 0;
		}

		#govde .mesajoku_tarihsaat .saat {
			font-size: 8pt;
		}

		#govde .mesajoku_metin {
			overflow: hidden;
			display: block;
			padding: 5px 5px 10px 5px;
			color: #014b7c;
			line-height: 150%;
		}

		#govde .mesajoku_metin .cevap_baslik {
			display: block;
			margin-top: 10px;
			padding: 0 5px 0 5px;
			background: #fdfadd;
			font-size: 7.5pt;
			border: 1px solid #fcee83;
		}

		#govde .mesajoku_metin .cevap {
			display: block;
			padding: 5px;
			background: #fdfbeb;
			border-left: 1px solid #fcee83;
			border-right: 1px solid #fcee83;
			border-bottom: 1px solid #fcee83;
		}

		#govde .mesajoku_metin .yonetim {
			display: block;
			margin-top: 10px;
			padding: 0;
			background: #fff;
			border-top: 1px solid #3caeec;
			font-family: verdana;
			line-height: 130%;
		}

		#defteriokukutusu_siteyedon {
			display: block;
			background: #e7f5fe;
			margin: 5px 0 5px 0;
			overflow: auto;
			font-weight: bold;
		}

		#defteriokukutusu_siteyedon #defterioku_kutusu {
			background: #e7f5fe;
			display: block;
			background: #e7f5fe;
			margin: 0;
			padding: 5px;
			float: left;
			width: 100px;
		}

		#defteriokukutusu_siteyedon #siteyedon {
			background: #e7f5fe;
			display: block;
			padding: 5px;
			float: right;
			width: 200px;
			text-align: right;
		}

		#defteriokukutusu_siteyedon .son {
			clear: both;
			margin: 0;
			padding: 0;
			height: 0px;
			font-size: 1px;
		}

		#deftereyazkutusu_siteyedon {
			display: block;
			font-weight: bold;
		}

		#deftereyazkutusu_siteyedon #deftereyazkutusu {
			display: block;
			float: left;
			width: 100px;
			padding: 5px;
		}

		#deftereyazkutusu_siteyedon .son {
			clear: both;
		}

		#deftereyazkutusu_siteyedon #siteyedon {
			display: block;
			padding: 5px;
			float: right;
			width: 200px;
			text-align: right;
		}

		#kaydedildi_mesaj_kutusu {
			margin: 50px 0 50px 0;
			padding: 20px 0 20px 0;
			text-align: center;
			background: #f2fbff;
			border: 1px solid #d5f3ff;
		}

		#kaydedildi_mesaj_kutusu h1 {
			font: bold 16pt tahoma;
			color: #014b7c;
		}

		#deftereyazkutusu_sayfalinkleri {
			display: block;
		}

		#deftereyazkutusu_sayfalinkleri #deftereyazkutusu {
			display: block;
			float: left;
			width: 100px;
			font-weight: bold;
			padding: 5px;
		}

		#deftereyazkutusu_sayfalinkleri .son {
			clear: both;
		}

		#deftereyazkutusu_sayfalinkleri #sayfa_linkleri {
			display: block;
			padding: 5px;
			margin: 0;
			float: right;
			width: 400px;
			text-align: right;
		}

		#deftereyazkutusu_sayfalinkleri #sayfa_linkleri .bu_sayfa {
			font-weight: bold;
		}

		#hata {
			border: 2px solid #ff0000;
			padding: 7px;
			text-align: center;
			width: 80%;
			margin: 5px auto 5px auto;
			color: red;
		}


		#govde .son {
			clear: both;
		}

		#gdir {
			padding-top: 7px;
			margin: 20px -5px 0 -5px;
			border-top: 20px solid #c5e5fa;
		}


		#alt_bolum {
			background: #e7f5fe;
			border-top: 30px solid #c5e5fa;
			margin: 10px -5px 0 -5px;
			padding: 7px;
			font-size: 11px;
		}

		#alt_bolum .yazigibi {
			font: normal 11px verdana;
			color: #000;
			text-decoration: none;
		}

		form{
			display: flex;
			flex-direction: column;
			width: fit-content;
			margin-right: auto;
			margin-left: auto;
		}

		form input, form textarea{
			margin: 10px;
			padding: 10px;
			width: 100%;
		}
	</style>
</head>

<body>
	<div id="tasiyici">
		<div id="ust_bolum">
			<h1>Örnek Ziyaretçi Defteri</h1>
			<div id="ust_metin">Örnek ziyaretçi defterimize yazdığınız için teşekkür ederiz.</div>
		</div>

		<div id="govde">

			<script language="javaScript" type="text/javascript">
				function ifade_ekle(veri) {
					document.mesajform.mesaj.value = document.mesajform.mesaj.value + veri;
					textsayici();
					document.mesajform.mesaj.focus();
				}

				function textsayici() {
					if (document.mesajform.mesaj.value.length > 1500) {
						document.mesajform.mesaj.value = document.mesajform.mesaj.value.substring(0, 1500);
					} else {
						document.mesajform.sayac.value = 1500 - document.mesajform.mesaj.value.length;
					}
				}
			</script>

			<div id="defteriokukutusu_siteyedon">
				<div id="defterioku_kutusu"><a href="/webprog-uyg13-Haftalik/">Mesajları oku</a></div>
				<div id="siteyedon"><a href="/webprog-uyg13-Haftalik/">Siteye geri dön</a></div>
				<div class="son"></div>
			</div>

			<form method="POST">
				<label for="ad">
					Ad:
					<input type="text" autocomplete="name" required name="ad"  placeholder="İsminiz">
				</label>
				
				<label for="soyad">
					Soyad:
					<input type="text" autocomplete="family-name" required name="soyad"  placeholder="Soyisminiz">
				</label>

				<label for="email">
					E-Posta:
					<input type="email" autocomplete="email" required name="email" placeholder="E-Posta Adresiniz">
				</label>

				<label for="baslik">
					Mesajınızın Başlığı:
					<input type="text" name="baslik" required  required placeholder="Mesajınızın Başlığı">
				</label>
				
				<label for="mesaj">
					Mesajınız:
					<textarea 
						name="mesaj"
						required
						cols="30"
						rows="10"
						placeholder="Mesajınızı Buraya Yazınız"
						style="resize: vertical; max-height: 20vh; min-height: 10vh;"></textarea>
				</label>
				
				<input type="submit" value="Gönder">
			</form>
			
			<?php
			if($_POST)
			{
				$s=0;
					$data =file_get_contents('mesaj.json');
					$jeson = json_decode($data,true);
					foreach($jeson as $message){
						$s++;
					}
					$s++;
					
					if(isset($_POST['ad'], $_POST['mesaj'])){

						$mesaj= array(
							'id' => $s,
							'ad' => $_POST['ad'],
							'soyad' => $_POST['soyad'],
							'eposta' => $_POST['email'],
							'baslik' => $_POST['baslik'],
							'mesaj' => $_POST['mesaj'],
							'tarihzaman' => date('r', time())	
						);
						array_push($jeson,$mesaj);
						file_put_contents('mesaj.json',json_encode($jeson,JSON_UNESCAPED_UNICODE),FILE_TEXT);
						echo 'Eklendi';
					}	
						else
							echo 'Mesaj Gönderimi Başarısız';
			}	
			?>
		</div>
	</div>
</body>

</html>