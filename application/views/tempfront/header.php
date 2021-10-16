<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Envoyez gratuitement vos demandes d'audiences en ligne, en moins de 2 minutes." />
        <meta name="author" content="" />
        <title><?= isset($title) ? $title : 'Accueil' ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= static_url_front('img/icon.ico') ?>"/>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- CSS (includes Bootstrap) -->
        <link href="<?= static_url_front('css/styles.css') ?>" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
                <div class="container px-8">
                    <a class="navbar-brand" href="<?=site_url('front')?> "><h2>Audiences</h2></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="<?=site_url('front')?> ">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=site_url('front/audience')?>">Audience</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=site_url('front/about')?>">A propos</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=site_url('front/help')?>">Aide</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=site_url('front/contact')?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>