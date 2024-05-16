<html>

<body>
    <h1>Distance parcourue apres  <?= esc($Instant) ?> secondes: <?= esc(($Instant * $Instant * $ChampsPesanteur)/2) ?> metres</h1>
    <h1>Vitesse aquise apres  <?= esc($Instant) ?> secondes: <?= esc($Instant * $ChampsPesanteur) ?> metres/secondes</h1>
    <table border=1>
  <tr>
    <th>Temps ecoule (s)</th>
    <th>Vitesse parcourue (m/s)</th>
  </tr>
    <?php  
    for ($x = 0; $x <= 25; $x++) {
        echo'<tr>';
        echo'<td>';
        echo $x;
        echo'</td>';
        echo'<td>';
        echo $x * $ChampsPesanteur;
        echo '</td>';
      echo '</tr>';
    }
    ?>  
    </table>
</body>

</html>