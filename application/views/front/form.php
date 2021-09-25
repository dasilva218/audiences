<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Faites vos demandes d'audiences en ligne, tout en restant en sécurité chez vous.">
    <meta name="author" content="Audiences">
    <meta name="keywords" content="Audiences">

    <!-- Title Page-->
    <title>Demande d'audience en ligne</title>

    <!-- Icons font CSS-->
    
    <link href="<?=static_url('vendor/mdi-font/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?=static_url('vendor/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?=static_url('vendor/select2/select2.min.css'); ?>"  rel="stylesheet" media="all">
    <link href="<?=static_url('vendor/datepicker/daterangepicker.css'); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=theme_url().'css/main.css'; ?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Demande d'audience en ligne</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Noms complet</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" placeholder="Prénoms" name="first_name" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" placeholder="Noms" name="noms" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Statut</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" placeholder="La fonction que vous occupez" name="statut" required>
                                    <label class="label--desc"></label>
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-row m-b-55">
                            <div class="name">N° Téléphones</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" placeholder="Personnel" name="telephone" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" placeholder="Burreau" name="phone" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  


                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" placeholder="Adresse email" name="email" required>
                                </div>
                            </div>
                        </div>

                          
                        <div class="form-row">
                            <div class="name">Destinataire</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected" required>A qui s'adresse votre demande ?</option>
                                            <?php foreach ($admistration as $adm) : ?>
                                                <option><?=$adm; ?></option>
                                            <?php endforeach; ?>    
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Objet</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" placeholder="Le sujet de la demande" name="objet" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Votre demande en (PDF)</div>
                            <div class="value">
                                <div class="form row custom-file">
                                <input type="file" class="custom-file-input input--style-5" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile"></label>
                            </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name"></div>
                            <div class="value">
                                <div class="form row custom-file">
                                <input type="file" class="custom-file-input input--style-5" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Autre document (facultatif)</label>
                            </div>
                            </div>
                        </div>

                         <!-- MESSAGE COURT
                        <div class="form-row">
                            <div class="name">Message court</div>
                            <div class="value">
                                <div class="form-group"> <textarea id="form_message" name="message" class="input--style-5" placeholder="Message court et bref." required="required" data-error="Veuillez laisser une petite note s'il vous plaît."></textarea> </div>
                                    </div>
                            </div>
                        </div>
                        
                        </div>
                        -->


                        <div class="form-row m-b-55">
                            <div class="name">Divers</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="subject">
                                                    <option disabled="disabled" selected="selected" required>Civilité</option>
                                                    <option>Monsieur</option>
                                                    <option>Madame</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                                <label class="label--desc"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="subject">
                                                    <option disabled="disabled" selected="selected" required>Type d'audience</option>
                                                    <option>En présentiel</option>
                                                    <option>En ligne</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                                <label class="label--desc"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Note</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" placeholder="Message court 50 mots max" name="note" required>
                                    <label class="label--desc"></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Envoyer la demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!--  -->

</html>
<!-- end document-->