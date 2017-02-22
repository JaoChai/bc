<!-- About Section -->
<center>
   <section id="about" class="container content-section text-center">
       <div class="row">
           <div class="col-lg-8 col-lg-offset-2">
               <img src="<?php echo base_url();?>assets/home/img/01.jpg"  class="img-responsive" width="1000" height="600">
           </div>
       </div>
   </section>


   <section id="about2" class="container content-section text-center">
       <div class="row">
           <div class="col-lg-8 col-lg-offset-2">
               <img src="<?php echo base_url();?>assets/home/img/03.jpg"  class="img-responsive" width="1000" height="600">
           </div>
       </div>
   </section>
 </center>

   <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>กรอกข้อมูลเพื่อรับสิทธิพิเศษจากทางเรา</h2>
                <p>
                  <a href="http://line.me/R/ti/p/@gold365">Line id : @gold365</a>
                </p>
                <p>
                  <?php echo $this->session->flashdata('alert');?>
                </p>

                <div class="row">
               <div class="col-lg-8 col-lg-offset-2">
                   <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                   <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                   <?php echo form_open('member/insert'); ?>
                       <div class="row control-group">
                           <div class="form-group col-xs-12 floating-label-form-group controls">
                               <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" name="name" id="name" required data-validation-required-message="Please enter your name.">
                               <p class="help-block text-danger"></p>
                           </div>
                       </div>
                       <div class="row control-group">
                           <div class="form-group col-xs-12 floating-label-form-group controls">
                               <input type="email" class="form-control" placeholder="อีเมล์" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                               <p class="help-block text-danger"></p>
                           </div>
                       </div>
                       <div class="row control-group">
                           <div class="form-group col-xs-12 floating-label-form-group controls">
                               <input type="tel" class="form-control" placeholder="เบอร์โทร" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
                               <p class="help-block text-danger"></p>
                           </div>
                       </div>
                       <br>
                       <div id="success"></div>
                       <div class="row">
                           <div class="form-group col-xs-12">
                               <button type="submit" class="btn btn-success btn-lg">ส่ง</button>
                           </div>
                       </div>
                   <?php echo form_close();?>
               </div>
           </div>

                <!-- <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul> -->
            </div>
        </div>
    </section>
    <script>
    jQuery(function($){
    $("#phone").mask("99-99999999");
  });
    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").alert('close');
    });
    </script>
