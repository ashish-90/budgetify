@extends('layouts.skeleton')

@section('right_nav_component')
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-7">
            <a class="dropdown-item" href="#"><i class="fas fa-wrench mr-2"></i> Settings</a>
            <a 
            class="dropdown-item" 
            href="{{ route('logout') }}" 
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off mr-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>                     
        </div>
    </li>
</ul>
@endsection

@section('content')
<section class="py-3 bg-white bg_img">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <div class="budget__title">
                    <h1 class="h4 mb-3">Available Budget in <span class="budget__title--month">%Month%</span>:</h1>
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
<section class="pt-2 pb-3 bg-white bg_img">
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
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 px-md-2 px-lg-3 px-xl-4">
                <div class="card">
                    <div class="card-body p-3 p-lg-4">
                        <h3 class="text-success">Income</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 clearfix">
                                <div class="float-left">
                                    <span class="">Income 1</span>
                                </div>
                                <div class="float-right">
                                    <span class="text-success mr-2">+ 2000.00</span>
                                    <span class="badge badge-pill border border-success bg-white text-success"><i class="fas fa-times"></i></span>
                                </div>
                            </li>
                            <li class="list-group-item px-0 clearfix">
                                <div class="float-left">
                                    <span class="">Income 1</span>
                                </div>
                                <div class="float-right">
                                    <span class="text-success mr-2">+ 2000.00</span>
                                    <span class="badge badge-pill border border-success bg-white text-success"><i class="fas fa-times"></i></span>
                                </div>
                            </li>
                            <li class="list-group-item px-0 clearfix">
                                <div class="float-left">
                                    <span class="">Income 1</span>
                                </div>
                                <div class="float-right">
                                    <span class="text-success mr-2">+ 2000.00</span>
                                    <span class="badge badge-pill border border-success bg-white text-success"><i class="fas fa-times"></i></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="d-md-none">
            </div>
            <div class="col-md-6 px-md-2 px-lg-3 px-xl-4">
                <div class="card">
                    <div class="card-body p-3 p-lg-4">
                        <h3 class="text-danger">Expenses</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 clearfix">
                                <div class="float-left">
                                    <span class="">Expense 1</span>
                                </div>
                                <div class="float-right">
                                    <span class="text-danger mr-2">+ 2000.00</span>
                                    <span class="badge badge-danger">60%</span>
                                    <span class="badge badge-pill border border-danger bg-white text-danger ml-2"><i class="fas fa-times"></i></span>
                                </div>
                            </li>
                            <li class="list-group-item px-0 clearfix">
                                <div class="float-left">
                                    <span class="">Expense 1</span>
                                </div>
                                <div class="float-right">
                                    <span class="text-danger mr-2">+ 2000.00</span>
                                    <span class="badge badge-danger">60%</span>
                                    <span class="badge badge-pill border border-danger bg-white text-danger ml-2"><i class="fas fa-times"></i></span>
                                </div>
                            </li>
                            <li class="list-group-item px-0 clearfix">
                                <div class="float-left">
                                    <span class="">Expense 1</span>
                                </div>
                                <div class="float-right">
                                    <span class="text-danger mr-2">+ 2000.00</span>
                                    <span class="badge badge-danger">60%</span>
                                    <span class="badge badge-pill border border-danger bg-white text-danger ml-2"><i class="fas fa-times"></i></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="d-md-none">
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#inputState').select2({
            minimumResultsForSearch: Infinity,
            theme: 'bootstrap4'
        });
    });
</script>
@endsection