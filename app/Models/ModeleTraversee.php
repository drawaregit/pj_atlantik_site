<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeleTraversee extends Model
{
    protected $table = 'traversee'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'NOTRAVERSEE'; // clé primaire
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['NOTRAVERSEE','NOLIAISON','NOBATEAU','DATEHEUREDEPART','DATEHEUREARRIVEE'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model
} // Fin Classe