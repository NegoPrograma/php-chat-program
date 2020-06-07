<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/template.css">
    <title>Document</title>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  <script src="/assets/js/main.js"></script>
</head>
<body>
    <div class="enviroment" style="background-color:<?php 
    if(isset($_SESSION['area'])){
      if($_SESSION['area']  ==  'suporte')
        echo  '#145';
      else
        echo  '#780';     
    } else{
      echo  '#000';     
    }
      ?>;"></div>
    <?php $this->loadView($viewName,$viewData); ?>

    <footer>Rodapé foda</footer>
</body>
</html>