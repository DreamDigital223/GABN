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
                        <li class="active">
                                    <a href="#">
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

           @include('other.action')
                    
            <!-- MAIN CONTENT-->
            <div class="main-content">
            
                <div class="section__content section__content--p30">
                      
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
                       <div class="row">
                        <h2 class="title-1  col-10">la liste des clients  </h2>
                        <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#exampleModalCenter">
                       <i class="fas fa-plus">  Ajouter</i>
                        </button>
                        </div>
                        <br>
                        <div class="col-lg-12">
                          <!-- TOP CAMPAIGN-->
                          <div class="top-campaign">
                              <div class="table-responsive">
                                        <br>
                                        <table class="table table-bordered table-hover" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th >Numéro</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Téléphone</th>
                                                    <th>Quartier</th>
                                                    <th >Actions</th>
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
                                                        {{-- <button type="button"  class="h5 text-danger delbtn"><i class="fas fa-trash"></i></button> --}}
                                                       <button type="button" value="{{$value->id}}" class="h5 text-info editbtn"> <i class="fas fa-edit"></i></button>
                                                       
                                                       <button   title="Supprimer" class="h5 text-danger" onclick="return confirm('/{{$value->id }}  ');"><i class="fas fa-trash"></i></button> 
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
