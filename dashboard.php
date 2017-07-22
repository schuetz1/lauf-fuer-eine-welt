<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>Lauf für eine Welt</title>
</head>

<link href="style/main.css" type="text/css" rel="stylesheet">
<script src="https://use.fontawesome.com/7128a2f6c2.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<body>
<div class="container">
    <div class="header">
        <nav>
            <img class="img-responsive lepra-img pull-left" src="img/Logo.jpg" width="200px">
            <img class="img-responsive pull-right" src="img/Lauf-Logo.png" width="50px">
        </nav>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                require 'Helper/DatabaseHelper.php';
                $database = new \KarstenScripts\DatabaseHelper();
                require 'Helper/LaufData.php';
                echo '<div class="col-md-3 laufdata"><p> Aktueller Stand</p><hr><p class="lauf-numbers">' . $laufdata['total'] . ' Kilometer</p></div>';
                echo '<div class="col-md-3 laufdata"><p>Fehlende Kilometer</p><hr><p class="lauf-numbers">' . $laufdata['missing'] . ' Kilometer</p></div>';
                echo '<div class="col-md-3 laufdata"><p>Gelaufene 3 Kilometer Strecken</p><hr><p class="lauf-numbers">' . $laufdata['drei'] . ' Mal</p></div>';
                echo '<div class="col-md-3 laufdata"><p>Gelaufene 5 Kilometer Strecken</p><hr><p class="lauf-numbers"> ' . $laufdata['fuenf'] . ' Mal</p></div>';
                ?>
            </div>
            <div class="col-md-12">
                <div id="getting-started"></div>
                <script type="text/javascript">
                    $("#getting-started")
                        .countdown("2017/01/01", function(event) {
                            $(this).text(
                                event.strftime('%D days %H:%M:%S')
                            );
                        });
                </script>
            </div>
        </div>
    </div>

    <div class="footer pull-right">
        <a onclick="resetHard(1)">Zurücksetzen &#149;</a>
        <a href="/counter.html">Zähler</a>
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script language="javascript" type="text/javascript" src="js/main.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>