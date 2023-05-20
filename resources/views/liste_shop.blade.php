
@extends('layout.app')
@section('content')
    
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            @include('layout.logo')
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                         <li >
                            <a  href="{{route('dashbord')}}">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                               <li >
                                    <a href="{{url('/Liste_Client')}}">
                                     <i class="fas fa-users"></i> Clients</a>
                                </li>
                               
                                <li>
                                    <a href="{{url('/Liste_Decoder')}}">
                                     <i class="fas fa-desktop"></i> Décodeur</a>
                                </li>
                                <li>
                                    <a href="{{url('/Liste_User')}}">
                                     <i class=" fas fa-user-plus"></i> Utilisateurs</a>
                                </li>
                                <li>
                                    <a href="{{url('/Liste_Abonnement')}}">
                                     <i class="fas fa-download"></i> Abonnement</a>
                                </li> 
                                <li class="active">
                                    <a href="#">
                                     <i class=" fas fa-cart-plus"></i> Point de vente</a>
                                </li>
                                {{-- <li>
                                    <a href="{{url('/profile')}}">
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
        <div class="page-container back">
            <!-- HEADER DESKTOP-->
           @include('other.head')

           <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
               <br>
                <div class="col-lg-12 ">
                        <div class="card">
                            <div class="h5 text-primary card-header text-center">Ajouter un point de vente</div>
                            <div class="card-body">
                                <hr>
                                <form action="{{url('/Save_Shop')}}" method="POST" id="form">
                                    @csrf

                                    <div class="row text-danger">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="libelle" type="text" class="form-control cc-number identified visa"
                                             placeholder="Designation *"  required >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="adresse" type="text" class="form-control cc-number identified visa"
                                                placeholder="Adresse *" required><span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                         
                                            </div>
                                        </div>
                                    </div>
                              
                                    <div class="row text-danger">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="mail" type="email" class="form-control cc-number identified visa"
                                                placeholder="Adresse Mail *"  required  >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="phone" type="number" class="form-control cc-number identified visa"
                                           placeholder="Téléphone *"  required minlength="8" maxlength="12" >
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-12 text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"> Annuler</i></button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"> Enrégistrer</i>  </button>
                                     
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>


           <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
               <br>
                <div class="col-lg-12 ">
                        <div class="card">
                            <div class="h5 text-primary card-header text-center">Modifier un décodeur</div>
                            <div class="card-body">
                                <hr>
                                <form action="{{url('/update_shop')}}" method="POST" id="forme">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="shop_id" name="id" />
                                    <div class="row text-danger">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="libelle" id="libelle" required type="text" class="form-control cc-number identified visa"
                                             placeholder="Designation *"   >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="adresse" id="adresse" type="text" class="form-control cc-number identified visa"
                                                placeholder="Adresse *" required>
                                            </div>
                                        </div>
                                    </div>
                              
                                    <div class="row text-danger">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="mail" type="mail" id="mail" class="form-control cc-number identified visa"
                                                placeholder="Adresse Mail *"    required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input  name="phone" type="tel" id="phone" class="form-control cc-number identified visa"
                                           placeholder="Téléphone *"  required minlength="8"  maxlength="12">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-12 text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"> Annuler</i></button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"> Modifier</i>  </button>
                                     
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                  
            <!-- MAIN CONTENT-->
            <div class="main-content">
            
                <div class="section__content section__content--p30">
                       {{-- @if ($errors->any())
                       @foreach ($errors->all() as $error)
                           <div class="text text-danger"> {{$error}} </div>
                       @endforeach
                       @endif  --}}
                       <h4>
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
                       </h4>
                       <br>
                        <div class="row">
                                <h2 class="title-1 text-white col-10">la liste des Point de ventes  </h2>
                                <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#exampleModal1">
                                    <i class="fas fa-plus">  Ajouter</i>
                                     </button>
                              
                            </div>
                    <br>
                    <div class="table-responsive table-responsive-data2" >
                        <table class="table table-data2" >
                            <thead>
                                <tr>
                                    <th><h4>Raison-social</h4> </th>
                                    <th><h4>Mail </h4> </th>
                                    <th> <h4>Adresse</h4></th>
                                    <th><h4>Téléphone</h4></th>
                                    <th><h4>Actions</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($shops as $value)
                                <tr >
                                    
                                    <td class="desc"><input type="hidden" class="delbtn_val" value="{{ $value->id }}">{{$value->libelle}}</td>
                                    <td>
                                        <span class="block-email status--process">{{$value->mail}}</span>
                                    </td>
                                    <td class="text-danger">{{$value->adresse}}</td>
                                    <td class="text-dark">{{$value->phone}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button> --}}
                                            <button class="item editbtn" value="{{$value->id}}"   title="Modifier">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item delbtn"  title="Supprimer">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
@section('scripts')
<script>
    $(document).ready(function() {
    
        $(document).on('click', '.editbtn', function() {
 
        var shop_id = $(this).val();
        // alert(clt_id);
        $('#editModal').modal('show');
            $.ajax({
            type: "GET",
            url: " {{ url('/edit_shop/').'/' }}"+shop_id,
            success: function (response){
                // console.log(response.client.FirstName);
                $('#shop_id').val(response.shop.id);
                $('#libelle').val(response.shop.libelle);
                $('#phone').val(response.shop.phone);
                $('#adresse').val(response.shop.adresse);
                $('#mail').val(response.shop.mail);
                $('#forme').parsley();
            }


            });

        });

    });
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    url: " {{ url('/delete_shop/').'/' }}"+delete_id,
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
<script>
 $('.selectto').select2({
  placeholder: 'Selectionner ' ,
  dropdownParent: $('#exampleModal1'),
});
</script>
 
<script>
    $('.select672').select2({
     dropdownParent:  $('#editModal'),
   });
 </script>
@endsection
