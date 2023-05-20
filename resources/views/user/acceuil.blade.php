@extends('user.layout.app')
@section('content')
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                  @include('other.logo')
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="active">
                                <a href="#">
                                    <i class="fas fa-home"></i>
                                    <span class="bot-line"></span>Home </a>
                            </li>
                            <li class="has-sub">
                                <a href="{{url('/Liste_Client')}}">
                                    <i class="fas fa-users"></i>
                                    <span class="bot-line"></span>Client</a>
                            </li> 
                            <li class="has-sub">
                                <a href="{{url('/Liste_Decoder')}}">
                                    <i class="fas fa-desktop"></i>
                                    <span class="bot-line"></span>Décodeur</a>
                            </li>
                            <li class="has-sub">
                                <a href="{{url('/Liste_Abonnement')}}">
                                    <i class="fas fa-download"></i>
                                    <span class="bot-line"></span>Abonnement</a></a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="noti-wrap">
                            <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-notifications"></i>
                                <span class="quantity">{{count($select)}}</span>
                                <div class="account-dropdown js-dropdown">
                                    <br>
                                        <div class="content text-center">
                                            <h5>
                                                <div class="h4"> Notifications</div></h5>
                                        </div><hr>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item ml-2 mr-2">
                                            @foreach ($select as $sel)
                                                <div>Fin d'abonnement du décodeur N° <strong class="text-danger text-gray">{{$sel->Number}}</strong> au <span class="text-info text-gray">{{$sel->EndDate}}</span></div>  <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    <div class="header__tool">
                       
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{url('/profile')}}">
                                                <i class="zmdi zmdi-account"></i>Profile</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{url('/logout')}}">
                                            <i class="zmdi zmdi-power"></i>Déconnexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        @include('user.head')
        
        <div class="page-content--bgf7">
           <br>
            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Bienvenue
                                <span>{{ Auth::user()->name }}!</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC--> 
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-dollar"></i>
                                            </div>
                                             @foreach ($CAF as $oklm)
                                            <div class="text">
                                                <h2>{{$oklm->mount}}</h2>
                                                <br>
                                                <h4>Chiffres d'affaire</h4>
                                            </div>
                                            @endforeach
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            @foreach ($ca as $ca)
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                @if ($ca->mount== null)
                                                <h2>{{0}}</h2>
                                                @else
                                                <h2>{{$ca->mount}}</h2>
                                                @endif
                                                <br>
                                                <h5>Ventes journalières</h5>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-download"></i>
                                            </div>
                                            <a href="{{url('/Liste_Abonnement')}}">
                                            <div class="text">
                                                <h2>{{$ca->count}}</h2>
                                                <br>
                                                <h5>Abonnement du jour</h5>
                                            </div>
                                        </a>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-desktop"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$clients}}</h2>
                                                <br>
                                                <h4>Mes clients</h4>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        @endforeach
             {{-- <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">{{$decoder}}</h2>
                                <br>
                                <span class="desc">Décodeur</span>
                                <div class="icon">
                                    <i class="fas fa-desktop"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">{{$shop}}</h2>
                                <br>
                                <span class="desc">Boutiques</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">{{$abonnement}}</h2>
                                <br>
                                <span class="desc">Abonnements</span>
                                <div class="icon">
                                    <i class="fas fa-download"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">{{$clients}}</h2>
                                <br>
                                <span class="desc">Clients</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- END STATISTIC-->

           
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Fin d'abonnement de la semaine</h2>
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Télephone</th>
                                    <th>decoder</th>
                                    <th>Numéro</th>
                                     <th>Fin Abonnement</th>
                                    {{--<th class="text-right">total</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($select as $row)
                                <tr>
                                    <td>{{$row->FirstName."  ".$row->LastName}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->Designation_deco}}</td>
                                    <td >{{$row->Number}}</td>
                                    <td>{{ date('d/m/Y', strtotime($row->EndDate)) }}</td>
                                   {{-- <td class="text-right">$30.00</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @include('footer') 
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
@endsection

