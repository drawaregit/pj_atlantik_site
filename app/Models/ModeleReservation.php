<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleReservation extends Model
{
    protected $table = 'reservation'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'NORESERVATION'; // clé primaire
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['NORESERVATION','NOTRAVERSEE','NOCLIENT','DATEHEURE','MONTANT','PAYE','MODEREGLEMENT'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model

    public function getReservationsParUtilisateur($noUtilisateur)
{
    return $this->db->table('reservation re')
        ->select("re.NORESERVATION as numeroReservation, DATE_FORMAT(re.DATEHEURE, '%Y-%m-%d') as dateReservation, li.DISTANCE, poDepart.NOM as NomPortDepart, poArrivee.NOM as NomPortArrivee, re.MONTANTTOTAL, re.PAYE")
        ->join('traversee tr', 'tr.NOTRAVERSEE = re.NOTRAVERSEE', 'inner')
        ->join('liaison li', 'li.NOLIAISON = tr.NOLIAISON', 'inner')
        ->join('port poDepart', 'li.NOPORT_DEPART = poDepart.NOPORT', 'inner')
        ->join('port poArrivee', 'li.NOPORT_ARRIVEE = poArrivee.NOPORT', 'inner')
        ->where('re.NOCLIENT', $noUtilisateur)
        ->get()
        ->getResult();
}

} // Fin Classe