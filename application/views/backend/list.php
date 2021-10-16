<?php foreach ($demande as $item) : ?>

  <!-- Received demands Section-->
  <section class="pb-0">
    <div class="container">
      <!-- Demande 1-->
      <div class="card card-demand mb-0">
        <a href="<?= site_url('admistrateur/dashboard_detail/') . $item->id_demande ?>">
          <div class="card-body p-1">
            <div class="row align-items-center gx-lg-5 gy-3">
              <div class="col-lg-6 border-lg-end">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center"><img class="img-fluid shadow-sm" src="<?= static_url('img/dossier.png') ?>" alt="..." width="50">
                    <div class="ms-3">
                      <h3 class="h4 text-gray-700 mb-0">
                        <?= $item->nom_demandeur . ' ' . $item->prenom_demandeur ?>
                      </h3>
                      <small class="text-gray-500">
                        <?= $item->statut_demandeur ?>
                      </small>
                    </div>
                  </div>
                  <span class="text-sm text-gray-600 d-none d-sm-block">
                    <?= $item->date_envoie ?>
                  </span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="d-flex align-items-center">
                  <p class="d-flex mb-0 text-gray-600 text-sm d-flex align-items-center flex-shrink-0">
                    <i class="far fa-comment-dots me-1"></i>
                    </i><?= $item->objet ?>
                  </p>
                  <span class="text-sm text-gray-600 d-none d-sm-block"></span>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

<?php endforeach ?>