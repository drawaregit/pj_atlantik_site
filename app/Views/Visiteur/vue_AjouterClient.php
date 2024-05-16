<h2><?php echo $TitreDeLaPage ?></h2>
<?php
if ($TitreDeLaPage == 'Erreur saisie!')
  echo service('validation')->listErrors(); // affichage liste des erreurs, suite à erreur validation

echo form_open('ajouterclient') // ajouterproduit = entrée route vers Administrateur:ajouterProduit (!!)
?>


<?php echo csrf_field(); ?>

<label for="txtNom">Nom</label>
<input type="input" name="txtNom" value="<?php echo set_value('txtNom'); ?>" /><br />

<label for="txtPrenom">Prénom</label>
<input type="input" name="txtPrenom" value="<?php echo set_value('txtPrenom'); ?>" /><br />

<label for="txtAdresse">Adresse</label>
<input type="input" name="txtAdresse" value="<?php echo set_value('txtAdresse'); ?>" /><br />

<label for="txtCodePostal">Code Postal</label>
<input type="input" name="txtCodePostal" value="<?php echo set_value('txtCodePostal'); ?>" /><br />

<label for="txtVille">Ville</label>
<input type="input" name="txtVille" value="<?php echo set_value('txtVille'); ?>" /><br />

<label for="txtNumFixe">Numero de téléphone fixe</label>
<input type="input" name="txtNumFixe" value="<?php echo set_value('txtNumFixe'); ?>" /><br />

<label for="txtNumMobile">Numero de téléphone mobile</label>
<input type="input" name="txtNumMobile" value="<?php echo set_value('txtNumMobile'); ?>" /><br />

<label for="txtMel">Adresse Mail</label>
<input type="email" name="txtMel" value="<?php echo set_value('txtMel'); ?>" /><br />

<label for="txtMDP">Mot de Passe</label>
<input type="password" name="txtMDP" value="<?php echo set_value('txtMDP'); ?>" /><br />

<input type="submit" name="submit" value="Creer un compte!" />
<?php echo form_close(); ?>