<h2><?php echo $TitreDeLaPage ?></h2>

<!--

$TitreDeLaPage : variable récupérée depuis le contrôleur

$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')

 -->

<?php foreach ($lesLiaisons as $uneLiaison) :

echo '<h3>'.anchor('voirlesliaisons/'.$uneLiaison->NOLIAISON, $uneLiaison->NomPortDepart . ' - ' . $uneLiaison->NomPortArrivee).'</h3>';


endforeach ?>

<p>Pour afficher le détail d'un produit, cliquer sur son libellé</p>