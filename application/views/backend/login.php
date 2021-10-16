<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Connexion</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">
  <!-- Google fonts - Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <!-- Choices CSS-->
  <link rel="stylesheet" href="<?= static_url('vendor/choices.js/public/assets/styles/choices.min.css') ?> ">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?= theme_url() . 'css/style.default.css' ?>" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="<?= theme_url() . 'css/custom.css' ?>">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= static_url('img/favicon.ico') ?>">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <div class="login-page">
    <div class="container d-flex align-items-center position-relative py-5">
      <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
        <div class="card-body p-0">
          <div class="row gx-0 align-items-stretch">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex justify-content-center flex-column p-4 h-100">
                <div class="py-5">
                  <h1 class="display-6 fw-bold">Tableau de bord</h1>
                  <p class="fw-light mb-0">Bienvenue sur Audiences ! Veuillez vous connecter, afin d'accéder vos demandes d'audiences.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
            <?php if ($this->session->flashdata('message')) : ?>
              <p style="padding: 5px 10px; font-weight: bold; color: red; margin:0;"><?= $this->session->flashdata('message'); ?></p>
            <?php endif; ?>
              <div class="d-flex align-items-center px-4 px-lg-5 h-100">
                <form class="login-form py-5 w-100" method="POST" action="<?= site_url('admistrateur/traitement_connexion_admin') ?>">
                  <div class="input-material-group mb-3">
                    <input class="input-material" id="login-username" type="text" name="loginEmail" autocomplete="off" required data-validate-field="loginUsername">
                    <label class="label-material" for="login-username">Email</label>
                  </div>
                  <div class="input-material-group mb-4">
                    <input class="input-material" id="login-password" type="password" name="loginPassword" required data-validate-field="loginPassword">
                    <label class="label-material" for="login-password">Mot de passe</label>
                  </div>
                  <button class="btn btn-primary mb-3" id="login" type="submit">Se connecter</button><br><a class="text-sm text-paleBlue" href="#">Mot de passe oublé ?</a><br><small class="text-gray-500">Cette plateforme est strictement réservé aux responsables administratifs de droits. </small>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center position-absolute bottom-0 start-0 w-100 z-index-20">
      <p class="text-white"><a class="external" href="#">Politiques de la plateforme</a>

      </p>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="<?= static_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>
  <script src="<?= static_url('vendor/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= static_url('vendor/just-validate/js/just-validate.min.js') ?>"></script>
  <script src="<?= static_url('vendor/choices.js/public/assets/scripts/choices.min.js') ?> "></script>
  <!-- Main File-->
  <script src="<?= static_url('js/front.js') ?>  "></script>
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite - 
    //   see more here 
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
      }
    }
    // this is set to BootstrapTemple website as you cannot 
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>