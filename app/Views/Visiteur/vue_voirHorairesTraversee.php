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
<div class="col-sm-1">
<table style="width:100%">
    <?php foreach ($donneesSecteurs as $ligne): ?>
        <tr >
            <td ><a href="/voirhoraires/<?= $ligne->NOSECTEUR; ?>"><?= $ligne->NOM; ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<div class="col-sm-11">
<?php 
if (empty($_GET)){
  echo'<p>nan ya pas de get</p>';
//do something if $_GET is set 
} else{
  echo'<p>oui ya un truc</p>';
//do something if $_GET is NOT set 
} ?>
<p>Sélectionner la liaison, et la date souhaitée</p>
<br>
<select id="cars" name="liaison">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>
<select id="cars" name="date">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>
<button type="button" onclick="alert('Hello World!')">Click Me!</button>
<br>
<p>Traversee ici<br>Traversee pour XX/XX/XXXX. Sélectionner la traversée souhaitée. </p>
</div>


</div>
</body>
