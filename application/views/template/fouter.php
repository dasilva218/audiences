<!-- Page Footer-->
<footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs mt-5" id="footer">
            <div class="container-fluid">
              <div class="row gy-2">
                <div class="col-sm-6 text-sm-start">
                  <p class="mb-0">Audiences &copy; 2021</p>
                </div>
                <div class="col-sm-6 text-sm-end">
                  <p class="mb-0"><a href="#" class="text-white text-decoration-none">Politiques de la plateforme</a></p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?=static_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?> "></script>
    <script src="<?=static_url('vendor/chart.js/Chart.min.js')?> "></script>
    <script src="<?=static_url('vendor/just-validate/js/just-validate.min.js')?> "></script>
    <script src="<?=static_url('vendor/choices.js/public/assets/scripts/choices.min.js')?> "></script>
    <script src="<?=static_url('js/charts-custom.js') ?>"></script>
    <!-- Main File-->
    <script src="<?=static_url('js/front.js') ?>"></script>
    <script src="<?=static_url('js/style.js') ?>"></script>
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