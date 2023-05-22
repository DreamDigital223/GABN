 {{-- Modal de mise à jour --}}
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
       <br>
        <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header text-primary text-center">Modifier un client</div>
                    <div class="card-body">
                        <hr>
                        <form action="{{url('update_client')}}" id="forme" method="POST">
                            @csrf

                             @method('PUT')
                            <input type="hidden" id="clt_id" name="id" />
                            <div class="row text-danger">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input  name="FirstName" id="FirstName" required
                                        type="text" class="form-control cc-number identified visa"
                                 placeholder="Nom *"   >
                                </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <input  name="LastName" required id="LastName" type="text" class="form-control cc-number identified visa"
                                        placeholder="Prénom *" >
                                    </div>
                                </div>
                            </div>
                      
                            <div class="row text-danger">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input  name="phone" id="phone" type="text" class="form-control cc-number identified visa"
                                        placeholder="Téléphone *"   required minlength="8" maxlength="8" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <input  name="quartier" id="quartier" type="text" class="form-control cc-number identified visa"
                                 placeholder="Quartier *"  required > 
                                    </div>
                                </div>
                            </div>
                            <div>
                            <br>
                            <div class="col-12 text-center">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times">  Annuler</i></button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"> Modifier</i>  </button>
                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


{{-- Modal d'ajout --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
           <br>
            <div class="col-lg-12 ">
                    <div class="card">
                        <div class="h5 card-header text-primary text-center">Enrégistrer un client</div>
                        <div class="card-body">
                            <hr>
                            <form action="{{ route('posts.save_client')}}" id="form" method="POST" style="margin-top:35px">
                                @csrf
                                <div class="row text-danger">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{-- <input  name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/> --}}
                                             
                                            <input  name="shop_id_client" type="hidden" class="form-control" value="{{ Auth::user()->shops_id_user }}"/>
                                            <input  name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}"/>
                                            <input  name="FirstName" type="text" class="form-control cc-number identified visa"
                                     placeholder="Nom *"  required >
                                     <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                       <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input  name="LastName" type="text" class="form-control cc-number identified visa"
                                            placeholder="Prénom *" required>
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="row text-danger">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input  name="phone" type="number" class="form-control cc-number identified visa"
                                            placeholder="Téléphone *" required required minlength="8" maxlength="8"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input  name="quartier" type="text" class="form-control cc-number identified visa"
                                     placeholder="Quartier *" required> 
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

        {{-- Modal d'ajout decodeur --}}
     