@extends('layout.app')
@section('content')
  
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            @include('layout.logo')
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                         <li class="active">
                            <a  href="{{route('dashbord')}}">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <li>
                                    <a href="{{ url('/Liste_Client') }}">
                                     <i class="fas fa-users"></i> Clients</a>
                                </li>
                                <li>
                                    <a href="{{url('/Liste_Decoder')}}">
                                     <i class="fas fa-desktop"></i> Décodeur</a>
                                </li>
                                <li>
                                    <a href="{{url('/Liste_Abonnement')}}">
                                     <i class="fas fa-download"></i> Abonnement</a>
                                </li>
                                <li>
                                    <a href="{{url('/Liste_User')}}">
                                     <i class=" fas fa-user-plus"></i> Utilisateurs</a>
                                </li>
                                <li>
                                    <a href="{{url('/Liste_shop')}}">
                                     <i class=" fas fa-cart-plus"></i> Point de vente</a>
                                </li>
                            {{-- <li>
                                <a href="{{route('profile.edit')}}">
                                    <i class="fas fa-user"></i>Profile</a>
                            </li> --}}
                        <li>
                            <a href="{{url('/logout')}}">
                                <i class="fas fa-power-off"></i>Déconnexion</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container"><header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                            <input class="au-input au-input--xl" type="hidden" name="search" placeholder="Search for datas &amp; reports..." />
                           
                        </form>
                        {{-- <div > <strong class="text-black">BIENVENUE  {{ Auth::user()->name }} !</strong>   </div> --}}
                        <div class="header-button">
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
                        </div>
                        <div class="header-button">
                            <div class="noti-wrap">
                                <div > <strong class="text-black">  {{ Auth::user()->name }}   </strong>  <a href="{{url('/profile')}}" class="h3"><i class="fas fa-user"></i></a>  </div>
                               
                            </div>
                        </div>
                         
                    </div>
                </div>
            </div>
        </header>
       
           @include('other.action')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                       
                    @foreach ($CAF as $mo)
             <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number text-white">{{$mo->mount}}</h2>
                                <br>
                                <div class="h4 text-dark">  Chiffres d'affaire</div>
                                <div class="icon">
                                    <i class="fas fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                
                    @endforeach          
                    @foreach ($ca as $moh)
                                @if ($moh->mount ==null)
                                <h2 class="number">{{0}}</h2>
                                @else
                                <h2 class="number">{{$moh->mount}}</h2>
                                @endif
                                <br>
                                <div class="h5 text-dark">Ventes journalières</div>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">{{$moh->count}}</h2>
                                <br>
                                <div class="h5 text-dark"> Abonnement du jour</div>
                                <div class="icon">
                                    <i class="fas fa-download"></i>
                                </div>
                            </div>
                        </div>    
                        @endforeach
                        <div class="col-md-4 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">{{$clients}}</h2>
                                <br>
                                <div class="h4 text-dark">  Mes clients</div>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                   
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
                       
                        <div class="row">
                            <div class="col-md-12">
                                @include('footer')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
 <!-- Jquery JS-->
 

   @endsection
<!-- end document-->
