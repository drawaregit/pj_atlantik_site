<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleSecteur extends Model
{
    protected $table = 'secteur'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'NOSECTEUR'; // clé primaire
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['NOSECTEUR','NOM'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model

    public function getSecteurs()
    {
        return $this->db->table('secteur')
            ->select('NOSECTEUR, NOM')
            ->get()
            ->getResult();
    }
} // Fin Classe