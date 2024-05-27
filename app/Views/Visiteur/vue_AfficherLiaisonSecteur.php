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
        <?php foreach ($donnees as $ligne): ?>
        <tr>
            <td><?= $ligne->NomSecteur; ?></td>
            <td><?= $ligne->numeroLiaison; ?></td>
            <td><?= $ligne->DISTANCE; ?></td>
            <td><?= $ligne->NomPortDepart; ?></td>
            <td><?= $ligne->NomPortArrivee; ?></td>
            
            <!-- Autres cellules de données -->
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
