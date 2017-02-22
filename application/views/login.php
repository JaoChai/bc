<div class="container">
     <div class="row">
       <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

         <!-- Sign In -->
         <div class="sign__container">

           <div class="panel panel-default">

             <div class="panel-heading">
               <h4 class="panel-title">
                 Sign In to your account
               </h4>
             </div> <!-- / .panel-heading -->

             <div class="panel-body">
               <?php echo form_open('dashboard/login'); ?>
                 <div class="form-group">
                   <label for="sign-in__email">Your Username</label>
                   <input type="text" name="username" class="form-control" id="sign-in-username">
                 </div>
                 <div class="form-group">
                   <label for="sign-in__password">Your password</label>
                   <input type="password" name="password" class="form-control" id="sign-in-password">
                 </div>
                 <div class="row">
                   <div class="col-sm-8">
                     <p><?php echo $this->session->flashdata('error_mess');?></p>
                   </div>

                   <div class="col-sm-4 text-right">
                     <button type="submit" class="btn btn-primary">
                       Sign In
                     </button>
                   </div>
                 </div>
               <?php echo form_close(); ?>
             </div> <!-- / .panel-body -->


           </div> <!-- / .panel -->


         </div> <!-- / .sign__conteiner -->

       </div>
     </div>
   </div>
