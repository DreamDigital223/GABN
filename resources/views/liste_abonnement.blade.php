
                                                    @extends('layout.app')
                                                    @section('content')
                                                        
                                                            <!-- END HEADER MOBILE-->
                                                    
                                                            <!-- MENU SIDEBAR-->
                                                            
                                                            <aside class="menu-sidebar  d-none d-lg-block">
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
                                                                                    <li class="active">
                                                                                        <a href="#">
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
                                                    
                                                               <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                   <br>
                                                                    <div class="col-lg-12 ">
                                                                            <div class="card">
                                                                                <div class="h5 text-primary card-header text-center">Ajouter un abonnement</div>
                                                                                <div class="card-body">
                                                                                    <form action="{{ url('/Save_Abonnement')}}" method="POST">
                                                                                        @csrf
                                                                                       
                                                                                        <div class="row">
                                                                                            <div class="col-3">
                                                                                                 <div class="form-group"> 
                                                                                                    <input  name="user_id_abn" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/>
                                                                                                    <input  name="shop_id_abonnement" type="hidden" class="form-control" value="{{ Auth::user()->shops_id_user }}"/>
                                                                                                    {{-- <input class="form-control"  type="text" name="EndDate" placeholder="Date fin" onfocus="this.type='date'" onblur="this.type='text'"> --}}
                                                                                                  </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <input class="form-control text-center" placeholder="Date début" required type="text" name="StartDate" onfocus="this.type='date'" onblur="this.type='text'">
                                                                                               
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                 <div class="form-group">
                                                                                                   <select  name="decoder_id" onchange="OnSelectChange(this)" id="id_clt" required  class="selectto colo moh223 form-select">
                                                                                                        <option value=""disabled selected>Le décodeur</option>
                                                                                                        @foreach ($decoders as $values)
                                                                                                        <option data-capacity="{{ $values->decoder_type_id }}" value="{{ $values->id }}">{{ $values->Number}} </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                               </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <select class="form-select selectto"  onchange="edit(this.value)" required name="abonnement_type_id" id="client_id" >
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
                                                                                         </div>--}}
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
                                                                                                    {{-- <input  name="EndDate" id="EndDate" required type="date" class="form-control " --}}
                                                                                                 
                                                                                                </div>
                                                                                            </div>
                                                                                                <div class="col-6">
                                                                                                     <div class="form-group"> 
                                                                                                        <input  name="StartDate" id="StartDate" required type="date" class="form-control text-center"
                                                                                                    >  </div>
                                                                                                </div>
                                                                                               
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-6">
                                                                                                     <div class="form-group"> 
                                                                                                        <select  name="decoder_id" id="decoder_id" required onchange="selectTeam()"  class="form-select  select72">
                                                                                                            <option value=""></option>
                                                                                                            @foreach ($decoders as $values)
                                                                                                            <option data-capacity="{{ $values->decoder_type_id }}" value="{{ $values->id }}">{{ $values->Number}}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-6">
                                                                                                    <div class="form-group">
                                                                                                        <select  name="abonnement_type_id" required id="abonnement_type_id" onchange="editee(this.value)" class="form-select select72">
                                                                                                            <option value=""></option>
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
                                                                <!-- MAIN CONTENT-->
                                                                <div class="main-content">
                                                                
                                                                    <div class="section__content  section__content--p30">
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
                                                                    <div class=" row">
                                                                    <strong class="title-1 text-black col-10">la liste des Abonnements  </strong>
                                                                    <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#exampleModal3">
                                                                        <i class="fas fa-plus">  Ajouter</i>
                                                                         </button>
                                                                      </div>
                                                                      <br>
                                                                    <div class="col-lg-12">
                                                                        <!-- TOP CAMPAIGN-->
                                                                        <div class="top-campaign">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-bordered table-striped" id="datatable">
                                                                                    <thead>
                                                                                      <tr>
                                                                                        <th >#</th>
                                                                                        <th >N° Décodeur</th>
                                                                                        <th >Bouquet</th>
                                                                                        <th >Début</th>
                                                                                        <th >Fin</th>
                                                                                        <th width="40">Actions</th>
                                                                                      </tr>
                                                                                    </thead>
                                                                                   <tbody>
                                                                                      @foreach  ($abonnement as $value)
                                                                                      <tr>
                                                                                         <td>  {{$int++}}<input type="hidden" class="delbtn_val" value="{{$value->id}}"></td>
                                                                                          <td>{{ $value->Number }}</td>
                                                                                          <td>{{ $value->Designation_abn }}</td>
                                                                                          <td>{{ date('d/m/Y', strtotime($value->StartDate)) }}</td>
                                                                                          <td>{{ date('d/m/Y', strtotime($value->EndDate)) }}</td>
                                                                                          <td>
                                                                                             <button type="button" value="{{$value->id}}" class="h4 text-info editbtn"><i class="fas fa-edit"></i></button>
                                                                                             <button   title="Supprimer" class="h4 text-danger" onclick="return confirm('/{{$value->id }}  ');"><i class="fas fa-trash"></i></button>
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
                                                        confirmButtonText: 'Confirmer',
                                                        denyButtonText: `Annuler`,
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
                                                     $(document).on('change', '.moh223', function() { var html = '';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="last" disabled><option value="">Téléphone</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->phone}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"><input class="form-control" id="prix_abn" name="password" placeholder="Prix" disabled> </div></div> </div>';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="molo" disabled><option value="">Nom</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->LastName."  ".$values->FirstName}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="type" disabled><option value="">Decodeur</option> @foreach ($decoder_type as $values)<option value="{{ $values->id }}">{{ $values->Designation_deco}} </option>@endforeach</select></div> </div> </div>';
                                                                        document.getElementById('infos').innerHTML = html
                                                     });
                                                                                                          function selectTeam(){
                                                                    let team = document.getElementById('decoder_id').value
                                                                    
                                                                    var html = '';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="laste" disabled><option value="">Téléphone</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->phone}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"><input class="form-control" id="prix_abne" name="password" placeholder="Prix" disabled> </div></div> </div>';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="moloe" disabled><option value="">Nom</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->LastName."  ".$values->FirstName}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="typee" disabled><option value="">Decodeur</option> @foreach ($decoder_type as $values)<option value="{{ $values->id }}">{{ $values->Designation_deco}} </option>@endforeach</select></div> </div> </div>';
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
                                                                    }
                                                                });
                                                            });
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
                                                                  }
                                                              });
                                                          });
                                                              
                                                             
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
                                                                    for(let i =0;i <plans.length;i++){
                                                                        html += `
                                                                        <option value="`+plans[i]['id']+`">`+plans[i]['Designation_abn']+`</option>
                                                                        `;
                                                                    }
                                                                    $("#client_id").html(html);
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
                                                            dropdownParent: $('#exampleModal3'),
                                                            });
                                                    </script>
                                                     
                                                    @endsection
                                                    