<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Budgetify</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ '/' }}">
                    <img src="{{ asset('img/budgetify_logo.png') }}" alt="Example Navbar 1" class="mr-1" height="30">
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
        <section class="pt-3 pb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <div class="budget__title">
                            <h1 class="h4">Available Budget in <span class="budget__title--month">%Month%</span>:</p>
                        </div>
                        <div class="budget__value h2">+ 2,345.64</div>
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-8 col-md-6 col-lg-4 mx-auto bg-success py-2 py-md-3 clearfix text-white rounded budget__income">
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
                                <div class="col-8 col-md-6 col-lg-4 mx-auto bg-danger py-2 py-md-3 clearfix text-white rounded budget__expenses">
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
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-11 col-md-12 col-lg-8 mx-auto text-center">
                        <div class="d-block d-md-inline-block cover-block-1">
                            <div class="d-inline-block px-1 calculator-element-1">
                                <select id="inputState" class="form-control mb-2">
                                    <option selected="">+</option>
                                    <option>-</option>
                                </select>
                            </div>
                            <div class="d-inline-block px-1 px-md-auto calculator-element-2">
                                <input type="text" class="form-control mb-2" id="inlineFormInputName2" placeholder="Description">
                            </div>
                        </div>
                        <div class="d-block d-md-inline-block cover-block-2">
                            <div class="d-inline-block px-1 px-md-auto calculator-element-3">
                                <input type="number" class="form-control mb-2" id="inlineFormInputName2" placeholder="Value">
                            </div>
                            <div class="d-inline-block px-1 calculator-element-4">
                                <button class="btn btn-outline-primary mb-2 mt-1"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ 'js/app.js' }}"></script>
        <script>
            $(document).ready(function() {
                $('#inputState').select2({
                    minimumResultsForSearch: Infinity,
                    theme: 'bootstrap4'
                });
            });
        </script>
    </body>
</html>
