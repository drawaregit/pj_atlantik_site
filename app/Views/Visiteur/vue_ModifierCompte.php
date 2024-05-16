<h2><?php echo $TitreDeLaPage ?></h2>
<?php
if ($TitreDeLaPage == 'Erreur saisie!')
  echo service('validation')->listErrors(); // affichage liste des erreurs, suite à erreur validation

echo form_open('modifiercompte') // ajouterproduit = entrée route vers Administrateur:ajouterProduit (!!)
?>


<?php echo csrf_field(); ?>

<label for="txtNom">Nom</label>
<input type="input" name="txtNom" value="<?= session()->get('nom') ?> <?php echo set_value('txtNom'); ?>" /><br />

<label for="txtPrenom">Prénom</label>
<input type="input" name="txtPrenom" value="<?= session()->get('prenom') ?> <?php echo set_value('txtPrenom'); ?>" /><br />

<label for="txtAdresse">Adresse</label>
<input type="input" name="txtAdresse" value="<?= session()->get('adresse') ?><?php echo set_value('txtAdresse'); ?>" /><br />

<label for="txtCodePostal">Code Postal</label>
<input type="input" name="txtCodePostal" value="<?= session()->get('codepostal') ?><?php echo set_value('txtCodePostal'); ?>" /><br />

<label for="txtVille">Ville</label>
<input type="input" name="txtVille" value="<?= session()->get('ville') ?><?php echo set_value('txtVille'); ?>" /><br />

<label for="txtNumFixe">Numero de téléphone fixe</label>
<input type="input" name="txtNumFixe" value="<?= session()->get('telfixe') ?><?php echo set_value('txtNumFixe'); ?>" /><br />

<label for="txtNumMobile">Numero de téléphone mobile</label>
<input type="input" name="txtNumMobile" value="<?= session()->get('telmobile') ?><?php echo set_value('txtNumMobile'); ?>" /><br />

<label for="txtMel">Adresse Mail</label>
<input type="email" name="txtMel" value="<?= session()->get('mail') ?><?php echo set_value('txtMel'); ?>" /><br />

<label for="txtMDP">Mot de Passe</label>
<input type="password" name="txtMDP" value="<?= session()->get('mdp') ?><?php echo set_value('txtMDP'); ?>" /><br />

<input type="submit" name="submit" value="Modifier mon Compte." />
<?php echo form_close(); ?>