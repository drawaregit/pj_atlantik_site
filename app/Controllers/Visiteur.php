<?php

namespace App\Controllers;
use App\Models\ModeleClient;
use App\Models\ModeleLiaison;
use App\Models\ModelePeriode;
use App\Models\ModeleSecteur;
use App\Models\ModeleTraversee;
use App\Models\ModeleReservation;
use CodeIgniter\Exceptions\PageNotFoundException;
 //donne accès à la classe ModeleProduit

helper(['url', 'assets', 'form']); // donne accès aux fonctions du helper 'asset'

 

class Visiteur extends BaseController
{
    public function seConnecter()
    {
        helper(['form','url', 'assets', 'form']);
        $session = session();

        $data['TitreDeLaPage'] = 'Se connecter';

        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */
        if (!$this->request->is('post')) {
            return view('Templates/Header', $data) // Renvoi formulaire de connexion
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */

        /* VALIDATION DU FORMULAIRE */
        $reglesValidation = [ // Régles de validation
            'txtMail' => 'required|valid_email',
            'txtMotDePasse' => 'required',
        ];
        if (!$this->validate($reglesValidation)) {
            /* formulaire non validé */
            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_Accueil') // Renvoi formulaire de connexion
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* RECHERCHE UTILISATEUR DANS BDD */
        $Mail = $this->request->getPost('txtMail');
        $MdP = $this->request->getPost('txtMotDePasse');

        /* on va chercher dans la BDD l'utilisateur correspondant aux id et mot de passe saisis */
        $modUtilisateur = new ModeleClient(); // instanciation modèle
        $condition = ['MEL'=>$Mail,'MOTDEPASSE'=>$MdP];
        $utilisateurRetourne = $modUtilisateur->where($condition)->first();
        /* where : méthode, QueryBuilder, héritée de Model (), retourne,
        ici sous forme d'un objet, le résultat de la requête :
        SELECT * FROM utilisateur  WHERE mail='$pId' and motdepasse='$MotdePasse
        utilisateurRetourne = objet utilisateur ($returnType = 'object')
        */

        if ($utilisateurRetourne != null) {
            /* mail et mot de passe OK : mail et profil sont stockés en session */
            $session->set('mail', $utilisateurRetourne->MEL);
            $session->set('numero', $utilisateurRetourne->NOCLIENT);
            $session->set('nom', $utilisateurRetourne->NOM);
            $session->set('prenom', $utilisateurRetourne->PRENOM);
            $session->set('adresse', $utilisateurRetourne->ADRESSE);
            $session->set('codepostal', $utilisateurRetourne->CODEPOSTAL);
            $session->set('ville', $utilisateurRetourne->VILLE);
            $session->set('telfixe', $utilisateurRetourne->TELEPHONEFIXE);
            $session->set('telmobile', $utilisateurRetourne->TELEPHONEMOBILE);
            $session->set('mdp', $utilisateurRetourne->MOTDEPASSE);

            // profil = "SuperAdministrateur ou "Administrateur"
            $data['Mail'] = $Mail;
            echo view('Templates/Header', $data);
            echo view('Visiteur/vue_Accueil');
        } else {
            /* mail et/ou mot de passe OK : on renvoie le formulaire  */
            $data['TitreDeLaPage'] = "Mail ou/et Mot de passe inconnu(s)";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
    } // Fin seConnecter

 
    public function seDeconnecter()
    {
        session()->destroy();
        return redirect()->to('accueil');
    } // Fin seDeconnecter

    public function ajouterClient()

    {
        $data['TitreDeLaPage'] = 'Creer un Compte';
        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */
        if (!$this->request->is('post')) {
            /* le formulaire n'a pas été posté, on retourne le formulaire */
            return view('Templates/Header')
            . view('Visiteur/vue_AjouterClient', $data)
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* VALIDATION DU FORMULAIRE */
        $reglesValidation = [
            'txtNom' => 'required',           // obligatoire
            'txtPrenom' => 'required|alpha',         // obligatoire
            'txtAdresse' => 'required',                       // obligatoire
            'txtCodePostal' => 'required|exact_length[5]',    // obligatoire, exactement 5 caractères
            'txtVille' => 'required|max_length[20]',  
            'txtNumFixe' => 'required|integer',  
            'txtNumMobile' => 'required|integer',          // obligatoire, chaîne de caractères <= 20 caractères
            'txtMel' => 'required|valid_email',               // obligatoire, doit être une adresse email valide
            'txtMDP' => 'required',                           // obligatoire
        ];

        if (!$this->validate($reglesValidation)) {
            /* formulaire non validé, on renvoie le formulaire */
            $data['TitreDeLaPage'] = "Erreur saisie!";
            return view('Templates/Header')
            . view('Visiteur/vue_AjouterClient', $data)
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* INSERTION PRODUIT SAISI DANS BDD */
        $donneesAInserer = array(
            'NOM' => $this->request->getPost('txtNom'),
            'PRENOM' => $this->request->getPost('txtPrenom'),
            'ADRESSE' => $this->request->getPost('txtAdresse'),
            'CODEPOSTAL' => $this->request->getPost('txtCodePostal'),
            'VILLE' => $this->request->getPost('txtVille'),
            'TELEPHONEFIXE' => $this->request->getPost('txtNumFixe'),
            'TELEPHONEMOBILE' => $this->request->getPost('txtNumMobile'),
            'MEL' => $this->request->getPost('txtMel'),
            'MOTDEPASSE' => $this->request->getPost('txtMDP'),
        ); // reference, libelle, prixht, quantiteenstock, image : champs de la table 'produit'
        $modelClient = new ModeleClient(); //instanciation du modèle
        $donnees['clientAjoute'] = $modelClient->save($donneesAInserer);
        // provoque insert into sur la table mappée (produit, ici), retourne 1 (true) si ajout OK
        return view('Templates/Header')
            .view('Visiteur/vue_Accueil', $donnees)
            .view('Templates/Footer');
    } // ajouterProduit

    public function accueil()
    {
        helper(['form','url', 'assets', 'form']);
        $session = session();

        $data['TitreDeLaPage'] = 'Atlantik Croisière';
        return view('Templates/Header')
            .view('Visiteur/vue_Accueil')
            .view('Templates/Footer');
    }

    public function voirLiaisonSecteur()
    {
        helper(['form','url', 'assets', 'form']);
        $session = session();
        $model = new ModeleLiaison();
        $data['donnees'] = $model->getLiaisonParSecteur();
        $data['TitreDeLaPage'] = 'Liaison par secteurs';
        return view('Templates/Header')
            .view('Visiteur/vue_AfficherLiaisonSecteur', $data)
            .view('Templates/Footer');
    }

    public function voirTarifLiaison()
    {
        helper(['form','url', 'assets', 'form']);
        $session = session();
        $modelPeriode = new ModelePeriode();
        $modelLiaison = new ModeleLiaison();
        $data['donneesPeriodes'] = $modelPeriode->getPeriode();
        $data['donneesTarifs'] = $modelLiaison->getTarifLiaison(1);
        $data['TitreDeLaPage'] = 'Tarif Liaisons';
        return view('Templates/Header')
            .view('Visiteur/vue_TarifLiason', $data)
            .view('Templates/Footer');
    }

    public function modifiercompte()
    {
        helper(['form']);
        $session = session();
        $data['TitreDeLaPage'] = 'Modifier mon Compte';
        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */
        if (!$this->request->is('post')) {
            /* le formulaire n'a pas été posté, on retourne le formulaire */
            return view('Templates/Header')
            . view('Visiteur/vue_modifiercompte', $data)
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* VALIDATION DU FORMULAIRE */
        $reglesValidation = [
            'txtNom' => 'required',           // obligatoire
            'txtPrenom' => 'required|alpha',         // obligatoire
            'txtAdresse' => 'required',                       // obligatoire
            'txtCodePostal' => 'required|exact_length[5]',    // obligatoire, exactement 5 caractères
            'txtVille' => 'required|max_length[20]',  
            'txtNumFixe' => 'required|integer',  
            'txtNumMobile' => 'required|integer',          // obligatoire, chaîne de caractères <= 20 caractères
            'txtMel' => 'required|valid_email',               // obligatoire, doit être une adresse email valide
            'txtMDP' => 'required',                           // obligatoire
        ];
        

        if (!$this->validate($reglesValidation)) {
            /* formulaire non validé, on renvoie le formulaire */
            $data['TitreDeLaPage'] = "Erreur saisie!";
            return view('Templates/Header')
            . view('Visiteur/vue_modifiercompte', $data)
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* INSERTION PRODUIT SAISI DANS BDD */
        $donneesAInserer = array(
            'NOM' => $this->request->getPost('txtNom'),
            'PRENOM' => $this->request->getPost('txtPrenom'),
            'ADRESSE' => $this->request->getPost('txtAdresse'),
            'CODEPOSTAL' => $this->request->getPost('txtCodePostal'),
            'VILLE' => $this->request->getPost('txtVille'),
            'TELEPHONEFIXE' => $this->request->getPost('txtNumFixe'),
            'TELEPHONEMOBILE' => $this->request->getPost('txtNumMobile'),
            'MEL' => $this->request->getPost('txtMel'),
            'MOTDEPASSE' => $this->request->getPost('txtMDP'),
        ); // reference, libelle, prixht, quantiteenstock, image : champs de la table 'produit'
        $modelClient = new ModeleClient(); //instanciation du modèle
        $condition = ['NOCLIENT'=>session()->get('numero')];
        $donnees['clientAjoute'] = $modelClient->update($condition, $donneesAInserer);
        // provoque insert into sur la table mappée (produit, ici), retourne 1 (true) si ajout OK
        return redirect()->route('seDeconnecter');
    }

    public function voirHorairesTraversee($numeroSecteur = null)
    {
        helper(['form','url', 'assets', 'form']);
        $session = session();
        $modelSecteur = new ModeleSecteur();
        $modelLiaison = new ModeleLiaison();
        $modTraversee = new ModeleTraversee(); // instanciation du modèle
        
        $data['donneesSecteurs'] = $modelSecteur->getSecteurs();

        if ($numeroSecteur === null)
        {
            
            $data['donneesLiaison'] = $modelLiaison->getLiaisonParSecteur();
            $data['TitreDeLaPage'] = 'Selectionner secteur';
            return view('Templates/Header')
            .view('Visiteur/vue_voirHorairesTraversee', $data)
            .view('Templates/Footer');
        }

        if($this->request->is('post'))
                {
                    $data['lesTraversee'] = $modTraversee->getTraverseeParDate($this->request->getPost('liaison'), $this->request->getPost('txtDate'));
                }

            $data['donneesLiaison'] = $modelLiaison->getLiaisonParSecteurPrecis($numeroSecteur);
            $data['TitreDeLaPage'] = "Selectionner une liaison et une date.";
            return view('Templates/Header')
            .view('Visiteur/vue_voirHorairesTraversee', $data)
            .view('Templates/Footer');
        
            



    }

    public function voirLesTarifLiaison($numeroSecteur = null)
    {
        /* valeur par défaut de referenceProduit = NULL */
        $modLiaison = new ModeleLiaison(); // instanciation du modèle
        $modTraversee = new ModeleTraversee(); // instanciation du modèle
        
        if ($numeroSecteur === null && !$this->request->is('post'))
            /* pas de reference produit, = NULL -> Tous les produits */ {
            $data['lesLiaisons'] = $modLiaison->getLiaisonParSecteur();
            // findAll : héritée de Model, retourne, ici sous forme d'objets,
            // le résultat de la requête SELECT * FROM produit
            // affectation des objets produits retournés à l'entrée 'lesProduits' du tableau $data

            $data['TitreDeLaPage'] = 'Toutes les Liaisons';
            session()->set('noliaison', $numeroSecteur);
            return view('Templates/Header')
            . view('Visiteur/vue_VoirLiaisons', $data)
            . view('Templates/Footer');

        } else
        // une référence produit en entrée : on n'affichera le détail du produit correspondant
        {
            $data['uneLiaison'] = $modLiaison->getTarifLiaison($numeroSecteur);
            
            // find : : héritée de Model, retourne, ici sous forme d'un objet,
            // le résultat de la requête 'SELECT * FROM produit WHERE reference = '.$referenceProduit
            // l'objet produit est affectée à l'entrée 'unProduit' du tableau $data

            

            if (empty($data['uneLiaison'])) { // pas de produit correspondant à la référence
                throw new PageNotFoundException('Aucun tarif n es prochainement disponible pour le moment!');
                // génération d'une exception
            }
            $data['TitreDeLaPage'] = "test"; // ->libelle : $returnType = 'object' !

            return view('Templates/Header')
            . view('Visiteur/vue_VoirDetailTarifLiaison', $data)
            . view('Templates/Footer');
        }
    } // Fin voirLesProduits

    public function voirHistoriqueReservation()
    {
        helper(['form','url', 'assets', 'form']);
        $session = session();
        $model = new ModeleReservation();
        $data['donnees'] = $model->getReservationsParUtilisateur(session()->get('numero'));
        $data['TitreDeLaPage'] = 'Historique de Reservations';

        if (empty($data['donnees'])) { // pas de produit correspondant à la référence
            throw new PageNotFoundException('Vous navez fait aucune reservations!!');
            // génération d'une exception
        }

        return view('Templates/Header')
            .view('Visiteur/vue_voirHistoriqueReservation', $data)
            .view('Templates/Footer');
}
}