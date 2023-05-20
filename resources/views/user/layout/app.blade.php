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

    <!-- Fontfaces CSS-->
    <link href="{{url('template/').'/'}}css/font-face.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   
   <!-- Vendor CSS-->
    <link href="{{url('template/').'/'}}vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="{{url('template/').'/'}}vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{url('/resources/css/style.css')}}">
  
    
    <!-- Main CSS-->
    <link href="{{url('template/').'/'}}css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        @yield('content')
    </div>
    <!-- Jquery JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('template/').'/'}}vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{url('template/').'/'}}vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{url('template/').'/'}}vendor/slick/slick.min.js">
    </script>
    <script src="{{url('template/').'/'}}vendor/wow/wow.min.js"></script>
    <script src="{{url('template/').'/'}}vendor/animsition/animsition.min.js"></script>
    <script src="{{url('template/').'/'}}vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{url('template/').'/'}}vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{url('template/').'/'}}vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{url('template/').'/'}}vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{url('template/').'/'}}vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{url('template/').'/'}}vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{url('template/').'/'}}vendor/select2/select2.min.js"></script>
    <script src="{{url('resources/js/sweet-alert.min.js')}}"></script>
   @yield('scripts')
    <!-- Main JS-->
    <script src="{{url('template/').'/'}}js/main.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{url('/resources/js/sweetalert.js')}}"></script>
    
    <script src="https://cdn.datatables.net/1.13.4//js/jquery.dataTables.min.js"></script>

    <script src="{{url('resources/js/parsley.min.js')}}"></script>
    <script>
        $('#form').parsley();
    </script>
    <script src="{{url('resources/js/sweet-alert2.js')}}"></script>
    <script >
      var table = $('#datatables').DataTable({
    "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "afficher _MENU_ éléments",
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

</body>

</html>