<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeleType extends Model
{
    protected $table = 'type'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'LETTRECATEGORIE'; // clé primaire
    protected $useAutoIncrement = false;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['LETTRECATEGORIE','NOTYPE','LIBELLE'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model
} // Fin Classe