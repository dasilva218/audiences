<section class="charts">
  <div class="container-fluid">
    <div class="row gy-4 align-items-stretch">
      <!-- Line Charts-->
      <div class="col-lg-8 bg-white">
        <div class="p-3">
          <p class="text-sm text-gray-500 date-position mb-4 mt-2"><?= $demande->date_envoie ?></p>
          <h3 class="mb-2"><?= $demande->objet ?> </h3>

          <hr class="mb-4">

          <p class="mt-5"><span class="subtitle">De :</span> <?= $demande->nom_demandeur . ' ' . $demande->prenom_demandeur ?>
            <br><span class="subtitle">Fonction :</span> <?= $demande->statut_demandeur ?>
            <br><span class="subtitle">Audience :</span> <?= $demande->type_audience ?>
          </p>

          <!-- Short message -->
          <div class="mt-4">
            <p><?= $demande->message ?></p>
          </div>

          <!-- Dowload file demand -->
          <div class="mt-5">
            <h6 style="color: red;" class="mb-3">Téléchargez la demande d'audience ici !</h6>

            <a href="<?= upload_url($demande->nom_fichier1) ?>" target="_blank">
              <button type="button" class="btn btn-light">
                <i class="fas fa-download m-1"></i>
                <?= $demande->nom_fichier1 ?>
              </button>
            </a>

            <a href="<?= upload_url($demande->nom_fichier2) ?>" target="_blank">
              <button type="button" class="btn btn-light">
                <i class="fas fa-download"></i>
                <?= $demande->nom_fichier2 ?>
              </button>
            </a>
          </div>


          <!-- Demander contacts -->
          <div class="mt-4 mb-5">

            <p class="mt-5"><span class="subtitle">Email :</span> <?= $demande->email ?>
              <br><span class="subtitle">N° Personnel :</span> <?= $demande->tel_perso ?>
              <br><span class="subtitle">N° Burreau :</span> <?= $demande->tel_bureau ?>
            </p>
          </div>

          <!-- Button lists -->
          <div class="mb-4">
            <?php if (!((int)$action->accepter == 1 || (int)$action->rejeter == 1)) : ?>
              <a href="<?= site_url('admistrateur/accepter/') . $demande->id_demande ?>"><button type="button" class="btn btn-primary color-bg">Accepter</button> </a>
              <!-- <a href="#"><button class="btn btn-light btn-space" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-user-tag"></i></button></a> -->
              <!-- <a href=""><button type="button" class="btn btn-outline-secondary btn-space">Rejeter</button> </a> -->
              <a href=""><button type="button" class="btn btn-outline-secondary btn-space">Rappel</button> </a>
              <a href="<?= site_url('admistrateur/important/') . $demande->id_demande ?>"><button type="button" class="btn btn-outline-secondary btn-space">Important</button> </a>
              <a href="<?= site_url('admistrateur/archiver/') . $demande->id_demande ?>"><button type="button" class="btn btn-outline-secondary btn-space">Archiver</button> </a>
            <?php endif ?>
          </div>

        </div>
      </div>

      <div class="col-lg-4 warning-section">

        <div class="mb-0">
          <div class="">
            <div>
            </div>
            <div class="mt-4 ">
              <h4 class="text-center">Comment ça marche ?</h4>
              <hr class="mb-3">
              <ul class="mt-3">
                <li>Une fois la demande affichée, vous avez toutes les informations nécessaires.</li><br>
                <li>Veuillez télécharger le fichier, afin d'avoir le document de la demande.</li><br>
                <li>A la fin de chaque demande d'audience, il y a des boutons qui vous permettent de la ranger dans une liste, afin de de la retrouver facilement.</li><br>
                <li>Vous pouvez accéder à chaque liste depuis le menu vertical à votre gauche.</li><br>
                <li>En cas d'autres besoins, veuillez regarder les options plus bas, toujours dans le menu verticale</li><br>
                <li>Si vous rencontrez un problème que vous n'arrivez pas à resoudre de manière autonome, veuillez nous contacter par email.</li><br>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Modal-->
<div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Collaborez en équipe</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Laissez un commentaire en identifiant un collaborateur !</p>
        <form>
          <div class="mb-3">
            <label class="form-label" for="modalInputEmail1"></label>
            <input class="form-control" id="modalInputEmail1" type="email" aria-describedby="emailHelp">
            <div class="form-text" id="emailHelp">Saisissez l'email de votre collaborateur.</div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="modalInputEmail1"></label>
            <input class="form-control" id="modalInputEmail1" type="email" aria-describedby="emailHelp">
            <div class="form-text" id="emailHelp">Saisissez l'email de votre collaborateur (facultatif).</div>
          </div>


          <div class="mb-3">
            <label class="form-label" for="">Votre commentaire</label>
            <input style="height: 100px;" class="form-control" id="" type="">
          </div>
          <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>