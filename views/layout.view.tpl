<!DOCTYPE html>
<html>
    <head>
        <title>CRM COACEHL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css'>
        <link rel="stylesheet" href='public/css/style.css'>
        {{foreach css_ref}}
            <link rel="stylesheet" href="{{uri}}" />
        {{endfor css_ref}}
    </head>
    <body>
        <body data-spy="scroll" data-target="#navbar" data-offset="72" class="position-relative">
            <header class="fixed-top page-header">
                <div class="container-fluid container-fluid-max">
                    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="index.php?page=home">CRM COOP. COACEHL</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-lg-between" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=clientes">Clientes</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="#featured-destinations">Gestiones</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="#popular-destinations">Campañas</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="#popular-destinations">Iniciar Sessión</a>
                            </li>
                        </ul>
                        <div class="text-white">
                            <a href="tel:27220000" class="mr-2">
                            <i class="fas fa-phone"></i>
                            <div class="d-none d-xl-inline"> 2722-0000</div>
                            </a>
                            <a href="mailto:info@coopcoacehl.com">
                            <i class="fas fa-envelope"></i>
                            <div class="d-none d-xl-inline"> info@coopcoacehl.com</div>
                            </a>
                        </div>
                        </div>
                    </nav>
                </div>
            </header>
            <main>
                <section>
                    {{{page_content}}}
                </section>
            </main>
            <footer class="py-5 page-footer">
                <div class="container-fluid container-fluid-max">
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-6 footer-child copyright">
                            COOP. COACEHL © 2018 All Rights Reserved
                        </div>
                        <div class="col-12 col-md-6 footer-child footer-links">
                            <a href="#!" class="mr-3">Privacy Policy</a>
                            <a href="#!">FAQ</a>
                            <div>
                                <small>Made with <i class="fas fa-heart text-red"></i> by <a href="#!">COACEHL developers</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </body>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="public/js/index.js"></script>
        {{foreach js_ref}}
            <script src="{{uri}}"></script>
        {{endfor js_ref}}
    </body>
</html>