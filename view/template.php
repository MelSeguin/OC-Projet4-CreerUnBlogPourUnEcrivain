<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <!-- CDN indie flower FONT -->
      <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
      <!-- CDN POUR LA FONT -->
      <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Cinzel:wght@400;700;900&family=Dancing+Script:wght@400;500;600;700&family=Great+Vibes&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Permanent+Marker&family=Satisfy&family=Special+Elite&display=swap" rel="stylesheet">
      <!-- CDN FONTAWESOME POUR LES ICONES -->
      <script src="https://kit.fontawesome.com/a9d75fc71e.js" crossorigin="anonymous"></script>
      <!-- FEUILLE DE STYLE CSS -->
      <link rel="stylesheet"  href="public/css/style.css"/>
      <!-- SCRIPT POUR TINYMCE -->
      <script src="https://cdn.tiny.cloud/1/jzcfuyrnlc5gpievz8klyceb6h7ri9pt2yovxkool9spp3vq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script> tinymce.init({ selector: '#content', }); </script>
    </head>

    <body>
      <header>
        <div class="header-title">
          <h1 class="main-title"> Billet simple pour l'Alaska</h1>
            <p class="main-subtitle"> un roman de Jean De Forteroche <i class="fas fa-feather-alt"></i></p>
        </div>
      </header>
      <?= $content ?>

      <!-- <footer>
        <div class="footer"></div>
      </footer> -->
    </body>
</html>
