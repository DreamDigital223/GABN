@extends('user.layout.app')
@section('content')
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    @include('other.logo')
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{url('/Dashbord')}}">
                                    <i class="fas fa-home"></i>
                                    <span class="bot-line"></span>Home </a>
                            </li>
                            <li class="has-sub">
                                <a href="{{url('/Liste_Client')}}">
                                    <i class="fas fa-users"></i>
                                    <span class="bot-line"></span>Client</a>
                            </li> 
                            <li class="active">
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
                                        <div class="row">
                                            <label for="" class="col-2"></label>
                                            <div class="col-8 text-danger">
                                            <div class="form-group">
                                            <input  name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/>
                                            <input  name="shop_id_decoder" type="hidden" class="form-control" value="{{ Auth::user()->shops_id_user }}"/>
                                           <input  name="Number" type="number" minlength="14" maxlength="14" required class="form-control cc-number identified visa"
                                         placeholder="Numéro du décodeur"   >
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
                                                <select  name="decoder_type_id" id="decoder_type_id" required class="form-control select72">
                                                    @foreach ($decoder_type as $value)
                                                    <option value="{{ $value->id}}">{{ $value->Designation_deco}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <label for="" class="col-2"></label>
                                        <div class="col-8 text-danger">
                                        <div class="form-group">
                                            <input  name="Number" id="Number" type="text" class="form-control"
                                            placeholder="Numéro de réabonnement" minlength="14" maxlength="14">
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
            <!-- END WELCOME-->
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
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <h3 class="title-5 m-b-35 col-10">Liste des décodeurs</h3>
                                <button type="button" class="btn btn-dark col-2" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fas fa-plus">  Ajouter un décodeur</i>
                                </button>
                            </div>
                            <br>
                            <style>
                                .mlml{
                                    background-image: -moz-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
                                    background-image: -webkit-linear-gradient(90deg, #ee0979 0%, #09116874 100%);
                                    background-image: -ms-linear-gradient(90deg, #ee0979 0%, #170d83ce 100%);
                                }
                            </style>
                            <div class="table-responsive mlml table-responsive-data2">
                                <table class="table table-data2" id="datatable">
                                    <thead>
                                        <tr>
                                            <th >#</th>
                                            <th >N°Décodeur</th>
                                            <th >Client</th>
                                            <th >N°Abonné</th>
                                            <th >Type de décodeur</th>
                                            <th >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach  ($decoders as $value)
                                       <tr>
                                          <td>  {{$int++}}<input type="hidden" class="delbtn_val" value="{{ $value->id }}"></td>
                                           <td>{{ $value->Number }}</td>
                                           <td>{{ $value->FirstName."   ".$value->LastName }}</td>
                                           <td>{{ $value->phone }}</td>
                                           <td>{{ $value->Designation_deco }}</td>
                                           <td>
                                            {{-- <button type="button"  class="h4 text-danger delbtn"><i class="fas fa-trash"></i></button> --}}
                                           <button   title="Supprimer" class="h5 text-danger" onclick="return confirm('/{{$value->id }}  ');"><i class="fas fa-trash"></i></button> 
                                            <button type="button" value="{{$value->id}}" class="h4 text-info editbtn"> <i class="fas fa-edit"></i></button>
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
  dropdownParent: $('#exampleModal1'),
});
</script>
 
<script>
 </script>
@endsection


