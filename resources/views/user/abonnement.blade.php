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
                            <li class="has-sub">
                                <a href="{{url('/Liste_Decoder')}}">
                                    <i class="fas fa-desktop"></i>
                                    <span class="bot-line"></span>Décodeur</a>
                            </li>
                            <li class="active">
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

        <!-- HEADER MOBILE-->
        @include('user.head')
        <div class="page-content--bgf7">
           <br>
            <!-- WELCOME-->
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                   <br>
                    <div class="col-lg-12 ">
                            <div class="card">
                                <div class="h5 text-prymari card-header text-center">Ajouter un abonnement</div>
                                <div class="card-body">
                                    <form action="{{ url('/Save_Abonnement')}}" method="POST">
                                        @csrf
                                       
                                        <div class="row">
                                           
                                            <div class="col-3">
                                                <div class="form-group">
                                                    {{-- <input class="form-control"  type="text" name="EndDate" placeholder="Date fin" onfocus="this.type='date'" onblur="this.type='text'"> --}}

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group"> 
                                                   <input  name="user_id_abn" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/>
                                                   <input  name="shop_id_abonnement" type="hidden" class="form-control" value="{{ Auth::user()->shops_id_user }}"/>
                                                   <input class="form-control text-center" placeholder="Date début" required type="text" name="StartDate" onfocus="this.type='date'" onblur="this.type='text'">
                                               </div>
                                           </div>
                                        </div>
                                  
                                        <div class="row">
                                            <div class="col-6">
                                                 <div class="form-group">
                                                   <select  name="decoder_id" onchange="OnSelectChange(this)" id="id_clt"  required  class="selectto moh223 colo form-select">
                                                        <option value=""disabled selected>Le décodeur</option>
                                                        @foreach ($decoders as $values)
                                                        <option data-capacity="{{ $values->decoder_type_id }}" value="{{ $values->id }}">{{ $values->Number}} </option>
                                                        @endforeach
                                                    </select>
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-select selectto" onchange="edit(this.value)" required name="abonnement_type_id" id="client_id" >
                                                      {{--   <option   value=""disabled selected>Type d'Abonnement</option>
                                                        @foreach ($abonnement_type as $values)
                                                        <option value="{{ $values->id }}">{{$values->Designation_abn}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                   </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="last" disabled>
                                                        <option value="">Téléphone</option>
                                                        @foreach ($client as $values)
                                                        <option value="{{ $values->id }}">{{ $values->phone}} </option>
                                                        @endforeach
                                                    </select>
                                                 </div>
                                            </div>
                                            <div class="col-6">
                                               
                                                <div class="form-group">
                                                    <input class="form-control" id="prix_abn" name="password" placeholder="Prix" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="molo" disabled>
                                                        <option value="">Nom | Prénom</option>
                                                        @foreach ($client as $values)
                                                        <option value="{{ $values->id }}">{{ $values->LastName."  ".$values->FirstName}} </option>
                                                        @endforeach
                                                    </select>
                                                 </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="type" disabled>
                                                        <option value="">Type de décodeur</option>
                                                        @foreach ($decoder_type as $values)
                                                        <option value="{{ $values->id }}">{{ $values->Designation_deco}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div id="infos"></div>
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
        
                {{-- Modal d'ajout decodeur --}}
             
    
    
               <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                   <br>
                    <div class="col-lg-12 ">
                            <div class="card">
                                <div class="h5 text-primary card-header text-center">Modifier un décodeur</div>
                                <div class="card-body">
                                    <hr>
                                    <form action="{{url('/update_abonnement')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="abn_id" name="id" />
                                        
                                        <div class="row">
                                           
                                            <div class="col-3">
                                                <div class="form-group">
                                                    {{-- <input  name="EndDate" id="EndDate" type="date" class="form-control " >--}}
                                                 
                                                </div>
                                            </div> 
                                            <div class="col-6">
                                                <div class="form-group"> 
                                                   <input  name="StartDate" id="StartDate" type="date" class="form-control text-center" required
                                               >  </div>
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                 <div class="form-group"> 
                                                    <select  name="decoder_id" id="decoder_id" onchange="selectTeam()"  class="form-select  select72">
                                                        @foreach ($decoders as $values)
                                                        <option data-capacity="{{ $values->decoder_type_id }}" value="{{ $values->id }}">{{ $values->Number}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select  name="abonnement_type_id" id="abonnement_type_id" onchange="editee(this.value)" class="form-select select72">
                                                        @foreach ($abonnement_type as $value)
                                                        <option value="{{ $value->id}}">{{ $value->Designation_abn}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="laste" disabled>
                                                        <option value="">Téléphone</option>
                                                        @foreach ($client as $values)
                                                        <option value="{{ $values->id }}">{{ $values->phone}} </option>
                                                        @endforeach
                                                    </select>
                                                 </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="prix_abne" name="password" placeholder="Prix" disabled>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div id="info">
 
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="moloe" disabled>
                                                        <option value="">Nom | Prénom</option>
                                                        @foreach ($client as $values)
                                                        <option value="{{ $values->id }}">{{ $values->LastName."  ".$values->FirstName}} </option>
                                                        @endforeach
                                                    </select>
                                                 </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="typee" disabled>
                                                        <option value="">Type de décodeur</option>
                                                        @foreach ($decoder_type as $values)
                                                        <option value="{{ $values->id }}">{{ $values->Designation_deco}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}
                                        
                                        
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
                            <h3 class="title-5 m-b-35 col-10">Liste des Abonnements</h3>
                            <button type="button" class="btn btn-dark col-2" data-toggle="modal" data-target="#exampleModal3">
                            <i class="fas fa-plus">  Ajouter un abonnement</i>
                            </button>
                        </div>
                        <style>
                            .mmmm {
    background-image: -moz-linear-gradient(90deg, #ee0979 0%, #00ffd9b0 100%);
    background-image: -webkit-linear-gradient(90deg, #ee0979 0%, #00ffd9b0  100%);
    background-image: -ms-linear-gradient(90deg, #ee0979 0%, #00ffd9b0  100%);
}
                        </style>
                        <br>
                            <div class="table-responsive mmmm table-responsive-data2">
                                <br>
                                <table class="table table-data2" id="datatable">
                                    <thead>
                                        <tr>
                                              <th >#</th>
                                              <th >N° Décodeur</th>
                                              <th >Bouquet</th>
                                              <th >Début</th>
                                              <th >Fin</th>
                                              <th >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach  ($abonnement as $value)
                                        <tr>
                                           <td>  {{$int++}}<input type="hidden" class="delbtn_val" value="{{$value->id}}"></td>
                                            <td>{{ $value->Number }}</td>
                                            <td>{{ $value->Designation_abn }}</td>
                                            <td>{{ date('d/m/Y', strtotime($value->StartDate)) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($value->EndDate)) }} </td>
                                            <td>
                                               <button type="button" value="{{$value->id}}" class="h4 text-info editbtn"> <i class="fas fa-edit"></i></button>
                                               {{-- <button type="button"  class="h4 text-danger delbtn"><i class="fas fa-trash"></i></button> --}}
                                               <button   title="Supprimer" class="h4 text-danger"
                                                onclick="return confirm('/{{$value->id }}  ');"><i class="fas fa-trash"></i></button>
                                                                                            
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
                                                          window.location.href = "{{ url('/delete_abonnement/')}}"+ ID_Agent ;
                                                         
                                                        } else if (result.isDenied) {
                                                         
                                                        }
                                                      });
                                                      }
                                                      </script>    
<script>
function OnSelectChange(event) {

        var subject_id  = event.selectedOptions[0].getAttribute('data-capacity'); 
        if(subject_id == ""){
            $("#client_id").html("<option value='' disabled> Bouquet</option>");
        }

        $.ajax({
            url:"{{ url('/get_abn').'/'}}"+subject_id,
            type:"GET",
            success:function(data){
                var plans = data.abonnement_type;
                var html = "<option value='' disabled selected>Bouquet</option>";
                for(let i =0;i<plans.length;i++){
                    html += `
                    <option value="`+plans[i]['id']+`">`+plans[i]['Designation_abn']+`</option>
                    `;
                }
                $("#client_id").html(html);
            }
        });

        };
        </script>

<script>

                                   $(document).on('change', '.moh223', function() { var html = '';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control select72" multiple  id="last" disabled><option value="">Téléphone</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->phone}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"><input class="form-control" id="prix_abn" name="password" placeholder="Prix" disabled> </div></div> </div>';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control select72" multiple id="molo" disabled><option value="">Nom</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->LastName."  ".$values->FirstName}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control select72" multiple id="type" disabled><option value="">Decodeur</option> @foreach ($decoder_type as $values)<option value="{{ $values->id }}">{{ $values->Designation_deco}} </option>@endforeach</select></div> </div> </div>';
                                                                        document.getElementById('infos').innerHTML = html
                                                     });
$(document).ready(function() {

    $(document).on('click', '.editbtn', function() {

    var abn_id = $(this).val();
    // alert(clt_id);
    $('#editModal').modal('show');
        $.ajax({
        type: "GET",
        url: " {{ url('/edit_abonnement/').'/' }}"+abn_id,
        success: function (response){
            console.log(response);
                // var html = "<option value='' disabled selected>Bouquet</option>";
                //     html += `
                //     <option value="`+response.abonnement.abonnement_type_id+`" selected>`+response.abonnement.abonnement_type_id+`</option>
                //     `;
             
                // $("#abonnement_type_id").html(html);
            $('#abn_id').val(response.abonnement.id);
            $('#decoder_id').val(response.abonnement.decoder_id);
            $('#abonnement_type_id').val(response.abonnement.abonnement_type_id);
            $('#StartDate').val(response.abonnement.StartDate);
            $('#EndDate').val(response.abonnement.EndDate);
        
            $('.select72').select2({
                dropdownParent:  $('#editModal'),
            });
        }


        });

    });

});
</script>

<script>  
  $('#id_clt').change(function(event){
   var id = this.value;
          $.ajax({
          type: "GET",
          url: " {{ url('/Get_Clt/').'/' }}"+id,
          success: function (response){
              // console.log(response.client.FirstName);
              $('#first').val(response.decoder.client_id);
              $('#last').val(response.decoder.client_id);
              $('#molo').val(response.decoder.client_id);
              $('#type').val(response.decoder.decoder_type_id);
              $('.select72').select2({
                dropdownParent:  $('#editModal'),
            });
          }
      });
  });
  
  function selectTeam(){
        var html = '';
        html += '<div class="row">';
        html += '<div class="col-6"><div class="form-group"><select class="form-control select73" multiple id="laste" disabled><option value="">Téléphone</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->phone}} </option>@endforeach</select> </div> </div>';
        html += '<div class="col-6"><div class="form-group "><input class="form-control" id="prix_abne" name="password" placeholder="Prix" disabled> </div></div> </div>';
        html += '<div class="row">';
        html += '<div class="col-6"><div class="form-group "> <select class="form-control select73" multiple id="moloe" disabled><option value="">Nom</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->LastName."  ".$values->FirstName}} </option>@endforeach</select> </div> </div>';
        html += '<div class="col-6"><div class="form-group "> <select class="form-control select73" multiple id="typee" disabled><option value="">Decodeur</option> @foreach ($decoder_type as $values)<option value="{{ $values->id }}">{{ $values->Designation_deco}} </option>@endforeach</select></div> </div> </div>';
             document.getElementById('info').innerHTML = html
    //  document.getElementById('info').innerHTML = '<input class="form-control" type="text" id="firste" >'

    }
  $('#decoder_id').change(function(event){
   var id = this.value;
          $.ajax({
          type: "GET",
          url: " {{ url('/Get_Clt/').'/' }}"+id,
          success: function (response){
              // console.log(response.client.FirstName);
              $('#firste').val(response.decoder.client_id);
              $('#laste').val(response.decoder.client_id);
              $('#moloe').val(response.decoder.client_id);
              $('#typee').val(response.decoder.decoder_type_id);
              
              $('.select73').select2({
                dropdownParent:  $('#editModal'),});
          }
      });
  });
    function edit(){
   var e = document.getElementById("client_id").value;
          $.ajax({
          type: "GET",
          url: " {{ url('/Get_Price/').'/' }}"+e,
          success: function (response){
              // console.log(response.client.FirstName);
              $('#deco_id').val(response.abonnement.id);
              $('#prix_abn').val(response.abonnement.prix);
          }
      });
  };

  
  function editee(){
   var e = document.getElementById("abonnement_type_id").value;
          $.ajax({
          type: "GET",
          url: " {{ url('/Get_Price/').'/' }}"+e,
          success: function (response){
              // console.log(response.client.FirstName);
              $('#deco_id').val(response.abonnement.id);
              $('#prix_abne').val(response.abonnement.prix);
          }
      });
  };
</script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

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
                url: " {{ url('/delete_abonnement/').'/' }}"+delete_id,
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
    placeholder:'Selectionner',
dropdownParent: $('#exampleModal3'),
});
</script>

@endsection

