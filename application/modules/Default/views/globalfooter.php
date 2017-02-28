<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="widget contact-widget">
          <h3 class="widget-title">Contact</h3>
          <div class="contact-info">
            <address>
              <img src="<?php echo base_url();?>assets/images/icon-map-small.png" class="icon">
              <p><strong>Company name</strong> 563 Avenue Street, New York</p>
            </address>
            <a href="mailto:contact@companyname.com" class="mail"><img src="<?php echo base_url();?>assets/images/icon-envelope-small.png" class="icon">contact@companyname.com</a>
            <a href="tel:(500)942042259" class="phone"><img src="<?php echo base_url();?>assets/images/icon-phone-small.png" class="icon">(500)942042259</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget">
          <h3 class="widget-title">Social Media</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident et praesentium </p>
          <div class="social-links">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="widget">
          <h3 class="widget-title">Newsletter</h3>
          <form action="#" class="subscribe-form">
            <input type="email" placeholder="Enter our email...">
            <input type="submit" value="Sign up">
          </form>
        </div>
      </div>
    </div>

    <div class="colophon">
      <p>Copyright 2016 Click N Style.  All rights reserved.</p>
    </div>
  </div>
</footer>
</div>


<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/plugins.js"></script>
<script src="<?php echo base_url();?>assets/js/app.js"></script>

<!-- Script for reservation  -->
<script type="text/javascript">
  $('#btnreserve').click(function(){

    $('#salonservices').empty();
    $('#salonservices').append('<option disabled selected>--Select Services--</option>');
      var salonid = $('#salon_id').val();

      var url = "<?php echo base_url();?>GlobalService/getSalonService/"+salonid;

      $.getJSON(url,function(result){

        // console.log(result);
         $.each(result,function(element,value){
            $('#salonservices').append('<option value="'+value.serviceID+'">'+value.servicename+' ( '+value.service_type+' )</option>');
          });

      });
  });
</script>

<!-- reveal staffs -->
<script type="text/javascript">
  $(function(){

    $('#salonservices').on('change',function(){
      $('#hours').empty();
      $servicesID = $('#salonservices').val();
      $('#serviceStaff').show();
      $('#serviceDuration').show();

      $('#rsrv_duration').empty();  
      $('#Staffs').empty();
      $('#Staffs').append('<option selected="selected" disabled>--Choose Staffs--</option>');

      $('#staff_image').attr('src','<?php echo base_url();?>assets/staffsimage/user.png');
      var urlDuration = "<?php echo base_url();?>GlobalService/getServiceDuration/"+$servicesID;

      $.getJSON(urlDuration,function(data){

        //var duration = data.duration.substr(0,2);
        var hrs = parseInt(Number(data.duration));
        var min = Math.round((Number(data.duration)-hrs) * 60);


        //console.log(duration);


        if(hrs == 0){
          $('#rsrv_duration').append('<option value="'+data.duration+'">'+min+' minutes'+'</option>');
        }
        else if(hrs == 1){
          $('#rsrv_duration').append('<option value="'+data.duration+'">'+hrs+' Hour '+min+' minutes'+'</option>');
        }
        else if (min == 0){
          $('#rsrv_duration').append('<option value="'+data.duration+'">'+hrs+' Hour'+'</option>');
        }
        else{
          $('#rsrv_duration').append('<option value="'+data.duration+'">'+hrs+' Hours '+min+' minutes'+'</option>');
        }

      });


      var url = "<?php echo base_url(); ?>GlobalService/getStaffService/"+$servicesID;

    $.getJSON(url,function(result){


          $('#Staffs').empty();
          $('#Staffs').append('<option selected="selected" disabled>--Choose Staffs--</option>');
        $.each(result,function(element,value){
           $('#Staffs').append('<option value="'+value.staffID+'">'+value.lastName.charAt(0).toUpperCase() + value.lastName.slice(1) + ', '+value.firstName+'</option>');
         });

    });

    });
  

  $('#Staffs').on('change',function(){
     var staffid = $('#Staffs').val();
      var url = "<?php echo base_url();?>GlobalService/getStaffById/"+staffid;
       $.getJSON(url,function(result){

        $('#staff_image').attr('src','<?php echo base_url();?>assets/staffsimage/'+result.photo+'');


        });
  });

    $('#calendar_date').on('change',function(){
      var staffid = $('#Staffs').val();
       
        var salonid = $('#rsrv_salonid').val();

        $('#hours').empty();
      
        
        var getsalonhours = "<?php echo base_url();?>Functions/Reservation/getSalonHours/"+salonid;

        $.getJSON(getsalonhours,function(result){

          var open = result.open_hours.split(':');
          var close = result.closing_hours.split(':');

          if(open[0]>10){
            var newopen = open[0].split('0');

            var i = Number(newopen[1]);

            do{
              var hours = i % 12 ? i%12 : 12;
              var time = i>=12?'pm':'am';
              $('#hours').append('<option value =\"'+i+'\" id="'+i+'">'+hours+':00 '+time+'</option>');

               i++;
            }
            while(i < Number(close[0]));

          }
          else{
            var newopen = open[0].split('0');

            var i = Number(newopen[1]);

            do{
              var hours = i % 12 ? i%12 : 12;
              var time = i>=12?'pm':'am';
              $('#hours').append('<option value =\"'+i+'\" id="'+i+'">'+hours+':00 '+time+'</option>');

               i++;
            }
            while(i < Number(close[0]));

          }

                      var calendar_date = $('#calendar_date').val();
                      var gethours = "<?php echo base_url();?>Functions/Reservation/getStaffReservation/"+staffid+'/'+calendar_date;
                      $.getJSON(gethours,function(data){
                      if(data!=false){
                        $.each(data,function(element,value){
                          var durationstart = value.timeReserved.split(':');
                          var durationend = value.eos.split(':');

                          for(x = Number(durationstart[0]); x< Number(durationend[0]); x++){
                                var newdurationstart = x % 12 ? x % 12 : 12;
                                $('#'+x+'').attr('disabled','disabled');
                                $('#'+x+'').attr('style','background:gray; color:white');

                          }

                           });
                        }

                     });

        });

        var gethours = "<?php echo base_url();?>Functions/Reservation/getStaffReservation/"+staffid+'/'+salonid;

    });



  });
