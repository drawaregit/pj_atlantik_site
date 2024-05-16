<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeleTarifer extends Model
{
    protected $table = 'tarifer'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'NOPERIODE'; // clé primaire
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['NOPERIODE','LETTRECATEGORIE', 'NOTYPE', 'NOLIAISON','TARIF'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model
} // Fin Classe