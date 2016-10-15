</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/formvalidation.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>assets/js/fileupload.js"></script>
 <!-- Bootstrap -->
 <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#uploadImage').on('change',function(){

      if(this.files && this.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
          $('#img_avatar2').attr('src',e.target.result);
        };
         reader.readAsDataURL(this.files[0]);

      }
    })
  });
</script>

<script type="text/javascript">
  $('#salonaddress').on('change',function(){
      var str = $('#salonaddress').val();

      var text = str.split(" ");
 			        var i = 0;
 			        do{
 			            text[i] += "+";
 			            i++;
 			        } while(i < text.length - 2);
 			        var newText = text.join().replace(/,/g,'');

 			       var url = 'http://maps.googleapis.com/maps/api/geocode/json?address='+newText+'&sensor=true';
 			       $.getJSON(url,function(result){

              var lat = result.results[0].geometry.location.lat;
              var long = result.results[0].geometry.location.lng;

              $('#lat').attr('value',lat);
              $('#long').attr('value',long);

 			       });
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#deactivate').click(function(){

      if(confirm('Are you sure you want to delete your account ?')== true){

        $.post('http://localhost/clicknstyle/Auth/deactivate',function(result){
          var result1 = result.toString().replace(/\s/g, "") ;
          alert('Your account is permanently delete');
          window.location.href ="http://localhost/clicknstyle/";
        });
      }
      else{
        location.reload();
      }
    });
  });
</script>

</body>
</html>
