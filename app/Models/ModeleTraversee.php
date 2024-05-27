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

    public function getTraverseeParDate($noliaison, $date)
    {
        return $this->db->table('traversee tr')
            ->select('tr.NOTRAVERSEE as numeroTraversee, tr.NOLIAISON as numeroLiaison, ba.NOM as nomBateau, DATE_FORMAT(DATEHEUREDEPART, "%H:%i") as `heureDepart`, ')
            ->join('bateau ba', 'tr.NOBATEAU = ba.NOBATEAU', 'inner')
            ->where(["tr.NOLIAISON" => $noliaison])
            ->where(["tr.DATEHEUREDEPART" => $date])
            ->get()
            ->getResult();
    }
} // Fin Classe