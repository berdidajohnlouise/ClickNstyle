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

</body>
</html>
