<?php

namespace App\Controllers;

 

class Test extends BaseController

{

    public function bonjour()

    {

        return view('Test/vue_Bonjour');
        

        /* retour de la vue : "vue_bonjour" du dossier "Test" situé dans "Views" (pas d'affichage dans le contrôleur !) */
    }
    public function bonjourParametre($nom = 'Anonyme')

    {

        $data['nomDeLaPersonne'] = $nom;

        return view('Test/vue_BonjourParametre', $data);

        /* injection du tableau dans la vue vue_BonjourParametre */

    }

    public function bonjourNom()

    {
        if (!isset($_POST['btnOK'])) { // si le formulaire n'a pas été soumis
            helper('form');
            /* ci-dessus on charge le helper 'form" pour pouvoir utiliser les fonctions
            de ce dernier dans la génération du formulaire (vue_SaisieNom') */
            return view('test/vue_BonjourNom');
        } else { // le formulaire a été soumis
            $data['nomDeLaPersonne'] = $this->request->getPost('txtNom');
            /* récup. données formulaire (getPost), et ajout entrée dans $data */
            return view('test/vue_BonjourParametre', $data);
            /* appel vue avec injection tableau associatif $data */
        }
    }

    public function chutelibre()

    {
        if (!isset($_POST['btnOK'])) { // si le formulaire n'a pas été soumis
            helper('form');
            /* ci-dessus on charge le helper 'form" pour pouvoir utiliser les fonctions
            de ce dernier dans la génération du formulaire (vue_SaisieNom') */
            return view('test/vue_chutelibre');
        } else { // le formulaire a été soumis
            $data['ChampsPesanteur'] = $this->request->getPost('txtChamps');
            $data['Instant'] = $this->request->getPost('txtInstant');
            /* récup. données formulaire (getPost), et ajout entrée dans $data */
            return view('test/vue_ChuteParametre', $data);
            /* appel vue avec injection tableau associatif $data */
        }
    }

    public function chuteLibreParametre($newchamps, $newinstant)
    {

        $data['ChampsPesanteur'] = $newchamps;
        $data['Instant'] = $newinstant;

        return view('Test/vue_BonjourParametre', $data);

        /* injection du tableau dans la vue vue_BonjourParametre */

    }
}