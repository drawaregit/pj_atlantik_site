<html>
<body>
<?php
    echo form_open('chutelibre');
    /* 'bonjournom' entrée routée vers 'Test::bonjourNom', en POST =  
    Méthode bonjourNom de Test appelée pour traitement formulaire */
    echo csrf_field(); // Pour sécurité
    echo form_label('Champ de pesanteur (g en m/s2)','txtChamps');
    echo form_input('txtChamps','');  
    echo('<br>');
    echo form_label('Instant (t, en secondes)','txtInstant');
    echo form_input('txtInstant','');  
    echo('<br>');
    echo form_submit('btnOK','OK');
    echo form_close();
?>
</body>
</html>