<html>
<head>
    <title>eRabelais</title>
</head>
<body>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-light">

<a class="navbar-brand" href="/accueil">
    <img src="assets/images/logo.webp" alt="Logo" style="width:40px;">
  </a>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/voirliaisonsecteur">Voir les liaisons par secteurs</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/voirlesliaisons">Voir tarif par liaisons</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/voirhoraires">Voir horraires et réserver</a>
    </li>

    <li class="nav-item dropdown">
        <?php 
        if (!is_null(session()->get('mail'))){
            echo'<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            '.session()->get('mail').'
          </a>';
        }
        else
        {
            echo'<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Compte
          </a>';
        }
        ?>
      
      <div class="dropdown-menu">
        <a class="dropdown-item" href=/Connexion>Connexion</a>
        <a class="dropdown-item" href="/creationcompte">Créer un compte</a>
        <a class="dropdown-item" href="/seDeconnecter">Se déconnecter</a>
        <a class="dropdown-item" href="/modifiercompte">Modifier Son Compte</a>
      </div>
    </li>
  </ul>

</nav>
</body>