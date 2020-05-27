<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Fonksiyon</title>
</head>
<body>
    <header>
        <?php
            require_once(__DIR__.'./navbar.php');
            function renklendirme(string $text, int $secim){
                $result_text = "";
                $letters = str_split($text);
                $vowels = array('ü','i','ö','o','a','e','ı','u');
                $consonants = array('b','c','ç','d','f','g','ğ','h','j','k','l','m','n','p','r','s','ş','t','v','y','z','x','w','q');
        
                foreach ($letters as $letter) {
                    switch ($secim) {
                        case 1:
                            if(in_array(strtolower($letter), $vowels))
                                $result_text .= '<span class="text-danger text-lg">'.$letter.'</span>';
                            else if(in_array(strtolower($letter), $consonants))
                                $result_text .= '<span class="text-primary text-lg">'.$letter.'</span>';
                            else
                                $result_text .= $letter;
                            break;
                            
                        case 2:
                            if (ord($letter)%2 == 0)
                                $result_text .= '<span class="text-danger text-lg">'.$letter.'</span>';
                            else if(ord($letter)%2 == 1)
                                $result_text .= '<span class="text-primary text-lg">'.$letter.'</span>';
                            else			
                                $result_text .= $letter;
                                
                        default:
                            break;
                    }
                }
        
                return $result_text;
            }
        ?>
    </header>
    <div class="container mt-4">
        <form method="post">
            <div class="frm-group">
                <textarea class="form-control is-invalid" name="cumle" id="cumle" placeholder="Cümle Girin" required></textarea>
            </div>
            <div class="frm-group mt-3">
            <select class="form-control" name ="secim" id="exampleFormControlSelect1">
                <option selected>Özellik Seçin</option>
                <option value ="1">Ünlü harfleri kırmızı ünsüz harfleri mavi</option>
                <option value ='2'>ASCII kodu tek olanları kırmızı çift olanları mavi</option>
            </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary mt-3 pt-2 pb-2 w-100 text-lg" value="Bul">
            </div>
        </form>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Paremetre</th>
           
            </tr>
        </thead>
        <tbody>
        <?php
           echo '<tr>';
           echo ' <th scope="col">1</th>';
            switch ((int)$_POST['secim']) {
                case 1:
                    echo '<th scope="col">'.renklendirme((string)$_POST['cumle'],1).'</th>';
                    break;
                
                case 2:
                    echo '<th scope="col">'.renklendirme((string)$_POST['cumle'],2).'</th>';
                    break;
            } 
            echo '</tr>';
        ?>
        </tbody>
        </table>


    </div>
</body>
</html>