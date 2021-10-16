<div class="page-content d-flex align-items-stretch">
  <!-- Side Navbar -->
  <nav class="side-navbar z-index-40">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded-circle" src="<?= static_url('img/avatar-2.jpg') ?>" alt="...">
      <div class="ms-3 title">
        <h1 class="h4 mb-2">
          <?= $admistrateur->nom_admistrateur ?>
        </h1>
        <p class="text-sm text-gray-500 fw-light mb-0 lh-1">Product Manager</p>
      </div>
    </div>


    <!-- Sidebar Navidation Menus-->
    <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Listes</span>
    <ul class="list-unstyled py-4">
      <li class="sidebar-item active">
        <a class="sidebar-link" href="<?= site_url('admistrateur/dashboard') ?>">
          <i class="fas fa-home ico-menu"></i>
          Réception
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="<?= site_url('admistrateur/') ?>">
          <i class="far fa-check-circle ico-menu"></i>
          Acceptées
        </a>
      </li>

      <li class="sidebar-item"><a class="sidebar-link" href="pending.html">
          <i class="far fa-clock ico-menu"></i> En attentes </a></li>

      <li class="sidebar-item"><a class="sidebar-link" href="rejected.html">
          <i class="far fa-times-circle ico-menu"></i> Rejetées </a></li>

      <li class="sidebar-item"><a class="sidebar-link" href="importants.html">
          <i class="far fa-star ico-menu"></i> Importants </a></li>

      <li class="sidebar-item"><a class="sidebar-link" href="archived.html">
          <i class="far fa-folder ico-menu"></i> Archivées </a></li>
    </ul>

    <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Autres</span>
    <ul class="list-unstyled py-4">


      <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse">
          <i class="fas fa-cog ico-menu"></i> Paramèttres </a>
        <ul class="collapse list-unstyled " id="exampledropdownDropdown">
          <li><a class="sidebar-link" href="profile.html">Mon compte</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div class="content-inner w-100">