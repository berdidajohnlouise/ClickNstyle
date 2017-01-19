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


      var salonid = $('#salon_id').val();

      var url = "<?php echo base_url();?>GlobalService/getSalonService/"+salonid;

      $.getJSON(url,function(result){

        // console.log(result);
         $.each(result,function(element,value){
            $('#salonservices').append('<option value="'+value.serviceID+'">'+value.servicename+'</option>');
          });

      });
  });
</script>

<!-- reveal staffs -->
<script type="text/javascript">
  $(function(){

    $('#salonservices').on('change',function(){

      $servicesID = $('#salonservices').val();
      alert($servicesID);
      $('#serviceStaff').show();

      var url = "<?php echo base_url(); ?>GlobalService/getStaffService/"+$servicesID;

    $.getJSON(url,function(result){
        $('#Staffs').empty();
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

  });
</script>

<!-- reveal staffs -->


<!-- end script for reservation -->



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
