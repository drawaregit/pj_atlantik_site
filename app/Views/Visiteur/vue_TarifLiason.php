<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>Tarifs des liaisons </h1>

<?php foreach ($donneesTarifs as $ligne): ?>
    <?= $ligne->CATEGORIELETTRE; ?> <?= $ligne->CATEGORIELIBELLE; ?>     <?= $ligne->TYPECATEGORIE; ?><?= $ligne->NUMEROTYPE; ?> - <?= $ligne->CATEGORIELIBELE; ?> <?= $ligne->DATEDEBUT; ?>/<?= $ligne->DATEFIN; ?><br>
    <?php endforeach; ?>

<div class="container">
<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2">Catégorie</th>
            <th rowspan="2">Type</th>
            <?php foreach ($donneesPeriodes as $ligne): ?>
            <th rowspan="1"><?= $ligne->DATEDEBUT; ?>/<?= $ligne->DATEFIN; ?></th>
        <?php endforeach; ?>
            
        </tr>
    </thead>
    
<tbody>
        <?php foreach ($donneesTarifs as $ligne): ?>
            <tr>
        <td>
        <?= $ligne->NOLIAISON; ?> <?= $ligne->CATEGORIELETTRE; ?> <?= $ligne->CATEGORIELIBELLE; ?>
        </td>
        <td>
        <?= $ligne->TYPECATEGORIE; ?><?= $ligne->NUMEROTYPE; ?> - <?= $ligne->CATEGORIELIBELE; ?>
        </td>
        <?php foreach ($donneesTarifs as $ligne): ?>
            <td>
        <?= $ligne->TARIF; ?>
        </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
</div>
</body>
