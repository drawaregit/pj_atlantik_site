<br><br><br>
<?php
if ($clientAjoute) { // true (1) si ajout, false (0) sinon
    echo 'Ajout produit effectué.';
} else {
    echo 'Echec ajout produit.';
}
?>
<br><br><br>
<p><a href="<?php echo site_url('creationcompte') ?>">Retour à la page de création de compte.</a></p>