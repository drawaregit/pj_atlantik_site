<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeleParametre extends Model
{
    protected $table = 'parametres'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'NOIDENTIFIANT'; // clé primaire
    protected $useAutoIncrement = false;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['NOIDENTIFIANT','SITE_PB', 'RANG_PB','IDENTIFIANT_PB','CLEHMAC_PB','ENPRODUCTION','MELSITE'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model

} // Fin Classe
