@extends('user.layout.app')
@section('content')
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    @include('other.logo')
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="{{url('/Dashbord')}}">
                                    <i class="fas fa-home"></i>
                                    <span class="bot-line"></span>Home </a>
                            </li>
                            <li class="active">
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

            @include('other.action')
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
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            
        @if (session()->has('success'))
        <div class="text-center">
        <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content ">{{session()->get('success')}} .</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
        </div>
        </div> 
         @endif
            <!-- END WELCOME-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <h3 class="title-5 m-b-35 col-10">Liste des clients</h3>
                                <button type="button" class="btn btn-dark col-2" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fas fa-plus">  Ajouter un client</i>
                                </button>
                            </div>
                            <br>
                            
                        <style>
                            .mmmm {
                                        background-image: -moz-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
                                        background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
                                        background-image: -ms-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
                                    }
                        </style>
                            <div class="table-responsive mmmm table-responsive-data2">
                                <table class="table table-data2" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Téléphone</th>
                                            <th>Quartier</th>
                                            <th  width="200">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach  ($clients as $value)
                                        <tr>
                                           <td>  {{$int++}}<input type="hidden" class="delbtn_val" value="{{ $value->id }}"></td>
                                            <td>{{ $value->FirstName }}</td>
                                            <td>{{ $value->LastName }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->quartier }}</td>
                                            <td>
                                                <button   title="Supprimer" class="h5 text-danger" onclick="return confirm('/{{$value->id }}  ');"><i class="fas fa-trash"></i></button> 
                                                 {{-- <button type="button"  class="h5 text-danger delbtn"><i class="fas fa-trash"></i></button> --}}
                                                <button type="button" value="{{$value->id}}" class="h5 text-info editbtn"> <i class="fas fa-edit"></i></button>
                                                {{--  <a href="{{url('/Delete').'/'.$value->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>  --}}
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @include('footer')
                        </div>
                    </div>
                </div>
            </section>
        
@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {

        $(document).on('click', '.editbtn', function() {
 
        var clt_id = $(this).val();
        // alert(clt_id);
        $('#editModal').modal('show');
            $.ajax({
            type: "GET",
            url: " {{ url('/edit_client/').'/' }}"+clt_id,
            success: function (response){
                // console.log(response.client.FirstName);
                $('#FirstName').val(response.client.FirstName);
                $('#LastName').val(response.client.LastName);
                $('#phone').val(response.client.phone);
                $('#quartier').val(response.client.quartier);
                $('#clt_id').val(response.client.id);
                $('#forme').parsley();
            }


            });

        });

    });
</script>
<script>
    function confirm(ID_Agent){
        Swal.fire({
        title: 'Êtes-vous vraiment sûr de supprimer ?',
        showDenyButton: true,
        confirmButtonText: 'Confirmer',
        denyButtonText: `Annuler`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
            window.location.href = "{{ url('/delete_client/')}}"+ ID_Agent ;
            
            } else if (result.isDenied) {
            
            }
        });
      }
</script> 
<script>
$(document).ready(function() {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });  

    $('.delbtn').click(function (e) {

        e.preventDefault();
        var delete_id = $(this).closest('tr').find('.delbtn_val').val();
//   alert(delete_id)
  swal({
            title: "Êtes-vous sûre?",
            text: " vous ne pourrez plus récupérer ce fichier imaginaire !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                
                var data = {
                 
                    "_token" : $('input[name=_token]').val(),
                    "id": delete_id,
                };
                $.ajax({
                    type: "DELETE",
                    url: " {{ url('/delete_client/').'/' }}"+delete_id,
                    data: data,
                    success: function (response) {
                        swal(response.status, {
                            icon: "success",
                        })
                        
                         .then((willDelete) => {
                            location.reload();
                         });
                    }
                });
                
            } 
        });

    });

});
</script>


@endsection

