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

        
           <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
               <br>
                <div class="col-lg-12 ">
                        <div class="card">
                            <div class="h5 text-primary card-header text-center">Ajouter le point de vente et le rôle </div>
                            <div class="card-body">
                                <hr>
                                <form action="{{url('/update_user')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="user_id" name="id" />
                                    <input  name="user_id_user" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="">Point de vente</label>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <select  name="shops_id_user" id="shops" type="text" class="form-select selectto">
                                                    @foreach ($shops as $value)
                                                    <option value="{{$value->id}}">{{$value->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="">Rôle</label>
                                        </div>
                                        <div class="col-6">
                                            <select  name="role_id" id="role" type="text" class="form-select selectto">
                                                    @foreach ($role as $value)
                                                    <option value="{{$value->id}}">{{$value->designation}}</option>
                                                    @endforeach
                                            </select>
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
            <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                   <br>
                    <div class="col-lg-12 ">
                            <div class="card">
                                <div class="h5 text-primaryx card-header text-center">Rénitialiser le mot de passe</div>
                                <div class="card-body">
                                    <hr>
                                    <form action="{{url('/edit_pass')}}" method="POST" id="form">
                                        @csrf
                                        @method('PUT')
                                        <input  name="user_id_user" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/>
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="">
                                                    <input type="hidden" class="form-control" id="id_user" name="id" /></label>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <input type="password" id="mail" required class="form-control" name="password">
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
                       @if ($errors->any())
                       @foreach ($errors->all() as $error)
                           <div class="text text-danger"> {{$error}} </div>
                       @endforeach
                       @endif 
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
                                <div class=" m-t-30 col-12">
                                    <div class="row">
                                    <h2 class="title-1 text-white col-10">la liste des Users  </h2>
                                    <div class="table-responsive m-b-30 ">
                                        <br>
                                        <table class="table table-data2" id="">
                                            <thead>
                                                <tr>
                                                    <th><h5>Nom</h5> </th>
                                                    <th><h5>Téléphone</h5></th>
                                                    <th><h5>Mail</h5></th>
                                                    <th><h5>Point de vente</h5></th>
                                                    <th><h5>Rôle</h5></th>
                                                    <th><h5>Actions</h5></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($User as $value)
                                                <tr >
                                                    
                                                    <td class="desc"><input type="hidden" class="delbtn_val" value="{{$value->id}}">{{$value->name}}</td>
                                                    
                                                    <td >{{$value->phone}}</td>
                                                    <td >{{$value->email}}</td>
                                                    <td >{{$value->libelle}}</td>
                                                    <td >{{$value->designation}}</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                                <i class="zmdi zmdi-mail-send"></i>
                                                            </button> --}}
                                                            <button class="item editbtn" value="{{$value->id}}"   title="Modifier">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                            
                                                            <button class="item editbtn1" value="{{$value->id}}"   title="Modifier">
                                                                <i class="fas fa-edit"></i>
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
                                <div class="row m-t-30 ">
                             <div class="col-lg-12">
                                <!-- DATA TABLE-->
                              
                            </div>
                          </div>
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
@section('scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '.editbtn', function() {
 
        var clt_id = $(this).val();
        // alert(clt_id);
        $('#editModal').modal('show');
            $.ajax({
            type: "GET",
            url: " {{ url('/edit_user/').'/' }}"+clt_id,
            success: function (response){
                // console.log(response.client.FirstName);
                $('#user_id').val(response.User.id);
                $('#shops').val(response.User.shops_id_user);
                $('#role').val(response.User.role_id);
                $('.selectto').select2();
            }


            });

        });

    });
    
    $(document).ready(function() {

$(document).on('click', '.editbtn1', function() {

var clt_id = $(this).val();
// alert(clt_id);
$('#editModal1').modal('show');
    $.ajax({
    type: "GET",
    url: " {{ url('/edit_user/').'/' }}"+clt_id,
    success: function (response){
        // console.log(response.client.FirstName);
        $('#id_user').val(response.User.id);
        $('#mll').val(response.User.password);
        $('.selectto').select2();
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
                    url: " {{ url('/delete_user/').'/' }}"+delete_id,
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
