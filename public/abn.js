
     
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

                                   $(document).on('change', '.moh223', function() { var html = '';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control"  id="last" disabled><option value="">Téléphone</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->phone}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"><input class="form-control" id="prix_abn" name="password" placeholder="Prix" disabled> </div></div> </div>';
                                                                    html += '<div class="row">';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="molo" disabled><option value="">Nom</option> @foreach ($client as $values)<option value="{{ $values->id }}">{{ $values->LastName."  ".$values->FirstName}} </option>@endforeach</select> </div> </div>';
                                                                    html += '<div class="col-6"><div class="form-group"> <select class="form-control" id="type" disabled><option value="">Decodeur</option> @foreach ($decoder_type as $values)<option value="{{ $values->id }}">{{ $values->Designation_deco}} </option>@endforeach</select></div> </div> </div>';
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
$('.selectto').select2({
dropdownParent: $('#exampleModal3'),
});
