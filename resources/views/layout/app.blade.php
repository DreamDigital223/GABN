<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{$title}}</title>
    <link
    rel="stylesheet"
    type="text/css"
    href="{{url('template/assets/libs/select2/dist/css/select2.min.css')}}"
   >
    <!-- Fontfaces CSS-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="{{url('/template/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    
    <!-- Vendor CSS-->
    <link href="{{url('/template/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('/template/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    {{-- <link rel="stylesheet" href="http://parsley.org/src/parlsey.css"> --}}
    <!-- Main CSS-->
    <link href="{{url('/template/css/theme.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{url('/resources/css/style.css')}}">
</head>
<body class="animsition ">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="#" class="col-lg-5">
                            <img src="{{url('template/').'/'}}images/azert.png" width="50" height="200" alt="CoolAdmin" />
                        </a>
                        <strong class="text-black">DREAM DIGITAL</strong>  
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li >
                            <a  href="{{route('dashbord')}}">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{url('/Liste_Client')}}">
                             <i class="fas fa-users"></i> Clients</a>
                        </li>
                        <li>
                            <a href="{{url('/Liste_Decoder')}}">
                             <i class="fas fa-desktop"></i> Décodeur</a>
                        </li>
                        <li class="active">
                            <a href="{{url('/Liste_User')}}">
                             <i class=" fas fa-user-plus"></i> Utilisateurs</a>
                        </li>
                        <li>
                            <a href="{{url('/Liste_Abonnement')}}">
                             <i class="fas fa-download"></i> Abonnement</a>
                        </li> 
                        <li>
                            <a href="{{url('/Liste_shop')}}">
                             <i class=" fas fa-cart-plus"></i> Point de vente</a>
                        </li>
                        <li>
                                <a href="{{url('/profile')}}">
                                    <i class="fas fa-user"></i>Profile</a>
                        </li>
                        <li>
                                <a href="{{url('/logout')}}">
                                    <i class="fas fa-power-off"></i>Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
@yield('content')

    </div>

    <!-- Jquery JS-->
    <script src="{{url('resources/js/sweet-alert.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('/template/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{url('/template/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{url('/template/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{url('/template/vendor/wow/wow.min.js')}}"></script>
    <script src="{{url('/template/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{url('/template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{url('/template/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('/template/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{url('/resources/js/sweetalert.js')}}"></script>

    <script src="{{url('/template/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{url('/template/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('/template/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script> --}}
    
    <script >
      var table = $('#datatable').DataTable({
    "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher  _MENU_   éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                },
                
            }, 
} );
  </script>
<script src="{{url('resources/js/parsley.min.js')}}"></script>
<script src="{{url('resources/js/sweet-alert2.js')}}"></script>
<script>
    $('#form').parsley();
  </script>
    <script src="{{url('/template/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{url('/template/assets/libs/select2/dist/js/select2.min.js')}}"></script>
@yield('scripts')
    <!-- Main JS-->
    <script src="{{url('/template/js/main.js')}}"></script>

</body>

</html>