</script>

<script type="text/javascript">

$('#calendar_date').on('change',function(){


  // alert($('#Staffs').val());
    if($('#Staffs').val()== '' || $('#Staffs').val()==null){
      alert('Please Provide staff to proceed');
      $('#serviceStaff').focus();
    }
    else{

      var datenow = new Date();
      // var nowmonth = (datenow.getMonth()+1) >= 10 ? (datenow.getMonth()+1) : '0'+(datenow.getMonth()+1);
      var fulldate = datenow.getFullYear() + '-'+(datenow.getMonth()+1)+'-'+datenow.getDate();
      if(new Date($('#calendar_date').val())>= new Date(fulldate)){
       
        $('#hours').focus();


      }
      else{
        alert('Input of calendar must be greater than or equal to current date');
        $('#reservationbutton').hide();
      }
      
    }

});

</script>


<script type="text/javascript">

  $('#hours').on('change',function(){
     if($('#Staffs').val()== '' || $('#Staffs').val()==null){
      alert('Please Provide staff to proceed');
      $('#serviceStaff').focus();
    }
     else{

      var datenow = new Date();
      // var nowmonth = (datenow.getMonth()+1) >= 10 ? (datenow.getMonth()+1) : '0'+(datenow.getMonth()+1);
      var fulldate = datenow.getFullYear() + '-'+(datenow.getMonth()+1)+'-'+datenow.getDate();

   
      if(new Date($('#calendar_date').val())>= new Date(fulldate)){
       
        var d = new Date(); // for now
        d.getHours(); // => 9


          if(new Date($('#calendar_date').val()).toDateString() == datenow.toDateString()){


                 if($('#hours').val() > d.getHours() ){
                 $('#reservationbutton').show();
                }else{
                   alert('Reservation hours must be greater than current time ');
                   $('#reservationbutton').hide();
                  $('#hours').focus();
                  
                }

          }
          else{
             $('#reservationbutton').show();
          }
    

      }
      else{
        alert('Input of calendar must be greater than or equal to current date');
        $('#reservationbutton').hide();
      }
      
    }    
  });

</script>


<!-- reveal staffs -->


<!-- end script for reservation -->




<!-- Add Reservation Javascript -->
  <script type="text/javascript">
  $(document).ready(function(){

    $('#addReservation').click(function(){

        var salonid = $('#rsrv_salonid').val();
        var service = $('#salonservices').val();
        var duration = $('#rsrv_duration').val();
        var staff = $('#Staffs').val();
        var date = $('#calendar_date').val();
        var hours = $('#hours').val();

        var rsrv_details = {
          'salonid': salonid,
          'service': service,
          'duration':duration,
          'staff': staff,
          'date': date,
          'hours': hours
        };

        //console.log(rsrv_details);
        var url = "<?php echo base_url();?>Functions/Reservation/addreservation";
        $.post(url,{data:rsrv_details},function(result){
          //alert(result);
        });
        alert('Service Successfully Reserved');

        location.reload();
    });

  });

  </script>
<!-- End of Add Reservation Javascript -->

<!-- Page specific script -->
       <script type="text/javascript">
           $(function() {

             var myevent = [];
             window.onload = function(){
               getData();

             };

             function getData(){
               var Salonid = window.location.href.split("/").pop();
                var url = "http://localhost/clicknstyle/Functions/Calendar_management_salon/getAllCalendars/"+Salonid;
                 $.getJSON(url,function(result){


                     $.each(result,function(value,element){


                         var insertEvents = {

                           title: element.cal_name.charAt(0).toUpperCase() + element.cal_name.slice(1),
                           description: "Details: "+element.cal_description.charAt(0).toUpperCase()+ element.cal_description.slice(1),
                           start:element.cal_date,
                           backgroundColor: "#f56954", //red
                           borderColor: "#f56954" //red
                         };
                         myevent.push(insertEvents);
                     });
                 });


             }



               /* initialize the calendar
                -----------------------------------------------------------------*/
               //Date for the calendar events (dummy data)
               var date = new Date();


               var d = date.getDate(),
                       m = date.getMonth(),
                       y = date.getFullYear();
               $('#calendar').fullCalendar({
                   header: {
                       center: 'title',

                   },
                   //Random default events
                   events: myevent,
                   eventClick: function(events,element) {
                      if (events) {
                        alert(events.description+'\n');
                          return false;
                      }
                  }


               });





           });
       </script>
</body>

</html>
