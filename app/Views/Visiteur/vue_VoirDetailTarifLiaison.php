
<?php

echo '<h2>'.$TitreDeLaPage.'</h2>';

// echo '<img src="'.img_url($uneLiaison->image).'" />'; //retourne l'url de l'image (cf. assets)

// OU, sans utiliser le helper assets :
// echo '<img src="'.base_url().'/assets/images/'.$unProduit->image.'"/>';
foreach ($uneLiaison as $ligne): ?>
    <?= $ligne->CATEGORIELETTRE; ?> <?= $ligne->CATEGORIELIBELLE; ?>    | <?= $ligne->TYPECATEGORIE; ?> | <?= $ligne->NUMEROTYPE; ?> - <?= $ligne->CATEGORIELIBELE; ?>  |  <?= $ligne->DATEDEBUT; ?> / <?= $ligne->DATEFIN; ?> | <?= $ligne->tarif; ?>€<br>
    <?php endforeach; ?>
    <?php

echo '<p>'.anchor('voirlesliaisons','Retour à la liste de toutes les liaisons').'</p>';