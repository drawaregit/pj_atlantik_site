<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>OUI</h1>

<div class="row">
<div class="col-sm-2 bg-dark text-white">
<table style="width:100%">
    <?php foreach ($donneesSecteurs as $ligne): ?>
        <tr >
            <td ><a href="/voirhoraires/<?= $ligne->NOSECTEUR; ?>"><?= $ligne->NOM; ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<div class="col-sm-10">

<?php 
if ($TitreDeLaPage != "Selectionner secteur") {
    echo '<p>Sélectionner la liaison, et la date souhaitée</p><br>';
    echo form_open("voirlesliaisons");
    echo csrf_field();
    echo '<select id="liaison" name="liaison">';
    foreach ($donneesLiaison as $ligne) {
        echo '<option value="'. $ligne->numeroLiaison .'">' . $ligne->NomPortDepart . ' - ' . $ligne->NomPortArrivee . '</option>';
    }
    echo '</select>';
    echo '<input type="date" id="birthday" name="birthday">';
    echo form_submit('btnOK','Rechercher');
    echo form_close();
    echo '<p>Traversée ici<br>Traversée pour XX/XX/XXXX. Sélectionner la traversée souhaitée. </p>';
} else {
    echo '<p>Selectionnez un secteur.</p>';
}
?>




</div>
</body>
