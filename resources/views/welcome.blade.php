<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Budgetify</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ '/' }}">
                    <img src="{{ asset('img/budgetify_logo.png') }}" alt="Example Navbar 1" class="" height="30">
                    <span class="align-self-end" style="font-size: 1.1rem;">udgetify</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-7" aria-controls="navbarNavDropdown-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown-7">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-7">
                                <a class="dropdown-item" href="#"><i class="fas fa-wrench mr-2"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col text-center">
                    <img src="{{ asset('img/budgetify_logo_hi_res.png') }}" class="img-fluid mb-4" alt="" style="max-height: 5vh;">
                    <div class="budget__title">
                        <h1 class="h4">Available Budget in <span class="budget__title--month">%Month%</span>:</p>
                    </div>
                    <div class="budget__value h2">+ 2,345.64</div>
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-10 col-md-4 mx-auto bg-success py-3 clearfix text-white budget__income">
                                <div class="float-left budget__income--text">
                                    <strong>Income</strong>
                                </div>
                                <div class="float-right">
                                    <div class="budget__income--value d-inline-block">+ 4,300.00</div>
                                    <div class="budget__income--percentage d-inline-block">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 col-md-4 mx-auto bg-danger py-3 clearfix text-white budget__expenses">
                                <div class="float-left budget__expenses--text">
                                    <strong>Expenses</strong>
                                </div>
                                <div class="float-right">
                                    <div class="budget__expenses--value d-inline-block">- 1,954.36</div>
                                    <div class="udget__expenses--percentage d-inline-block badge badge-light">45%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ 'js/app.js' }}"></script>
    </body>
</html>
