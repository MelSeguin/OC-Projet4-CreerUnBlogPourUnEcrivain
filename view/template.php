<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <!-- viewport -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <!-- FEUILLES DE STYLE CSS -->
      <link rel="stylesheet"  href="public/css/style.css"/>
      <link rel="stylesheet"  href="public/css/media.css"/>
      <!-- CDN pour la police de caractère Indie Flower-->
      <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
      <!-- cdn pour la police de caractère Montserrat-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500&display=swap" rel="stylesheet">
      <!-- CDN FONTAWESOME POUR LES ICONES -->
      <script src="https://kit.fontawesome.com/a9d75fc71e.js" crossorigin="anonymous"></script>
      <!-- SCRIPT POUR TINYMCE -->
      <script src="https://cdn.tiny.cloud/1/jzcfuyrnlc5gpievz8klyceb6h7ri9pt2yovxkool9spp3vq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
        tinymce.init({
          selector: '#content',
          font_formats: 'Montserrat=montserrat, sans-serif; Indie Flower=indie flower, cursive;',
          height: 350,
          plugins: 'table wordcount',
          content_css: '//www.tiny.cloud/css/codepen.min.css',
          content_style: '.left { text-align: left; } ' +
          'img.left { float: left; } ' +
          'table.left { float: left; } ' +
          '.right { text-align: right; } ' +
          'img.right { float: right; } ' +
          'table.right { float: right; } ' +
          '.center { text-align: center; } ' +
          'img.center { display: block; margin: 0 auto; } ' +
          'table.center { display: block; margin: 0 auto; } ' +
          '.full { text-align: justify; } ' +
          'img.full { display: block; margin: 0 auto; } ' +
          'table.full { display: block; margin: 0 auto; } ' +
          '.bold { font-weight: bold; } ' +
          '.italic { font-style: italic; } ' +
          '.underline { text-decoration: underline; } ' +
          '.example1 {} ' +
          '.tablerow1 { background-color: #D3D3D3; }',
          formats: {
            alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left' },
            aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center' },
            alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right' },
            alignfull: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full' },
            bold: { inline: 'span', classes: 'bold' },
            italic: { inline: 'span', classes: 'italic' },
            underline: { inline: 'span', classes: 'underline', exact: true },
            strikethrough: { inline: 'del' },
            customformat: { inline: 'span', styles: { color: '#00ff00', fontSize: '20px' }, attributes: { title: 'My custom format'} , classes: 'example1'}
          },
          style_formats: [
            { title: 'Custom format', format: 'customformat' },
            { title: 'Align left', format: 'alignleft' },
            { title: 'Align center', format: 'aligncenter' },
            { title: 'Align right', format: 'alignright' },
            { title: 'Align full', format: 'alignfull' },
            { title: 'Bold text', inline: 'strong' },
            { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
            { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
            { title: 'Badge', inline: 'span', styles: { display: 'inline-block', border: '1px solid #2276d2', 'border-radius': '5px', padding: '2px 5px', margin: '0 2px', color: '#2276d2' } },
            { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' },
            { title: 'Image formats' },
            { title: 'Image Left', selector: 'img', styles: { 'float': 'left', 'margin': '0 10px 0 10px' } },
            { title: 'Image Right', selector: 'img', styles: { 'float': 'right', 'margin': '0 0 10px 10px' } },
          ]
        });
      </script>
    </head>

    <body>
      <header>
        <div class="header-title">
          <h1 class="main-title"> Billet simple pour l'Alaska</h1>
            <p class="main-subtitle"> un roman de Jean Forteroche <i class="fas fa-feather-alt"></i></p>
        </div>
      </header>
      <section class="page-content">
        <?= $content ?>
      </section>
      <footer>
      </footer>
    </body>
</html>
