<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
			<!-- CDN FONTAWESOME POUR LES ICONES -->
      <script src="https://kit.fontawesome.com/a9d75fc71e.js" crossorigin="anonymous"></script>
      <!-- SCRIPT POUR TINYMCE -->
      <script src="https://cdn.tiny.cloud/1/jzcfuyrnlc5gpievz8klyceb6h7ri9pt2yovxkool9spp3vq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
     	<script> tinymce.init({ selector: '#content', }); </script>
    </head>

    <body>
      <?= $content ?>
    </body>
</html>
