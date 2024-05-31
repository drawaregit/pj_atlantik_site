<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleLiaison extends Model
{
    protected $table = 'liaison li'; // nom de la table mappée
    /* ci-dessus on indique la table a 'mapper' */
    protected $primaryKey = 'NOLIAISON'; // clé primaire
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['NOPORT_DEPART','NOSECTEUR', 'NOPORT_ARRIVEE','DISTANCE'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on n'autorise pas les champs en AUTOINCREMENT */
    // voir contrôleur Client pour utilisation des méthodes héritées de Model

    public function getLiaisonParSecteur()
    {
        return $this->db->table('liaison li')
            ->select('se.NOM as NomSecteur, li.NOLIAISON as numeroLiaison, li.DISTANCE, poDepart.NOM as NomPortDepart, poArrivee.NOM as NomPortArrivee')
            ->join('secteur se', 'li.NOSECTEUR = se.NOSECTEUR', 'inner')
            ->join('port poDepart', 'li.NOPORT_DEPART = poDepart.NOPORT', 'inner')
            ->join('port poArrivee', 'li.NOPORT_ARRIVEE = poArrivee.NOPORT', 'inner')
            ->get()
            ->getResult();
    }

    public function getLiaisonParSecteurPrecis($nosecteur)
    {
        return $this->db->table('liaison li')
            ->select('se.NOM as NomSecteur, li.NOLIAISON as numeroLiaison, li.DISTANCE, poDepart.NOM as NomPortDepart, poArrivee.NOM as NomPortArrivee')
            ->join('secteur se', 'li.NOSECTEUR = se.NOSECTEUR', 'inner')
            ->join('port poDepart', 'li.NOPORT_DEPART = poDepart.NOPORT', 'inner')
            ->join('port poArrivee', 'li.NOPORT_ARRIVEE = poArrivee.NOPORT', 'inner')
            ->where(["li.NOSECTEUR" => $nosecteur])
            ->get()
            ->getResult();
    }

    public function getTarifLiaison($noliaison)
    {
        return $this->db->table('liaison li')
            ->distinct()
            ->select('li.NOLIAISON as numeroLiaison, ca.LETTRECATEGORIE as CATEGORIELETTRE, ca.LIBELLE as CATEGORIELIBELLE, ty.LETTRECATEGORIE as TYPECATEGORIE, ty.NOTYPE as NUMEROTYPE, ty.LIBELLE as CATEGORIELIBELE, pe.DATEDEBUT, pe.DATEFIN, ta.TARIF, poDepart.NOM as NomPortDepart, poArrivee.NOM as NomPortArrivee, ta.TARIF as tarif')
            ->join('tarifer ta', 'li.NOLIAISON = ta.NOLIAISON', 'inner')
            ->join('type ty', 'ta.NOTYPE = ty.NOTYPE', 'inner')
            ->join('periode pe', 'ta.NOPERIODE = pe.NOPERIODE', 'inner')
            ->join('categorie ca', 'ta.LETTRECATEGORIE = ca.LETTRECATEGORIE', 'inner')
            ->join('port poDepart', 'li.NOPORT_DEPART = poDepart.NOPORT', 'inner')
            ->join('port poArrivee', 'li.NOPORT_ARRIVEE = poArrivee.NOPORT', 'inner')
            ->orderBy('CATEGORIELETTRE', 'ASC')
            ->where(["li.NOLIAISON" => $noliaison])
            ->where(["pe.DATEDEBUT >=" => date("Y-m-d")])
            ->get()
            ->getResult();
    }

   


} // Fin Classe