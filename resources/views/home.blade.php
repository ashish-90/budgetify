@extends('layouts.app')

@section('right_nav_component')
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-7">
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
                <div class="budget__value h2">+ 0.00</div>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-8 col-md-6 col-lg-4 mx-auto bg-success py-2 clearfix text-white rounded budget__income">
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
                        <div class="col-8 col-md-6 col-lg-4 mx-auto bg-danger py-2 clearfix text-white rounded budget__expenses">
                            <div class="float-left budget__expenses--text">
                                <strong>Expenses</strong>
                            </div>
                            <div class="float-right">
                                <div class="budget__expenses--value d-inline-block">- 1,954.36</div>
                                <div class="budget__expenses--percentage d-inline-block badge badge-light">45%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-3 bg-white bg_img">
    <div class="container">
        <div class="row add">
            <div class="col-11 col-md-12 col-lg-8 mx-auto text-center add__container">
                <div class="d-block d-md-inline-block cover-block-1">
                    <div class="d-inline-block px-1 calculator-element-1">
                        <select id="inputState" class="form-control mb-2 add__type">
                            <option value="inc" selected="">+</option>
                            <option value="exp">-</option>
                        </select>
                    </div>
                    <div class="d-inline-block px-1 px-md-auto calculator-element-2">
                        <input type="text" class="form-control mb-2 is-valid add__description" id="" placeholder="Description">
                    </div>
                </div>
                <div class="d-block d-md-inline-block cover-block-2">
                    <div class="d-inline-block px-1 px-md-auto calculator-element-3">
                        <input type="number" class="form-control mb-2 is-valid add__value" id="" placeholder="Value">
                    </div>
                    <div class="d-inline-block px-1 calculator-element-4">
                        <button class="btn btn-outline-success mb-2 mt-1 add__btn"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container">
        <div class="row inc-exp-container">
            <div class="col-md-6 px-md-2 px-lg-3 px-xl-4">
                <div class="card">
                    <div class="card-body p-3 p-lg-4 income">
                        <h4 class="text-success income__title">Income</h4>
                        <ul class="list-group list-group-flush income__list"></ul>
                    </div>
                </div>
                <hr class="d-md-none">
            </div>
            <div class="col-md-6 px-md-2 px-lg-3 px-xl-4">
                <div class="card ">
                    <div class="card-body p-3 p-lg-4 expenses">
                        <h4 class="text-danger expenses__title">Expenses</h4>
                        <ul class="list-group list-group-flush expenses__list"></ul>
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
<script src="{{ asset('js/calculator.js') }}"></script>
@endsection