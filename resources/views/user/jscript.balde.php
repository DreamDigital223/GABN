<script>
    
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
</script>