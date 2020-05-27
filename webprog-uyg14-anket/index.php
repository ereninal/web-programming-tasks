<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <title>Anket</title>
</head>
<body>
    <header>
        <?php
          
            require_once(__DIR__.'./navbar.php');
            $anket = json_decode(file_get_contents("anket.dat"),JSON_UNESCAPED_UNICODE);
        ?>
    </header>
    <div class="container mt-4">
    
    <form  method="post">
    <canvas id="anket" width="800" height="400"></canvas>
        <div class="row ml-5 mt-2">
            <div class="col">
                <input class="form-check-input" type="radio" name="takim" id="exampleRadios2" value="Galatasaray">
                <label class="form-check-label" for="exampleRadios2">Galatasaray</label>
            </div>
            <div class="col">
                <input class="form-check-input" type="radio" name="takim" id="exampleRadios2" value="Fenerbahçe">
                <label class="form-check-label" for="exampleRadios2">Fenerbahçe</label>
            </div>
            <div class="col ml-2">
                <input class="form-check-input" type="radio" name="takim" id="exampleRadios2" value="Beşiktaş">
                <label class="form-check-label" for="exampleRadios2">Beşiktaş</label>
            </div>
            <div class="col">
                <input class="form-check-input" type="radio" name="takim" id="exampleRadios2" value="Trabzonspor">
                <label class="form-check-label" for="exampleRadios2">Trabzonspor</label>
            </div>
            <div class="col">
                <input class="form-check-input" type="radio" name="takim" id="exampleRadios2" value="Başakşehir SK">
                <label class="form-check-label" for="exampleRadios2">Başakşehir SK</label>
            </div>
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-secondary btn-block">Oy Ver</button>
        </div>
    </form>
    <?php 
        if($_POST)
        {
            if($_POST['takim'] !=null){
                echo $_POST['takim'].'<br>';
                //$anket = json_decode(file_get_contents("anket.dat"),JSON_UNESCAPED_UNICODE);
                $data = file_get_contents('anket.dat');
                $anket = json_decode($data, true);
                foreach ($anket as $key=> $value) {
                    if($value['ad']==$_POST['takim']){
                        echo $value['id'].$value['ad'].($value['oy']+1);
                            $anket[$key]['oy']++;
                        file_put_contents('anket.dat', json_encode($anket));
                    }
                }
            }
            
        }
    ?>
    <canvas id="anket" width="800" height="400"></canvas>
    <script>
       <?php 
            $anket = json_decode(file_get_contents("anket.dat"),JSON_UNESCAPED_UNICODE);
            $ad = array();
            $oy = array();
            foreach ($anket as $value) {
                array_push($ad,$value['ad']);
                array_push($oy,(int)$value['oy']);
            }
            
       ?>
        let kanvas = document.getElementById('anket');
        let grafik = new Chart(kanvas, {
        type: 'bar',
        data: {
            labels: <?= json_encode($ad); ?>,
            datasets: [{
                label: 'Takım Anketi',
                data: <?=json_encode($oy); ?>,
                backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)"
                ],
                borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)"
                ],
                borderWidth:1
            }]
        }
        });
    </script>
    </div>
</body>
</html>