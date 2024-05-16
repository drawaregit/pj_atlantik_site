<?php
namespace App\Models;
use CodeIgniter\Model;
class ModelePeriode extends Model
{
    protected $table = 'periode'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'NOPERIODE'; // clé primaire
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['PERIODE','DATEDEBUT','DATEFIN'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model
    public function getPeriode()
    {
        return $this->db->table('periode')
            ->select('DATEDEBUT,DATEFIN')
            ->get()
            ->getResult();
    }
} // Fin Classe
