<div class="page">
  <!-- Main Navbar-->
  <header class="header z-index-50 sticky-top">
    <nav class="navbar py-3 px-0 shadow-sm text-white position-relative">
      <!-- Search Box-->
      <div class="search-box shadow-sm">
        <button class="dismiss d-flex align-items-center">
          <svg class="svg-icon svg-icon-heavy">
            <use xlink:href="#close-1"> </use>
          </svg>
        </button>
        <form id="searchForm" action="#" role="search">
          <input class="form-control shadow-0" type="text" placeholder="Rechercher une demande...">
        </form>
      </div>
      <div class="container-fluid w-100">
        <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
          <!-- Navbar Header-->
          <div class="navbar-header">
            <!-- Navbar Brand<a class="navbar-brand d-none d-sm-inline-block" href="index.html"></a> -->
            <h2 class="brand-text d-none d-lg-inline-block">
              <span>Au</span><strong>diences!</strong>
            </h2>
            <div class="brand-text d-none d-sm-inline-block d-lg-none">
              <strong>BD</strong>
            </div>
            <!-- Toggle Button-->
            <a class="menu-btn active" id="toggle-btn" href="#">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <!-- Navbar Menu -->
          <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <!-- Search-->
            <li class="nav-item d-flex align-items-center">
              <a id="search" href="#">
                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                  <use xlink:href="#find-1"> </use>
                </svg>
              </a>
            </li>
            <!-- Notifications -->
            <li class="nav-item dropdown">
              <a class="nav-link text-white" id="notifications" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                  <use xlink:href="#chart-1"> </use>
                </svg>
                <!-- <span class="badge bg-red badge-corner fw-normal">3</span> -->
              </a>
              <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="notifications">
                <li>
                  <a class="dropdown-item py-3" href="#">
                    <div class="d-flex">
                      <div class="icon icon-sm bg-blue">
                        <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                          <use xlink:href="#envelope-1"> </use>
                        </svg>
                      </div>
                      <div class="ms-3">
                        <span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">
                          <span class="text-xs text-gray-600">Rappel :</span>
                          Dave Anguilet Walker, Digitalisation des demandes d'audiences dans les ministères.
                        </span>
                        <small class="small text-gray-600">Il ya 6 minutes</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item py-3" href="#">
                    <div class="d-flex">
                      <div class="icon icon-sm bg-green">
                        <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                          <use xlink:href="#chats-1"> </use>
                        </svg>
                      </div>
                      <div class="ms-3">
                        <span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span>
                        <small class="small text-gray-600">4 minutes ago</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item py-3" href="#">
                    <div class="d-flex">
                      <div class="icon icon-sm bg-orange">
                        <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                          <use xlink:href="#checked-window-1"> </use>
                        </svg>
                      </div>
                      <div class="ms-3">
                        <span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server Rebooted</span>
                        <small class="small text-gray-600">8 minutes ago</small>
                      </div>
                    </div>
                  </a>
                </li>

                <li>
                  <a class="dropdown-item all-notifications text-center" href="#">
                    <strong class="text-xs text-gray-600">view all notifications </strong>
                  </a>
                </li>
              </ul>
            </li>


            <!-- Messages -->
            <li class="nav-item dropdown">
              <a class="nav-link text-white" id="messages" rel="nofollow" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                  <use xlink:href="#envelope-1"> </use>
                  <!-- </svg><span class="badge bg-orange badge-corner fw-normal">10</span></a> -->
                  <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="messages">
                    <li>
                      <a class="dropdown-item d-flex py-3" href="#">
                        <img class="img-fluid rounded-circle" src="img/avatar-1.jpg" alt="..." width="45">
                        <div class="ms-3">
                          <span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span>
                          <small class="small text-gray-600"> Sent You Message</small>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item d-flex py-3" href="#">
                         <img class="img-fluid rounded-circle" src="img/avatar-2.jpg" alt="..." width="45">
                        <div class="ms-3">
                          <span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span>
                          <small class="small text-gray-600"> Sent You Message</small>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item d-flex py-3" href="#"> 
                        <img class="img-fluid rounded-circle" src="img/avatar-3.jpg" alt="..." width="45">
                        <div class="ms-3">
                          <span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span>
                          <small class="small text-gray-600"> Sent You Message</small>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item text-center" href="#">
                        <strong class="text-xs text-gray-600">Voir plus de notifications </strong>
                      </a>
                    </li>
                  </ul>
            </li>


            <!-- Languages dropdown   
                <li class="nav-item dropdown"><a class="nav-link text-white dropdown-toggle d-flex align-items-center" id="languages" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="me-2" src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="languages">
                    <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/DE.png" alt="English"><span class="text-xs text-gray-700">German</span></a></li>
                    <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/FR.png" alt="English"><span class="text-xs text-gray-700">French                                         </span></a></li>
                  </ul>
                </li> -->


            <!-- Logout    -->
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= site_url('admistrateur/deconnexion') ?>">
               <span class="d-none d-sm-inline">Déconnexion</span>
                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                  <use xlink:href="#security-1"> </use>
                </svg>
              </a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>