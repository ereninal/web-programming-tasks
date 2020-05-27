

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="yeni.php">Kişi Ekle<span class="sr-only">(current)</span></a>
            </li>
            </ul>
          
               
            <form  method="post" action="arama.php" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="giden" placeholder="İsim giriniz" aria-label="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" >Arama</button>
            </form>
        </div>
    </div>
</nav>
