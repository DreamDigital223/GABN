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
                                <li class="active">
                                    <a href="#">
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
        <div class="page-container  back">
            <!-- HEADER DESKTOP-->
           @include('other.head')

           <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
               <br>
                <div class="col-lg-12 ">
                        <div class="card">
                            <div class="h5 card-header text-primary text-center">Enrégistrer un décodeur</div>
                            <div class="card-body">
                                <hr>
                                <form action="{{url('/Save_Decoder')}}" id="form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <label for="" class="col-2"></label>
                                        <div class="col-8 text-danger">
                                        <div class="form-group">
                                        <input  name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/>
                                        <input  name="shop_id_decoder" type="hidden" class="form-control" value="{{ Auth::user()->shops_id_user }}"/>
                                       <input  name="Number" type="number" minlength="14" maxlength="18" required class="form-control cc-number identified visa"
                                     placeholder="Numéro de Décodeur"   >
                                      </div>
                                    </div>
                                </div>
                                        <div class="row">
                                        <label for="" class="col-2"></label>
                                        <div class="col-8 text-danger">
                                            <div class="form-group">
                                            <select  name="client_id"  class="form-select selectto" required>
                                                <option value=""disabled selected>Client</option>
                                                @foreach ($clients as $values)
                                                <option value="{{ $values->id }}">{{ $values->FirstName}} {{ $values->LastName}}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <label for="" class="col-2"></label>
                                        <div class="col-8 text-danger">
                                            <div class="form-group">
                                                <select  name="decoder_type_id"  class="form-select selectto" required>
                                                    <option value="" disabled selected >Type de decodeur</option>
                                                    @foreach ($decoder_type as $value)
                                                    <option value="{{ $value->id}}">{{ $value->Designation_deco}}</option>
                                                    @endforeach
                                                </select>
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
                            <div class="h5 card-header text-primary text-center">Modifier un décodeur</div>
                            <div class="card-body">
                                <hr>
                                <form action="{{url('/update_decoder')}}" method="POST" id="forme">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="deco_id" name="id" />
                                    <div class="row">
                                        <label for="" class="col-2"></label>
                                        <div class="col-8 text-danger">
                                        <div class="form-group">
                                            <input  name="Number" id="Number" required minlength="14" maxlength="18" type="text" class="form-control"
                                     placeholder="Numéro de réabonnement*"   >
                                     </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-2"></label>
                                        <div class="col-8 text-danger">
                                            <div class="form-group">
                                            <select  name="client_id" id="client_id" required class="form-control select72">
                                                @foreach ($clients as $values)
                                                <option value="{{ $values->id }}">{{ $values->FirstName}} {{ $values->LastName}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <label for="" class="col-2"></label>
                                        <div class="col-8 text-danger">
                                            <div class="form-group">
                                                <select  name="decoder_type_id" required id="decoder_type_id" class="form-control select72">
                                                    @foreach ($decoder_type as $value)
                                                    <option value="{{ $value->id}}">{{ $value->Designation_deco}}</option>
                                                    @endforeach
                                                </select>
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
                       <h2 class="title-1  col-10">la liste des Décodeurs  </h2>
                       <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#exampleModal1">
                      <i class="fas fa-plus">  Ajouter</i>
                       </button>
                       
                </div>
                <br>
                  <div class="col-lg-12">
                    <!-- TOP CAMPAIGN-->
                    <div class="top-campaign">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                      <th >#</th>
                                      <th >N°Décodeur</th>
                                      <th >Client</th>
                                      <th >Type de décodeur</th>
                                      <th >Actions</th>
                                    </tr>
                                  </thead>
                                 <tbody>
                                    @foreach ($decoders as $value)
                                    <tr>
                                       <td>  {{$int++}}<input type="hidden" class="delbtn_val" value="{{ $value->id }}"></td>
                                        <td>{{ $value->Number }}</td>
                                        <td>{{ $value->FirstName."   ".$value->LastName }}</td>
                                        <td>{{ $value->Designation_deco }}</td>
                                        <td>
                                           <button type="button" value="{{$value->id}}" class="btn btn-info editbtn"> <i class="fas fa-edit"></i></button>
                                           {{-- <button type="button"  class="btn btn-danger delbtn"><i class="fas fa-trash"></i></button> --}}
                                           <button   title="Supprimer" class="btn btn-danger" onclick="return confirm('/{{$value->id }}  ');"><i class="fas fa-trash"></i></button> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--  END TOP CAMPAIGN-->
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
    function confirm(ID_Agent){ 
      Swal.fire({
        title: 'Êtes-vous vraiment sûr de supprimer ?',
        showDenyButton: true,
        denyButtonText: `Annuler`,
        confirmButtonText: 'Confirmer',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = "{{ url('/delete_decoder/')}}"+ ID_Agent ;
         
        } else if (result.isDenied) {
         
        }
      });
      }
</script>    
<script>
    $(document).ready(function() {
    
        $(document).on('click', '.editbtn', function() {
 
        var deco_id = $(this).val();
        // alert(clt_id);
        $('#editModal').modal('show');
            $.ajax({
            type: "GET",
            url: " {{ url('/edit_decoder/').'/' }}"+deco_id,
            success: function (response){
                // console.log(response.client.FirstName);
                $('#deco_id').val(response.decoder.id);
                $('#Number').val(response.decoder.Number);
                $('#client_id').val(response.decoder.client_id);
                $('#decoder_type_id').val(response.decoder.decoder_type_id);
              $('#forme').parsley();
                    $('.select72').select2({
                    dropdownParent:  $('#editModal'),
                });
            }


            });

        });

    });
</script>
<script src="{{url('resources/js/sweet-alert.min.js')}}"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
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
                    url: " {{ url('/delete_decoder/').'/' }}"+delete_id,
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
//   required:'required',
  dropdownParent: $('#exampleModal1'),
});
</script>
 
<script>
 </script>
@endsection
