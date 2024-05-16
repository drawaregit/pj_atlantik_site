<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\VisiteurPlante;

$routes->get('/', 'Home::index');
$routes->get('bonjour', 'Test::bonjour');
$routes->get('bonjourparametre/(:alpha)', 'Test::bonjourParametre/$1');
$routes->match(['get', 'post'], 'chutelibre', 'Test::chutelibre');
$routes->match(['get', 'post'], 'bonjournom', 'Test::bonjourNom');

/*
/*
/* --------ROUTES PROJET ATLANTIK----------*/
$routes->match(['get', 'post'], 'Connexion', 'Visiteur::seConnecter');
$routes->match(['get', 'post'],'seconnecter', 'Visiteur::seConnecter');
$routes->match(['get', 'post'],'creationcompte', 'Visiteur::AjouterClient');
$routes->match(['get', 'post'],'ajouterclient', 'Visiteur::AjouterClient');
$routes->match(['get', 'post'],'voirliaisonsecteur', 'Visiteur::voirLiaisonSecteur');
$routes->match(['get', 'post'],'voirtarifliaison', 'Visiteur::voirTarifLiaison');
$routes->match(['get', 'post'],'modifiercompte', 'Visiteur::modifiercompte');
$routes->match(['get', 'post'],'voirhoraires', 'Visiteur::voirHorairesTraversee');

$routes->get('voirlesliaisons/(:alphanum)', 'Visiteur::voirLesTarifLiaison/$1');
$routes->get('voirlesliaisons', 'Visiteur::voirLesTarifLiaison');

$routes->get('voirhoraires/(:alphanum)', 'Visiteur::voirHorairesTraversee/$1');
$routes->get('accueil', 'Visiteur::accueil');
$routes->get('seDeconnecter', 'Visiteur::seDeconnecter');

