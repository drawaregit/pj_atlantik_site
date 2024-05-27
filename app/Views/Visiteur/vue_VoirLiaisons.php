<h2><?php echo $TitreDeLaPage ?></h2>

<!--

$TitreDeLaPage : variable récupérée depuis le contrôleur

$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')

 -->

<!--  foreach ($lesLiaisons as $uneLiaison) :

echo '<h3>'.anchor('voirlesliaisons/'.$uneLiaison->numeroLiaison, $uneLiaison->NomPortDepart . ' - ' . $uneLiaison->NomPortArrivee).'</h3>';


endforeach ?> -->

<table>
    <thead>
        <tr>
            <th>Secteur</th>
            <th>Code Liaison</th>
            <th>Distance en milles marin</th>
            <th>Port de départ</th>
            <th>Port d'arrivée</th>
            <!-- Autres en-têtes de colonnes -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lesLiaisons as $ligne): ?>
        <tr>
            <td><?= $ligne->NomSecteur; ?></td>
            <td><a href="voirlesliaisons/<?= $ligne->numeroLiaison ?>"><?= $ligne->numeroLiaison; ?></a></td>
            <td><?= $ligne->DISTANCE; ?></td>
            <td><?= $ligne->NomPortDepart; ?></td>
            <td><?= $ligne->NomPortArrivee; ?></td>
            
            <!-- Autres cellules de données -->
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<p>Pour afficher les Tarifs d'une liaison, cliquer sur son Code!</p>