</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/formvalidation.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>assets/js/fileupload.js"></script>
 <!-- Bootstrap -->
 <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>

 <script src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
 <script src="<?php echo base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
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
  $(document).ready(function(){

    $('#uploadStaff').on('change',function(){

      if(this.files && this.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
          $('#staff_avatar').attr('src',e.target.result);
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
  $('#addStaffsButton').on('click',function(){

    $('#staffsname').empty();
    var url = "<?php echo base_url();?>Functions/Staff_management_user_salon/getStaffs";

    $.getJSON(url,function(result){

      $('#staffsname').append('<option selected disabled>--Select Staff--</option>');
      $.each(result,function(value,element){

        $('#staffsname').append(
          '<option value="'+element.staffID+'">'+element.lastName+', '+element.firstName+'</option>'
        );
      })

    });

  });

  $('#staffsname').on('change',function(){
    var staffid = $('#staffsname').val();

    var url = "<?php echo base_url();?>Functions/Staff_management_user_salon/getStaff/"+staffid;

    $.getJSON(url,function(result){
       $('#img_avatar2').attr('src','<?php echo base_url();?>assets/staffsimage/'+result.photo);
    });

  });
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

<script type="text/javascript">
  function deleteStaff(id){
    if(confirm('Are you sure you want to delete this Staff ?')==true){
      var url = "<?php echo base_url();?>Functions/Staff_management_salon/deleteStaff/"+id;
      $.post(url,function(result){


        var result1 = result.toString().replace(/\s/g, "");

        if(result1=='True'){
          alert('Staff Successfully Deleted');
          window.location.href = "<?php echo base_url();?>Functions/Staff_management_salon";
        }
        else{
          alert('Developer nga bogo');
        }

      });
    }
    else{
      location.reload();
    }
  }

  function deleteService(id){
    if(confirm('Are you sure you want to delete this Service ?')==true){
      var url = "<?php echo base_url();?>Functions/Services_management_salon/deleteService/"+id;
      $.post(url,function(result){
        var result1 = result.toString().replace(/\s/g, "");

        if(result1=='True'){
          alert('Service Successfully Deleted');
          window.location.href = "<?php echo base_url();?>Functions/Services_management_salon";
        }
        else{
          alert('Developer nga bogo');
        }

      });
    }
    else{
      location.reload();
    }
  }

  function deletePromo(id){
    if(confirm('Are you sure you want to delete this Promo ?')==true){
      var url = "<?php echo base_url();?>Functions/Promos_management_salon/deletePromo/"+id;
      $.post(url,function(result){
        var result1 = result.toString().replace(/\s/g, "");

        if(result1=='True'){
          alert('Promo Successfully Deleted');
          window.location.href = "<?php echo base_url();?>Functions/Promos_management_salon";
        }
        else{
          alert('Developer nga bogo');
        }

      });
    }
    else{
      location.reload();
    }
  }

function deleteProduct(id){
  if(confirm('Are you sure you want to delete this Product ?')==true){
    var url = "<?php echo base_url();?>Functions/Products_management_salon/deleteProduct/"+id;
    $.post(url,function(result){
      var result1 = result.toString().replace(/\s/g, "");

      if(result1=='True'){
        alert('Product Successfully Deleted');
        window.location.href = "<?php echo base_url();?>Functions/Products_management_salon";
      }
      else{
        alert('Developer nga bogo');
      }

    });
  }
  else{
    location.reload();
  }
}

function deleteAnnouncement(id){
  if(confirm('Are you sure you want to delete this Announcement ?')==true){
    var url = "<?php echo base_url();?>Functions/Announcement_management_salon/deleteAnnouncement/"+id;
    $.post(url,function(result){
      var result1 = result.toString().replace(/\s/g, "");

      if(result1=='True'){
        alert('Announcement Successfully Deleted');
        window.location.href = "<?php echo base_url();?>Functions/Announcement_management_salon";
      }
      else{
        alert('Developer nga bogo');
      }

    });
  }
  else{
    location.reload();
  }
}

function updateSU(id){
  if(confirm('Are you sure you want to delete this Staff Account ?')==true){
    var url = "<?php echo base_url();?>Functions/Staff_management_user_salon/deleteSU/"+id;
    $.post(url,function(result){
      var result1 = result.toString().replace(/\s/g, "");

      if(result1=='True'){
        alert('Staff Account Successfully Deleted');
        window.location.href = "<?php echo base_url();?>Functions/Staff_management_user_salon";
      }
      else{
        alert('Developer nga bogo');
      }

    });
  }
  else{
    location.reload();
  }
}

function deleteCalendar(id){
  if(confirm('Are you sure you want to delete this Event?')==true){
    var url = "<?php echo base_url();?>Functions/Calendar_management_salon/deleteCalendar/"+id;
    $.post(url,function(result){
      var result1 = result.toString().replace(/\s/g, "");

      if(result1=='True'){
        alert('Event Successfully Deleted');
        window.location.href = "<?php echo base_url();?>Functions/Calendar_management_salon";
      }
      else{
        alert('Developer nga bogo');
      }

    });
  }
  else{
    location.reload();
  }
}

</script>


<!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

  <!-- updatestaff script -->

  <script type="text/javascript">
      $(document).on("click",".updateStaff",function(){

          var staffid = $(this).data('id');

          var url = "<?php echo base_url();?>Functions/Staff_management_salon/getStaff/"+staffid;

          $.getJSON(url,function(result){
            console.log(result);
            $('#staffsid').val(result.staffID);
            $('#nickname').val(result.nickName);
            $('#lastname').val(result.lastName);
            $('#firstname').val(result.firstName);
            $('#position').val(result.jobdescription);
            $('#staff_avatar').attr('src','<?php echo base_url();?>assets/staffsimage/'+result.photo);
            $('#dob').val(result.dob);
            $('#updateLabel').text('Update '+result.nickName);
            $('#contactnumber').val(result.contactNo);
            $('#status').val(result.status);
          });

      });
  </script>


  <!-- updateservices script -->

  <script type="text/javascript">
  $(document).on("click",".updateService",function(){

      var serviceid = $(this).data('id');

      var url = "<?php echo base_url();?>Functions/Services_management_salon/getService/"+serviceid;

      $.getJSON(url,function(result){

        $('#serviceid').val(result.serviceID);
        $('#servicename').val(result.servicename);
        $('#servicedesc').val(result.description);
        $('#price').val(result.price);
        $('#duration').val(result.duration);
        $('#servicetype').val(result.service_type);
        $('#updateLabel').text('Update '+result.servicename);
        $('#staff_avatar').attr('src','<?php echo base_url();?>assets/servicesimage/'+result.service_photo);

      });

  });
  </script>


  <!-- updatePromos script -->

  <script type="text/javascript">
  $(document).on("click",".updatePromo",function(){

      var promoid = $(this).data('id');

      var url = "<?php echo base_url();?>Functions/Promos_management_salon/getPromo/"+promoid;

      $.getJSON(url,function(result){

        $('#promoid').val(result.promoID);
        $('#promoname').val(result.Name);
        $('#promodesc').val(result.promoDetails);
        $('#price').val(result.Price);
        $('#serviceduration').val(result.expDate);
        $('#updateLabel').text('Update '+result.Name);
        $('#staff_avatar').attr('src','<?php echo base_url();?>assets/promosimage/'+result.Photo);

      });

  });
  </script>


  <!-- updateProducts script -->

  <script type="text/javascript">
  $(document).on("click",".updateProduct",function(){

      var productid = $(this).data('id');

      var url = "<?php echo base_url();?>Functions/Products_management_salon/getProduct/"+productid;

      $.getJSON(url,function(result){

         $('#productid').val(result.pro_id);
         $('#productname').val(result.pro_name);
         $('#productbrand').val(result.pro_brand);
         $('#price').val(result.price);
         $('#updateLabel').text('Update '+result.pro_name);
         $('#staff_avatar').attr('src','<?php echo base_url();?>assets/productsimage/'+result.photo);

      });

  });
  </script>

  <!-- updateAnnouncement script -->

  <script type="text/javascript">
  $(document).on("click",".updateAnnouncement",function(){

      var announcementid = $(this).data('id');

      var url = "<?php echo base_url();?>Functions/Announcement_management_salon/getAnnouncement/"+announcementid;

      $.getJSON(url,function(result){
          $('#ann_id').val(result.ann_id);
          $('#ann_title').val(result.ann_name);
          $('#ann_desc').val(result.ann_description);
          $('#updateLabel').text('Update '+result.ann_name);

      });

  });
  </script>

  <!-- update StaffUser script -->

  <script type="text/javascript">
  $(document).on("click",".updateSU",function(){

      var suid = $(this).data('id');

      var url = "<?php echo base_url();?>Functions/Staff_management_user_salon/getStaffUser/"+suid;

      $.getJSON(url,function(result){

           $('#staffsname1').val(result.lastName+', '+result.firstName);
           $('#username1').val(result.userName);
           $('#staff_image').attr('src','<?php echo base_url();?>assets/staffsimage/'+result.photo);
          $('#suid').val(result.suID);
           $('#updateLabel').text('Update '+result.userName);

      });

  });
  </script>

  <!-- update Calendar script -->

  <script type="text/javascript">
  $(document).on("click",".updateCalendar",function(){

      var calid = $(this).data('id');

      var url = "<?php echo base_url();?>Functions/Calendar_management_salon/getCalendar/"+calid;

      $.getJSON(url,function(result){

        console.log(result);

        $('#calid').val(result.cal_id);
        $('#caltitle').val(result.cal_name);
        $('#caldesc').val(result.cal_description);
        $('#caldate').val(result.cal_date);
        $('#updateLabel').text('Update '+result.cal_name);


      });

  });
  </script>
</body>
</html>
