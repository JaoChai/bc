<div class="row">
  <div class="col-xs-12">

    <h3 class="page-header">
      รูปแบบ
    </h3>

  </div>
</div> <!-- / .row -->

<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Code Pixel</h3>
        <h4><?php echo $this->session->flashdata('alert');?></h4>
      </div>

      <div class="panel-body">
        <?php echo form_open('member/update_pixel');?>

          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $pixel->pixel_id;?>">
            <textarea class="form-control" rows="5" name="pixel">
              <?php echo $pixel->pixel_title;?>
            </textarea>

          </div>
          <br/>
          <div class="form-group">

            <input type="submit" class="btn btn-primary" name="submit" value="Submit">

          </div>
        <?php echo form_close();?>
      </div>
    </div> <!-- / .panel -->
  </div>
</div> <!-- / .row -->
<script>
$("#alert").fadeTo(2000, 500).slideUp(500, function(){
$("#alert").alert('close');
});
</script>
