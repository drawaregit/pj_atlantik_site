
<?php

echo '<h2>'.$TitreDeLaPage.'</h2>';

// echo '<img src="'.img_url($uneLiaison->image).'" />'; //retourne l'url de l'image (cf. assets)

// OU, sans utiliser le helper assets :
// echo '<img src="'.base_url().'/assets/images/'.$unProduit->image.'"/>';
foreach ($uneLiaison as $ligne): ?>
    <?= $ligne->CATEGORIELETTRE; ?> <?= $ligne->CATEGORIELIBELLE; ?>     <?= $ligne->TYPECATEGORIE; ?><?= $ligne->NUMEROTYPE; ?> - <?= $ligne->CATEGORIELIBELE; ?> <?= $ligne->DATEDEBUT; ?>/<?= $ligne->DATEFIN; ?><br>
    <?php endforeach; ?>
    <?php
echo '<table>';

echo '<tr><td>Référence</td><td>'.$unProduit->reference.'</td></tr>';
echo '<tr><td>Libellé</td><td>'.$unProduit->libelle.'</td></tr>';
echo '<tr><td>Prix HT</td><td>'.$unProduit->prixht.'</td></tr>';
echo '<tr><td>Quantité en stock</td><td>'.$unProduit->quantiteenstock.'</td></tr>';
echo '</table>';
echo '<p>'.anchor('voirlesproduits','Retour à la liste de toutes les liaisons').'</p>';