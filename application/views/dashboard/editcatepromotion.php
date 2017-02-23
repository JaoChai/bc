<div class="row">
  <div class="col-xs-12">

    <h3 class="page-header">
      แก้ไข หมวดหมู่โปรโมชั่น
    </h3>

  </div>
</div> <!-- / .row -->

<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row col-lg-6">
          <?php echo form_open('');?>
              <div class="form-group">
                <label>ชื่อหมวดหมู่</label>
                <input class="form-control" name="cate" value="<?php echo $result->cate_name;?>">
                <?php echo form_error('cate');?>
              </div>

              <div class="form-group">
                <label>Link</label>
                <input class="form-control" name="linkcate" value="<?php echo $result->cate_link;?>">
              </div>


                <button type="submit" class="btn btn-success">บันทึก</button>
              <?php echo form_close();?>
        </div>
      </div>
    </div> <!-- / .panel -->

  </div>
</div> <!-- / .row -->
