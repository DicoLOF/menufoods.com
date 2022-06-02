<html>
    <head>

    </head>
    <body>
        <a class="fa fa-adn">1</a>
        <a class="fa fa-amazon">2</a>
        <a class="fa fa-ambulance">3</a>
        <a class="fa fa-anchor">4</a>
        <a class="fa fa-android">5</a>
        <a class="fa fa-angellist">6</a>
        <a class="fa fa-angellist">7</a>
        <a class="fa fa-angle-double-down">8</a>
        <a class="fa fa-angle-double-left">9</a>
        <a class="fa fa-angle-double-right">10</a>
        <a class="fa fa-angle-double-up">11</a>
        <a class="fa fa-apple">12</a>
        <a class="fa fa-archive">13</a>
        <a class="fa fa-arrow-circle-down"></a>
        <a class="fa fa-asterisk"></a>
        <a class="fa fa-at"></a>
        <a class="fa fa-automobile"></a>
        <a class="fa fa-backward"></a>
        <a class="fa fa-balance-scale"></a>
        <a class="fa fa-ban"></a>
        <a class="fa fa-bank"></a>
        <a class="fa fa-bar-chart"></a>
        <a class="fa fa-barcode"></a>
        <a class="fa fa-bars"></a>
        <a class="fa fa-battery-2"></a>
        <a class="fa fa-bed"></a>
        <a class="fa fa-beer"></a>
        <a class="fa fa-behance"></a>
        <a class="fa fa-behance-square"></a>
        <a class="fa fa-bell"></a>
        <a class="fa fa-bicycle"></a>
        <a class="fa fa-binoculars"></a>
        <a class="fa fa-pie-chart"></a>
        <a class="fa fa-pulse"></a>
        <a class="fa fa-cc-amex"></a>
        <a class="fa fa-cc-diners-club"></a>
        <a class="fa fa-cloud"></a>
        <a class="fa fa-cogs"></a>
        <a class="fa fa-compress"></a>
        <a class="fa fa-creative-commons"></a>
        <a class="fa fa-delicious"></a>
        <a class="fa fa-drupal"></a>
        <a class="fa fa-empire"></a>
        <a class="fa fa-eyedropper"></a>
        <a class="fa fa-flask"></a>
        <a class="fa fa-flickr"></a>
        <a class="fa fa-fw"></a>    
        <a class="fa fa-fw"></a> 
        <a class="fa fa-"></a>
        <a class="fa fa-forumbee"></a>
        <a class="fa fa-genderless"></a>
        <a class="fa fa-globe"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>                  
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <a class="fa fa-"></a>
        <?php
        $arquivo = "log.txt";
        $abrir_arq = fopen($arquivo, 'r+');
        while (!feof($abrir_arq)) {
            ?>                      
            <i class="fa fa-desktop"></i> <?php echo fgets($abrir_arq) . "<br />"; ?>
        <?php } ?>  
    </body>
</html>