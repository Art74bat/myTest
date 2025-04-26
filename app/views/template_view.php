<?php 
    $back = (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:"http://test/";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <style>
            .top{
                height: 646px;
                padding-top: 218px;
                background-image: url('/../app/images/jpg/<?= $data[0]['image'] ?>');
                background-size: cover;
                background-position: 50% 46%;
                background-repeat: no-repeat;
            }
        </style>
        <link rel="stylesheet" href="/../app/css/style.css" />
    </head>
    <body>
        <div class="container">
            <header class="header">
                <div class="logo">
                    <picture class="pic">
                        <img class="logo__img" src="/../app/images/logo.png" alt="logo" />
                    </picture>
                    <span class="logo__text">Галактический <br> вестник</span>
                </div>
            </header>
            <main class="main"> 
                <?php include "app/views/".$content_view; ?>      
            </main>
            <footer class="footer">
                <span class="footer__content">© 2023 — 2412 «Галактический вестник»</span>
            </footer>
        </div>
    </body>
</html>