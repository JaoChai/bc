<div class="row">
  <div class="col-xs-12">

    <h3 class="page-header">
      รูปแบบ <small>หมวดหมู่โปรโมชั่น</small>
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
              <div class="form-group">
                <label>ชื่อหมวดหมู่</label>
                <input class="form-control" name="cate" value="<?php echo $result->cate_name;?>">
                <?php echo form_error('cate');?>
              </div>

            </div>
                <button type="submit" class="btn btn-default">บันทึก</button>
              <?php echo form_close();?>
        </div>
      </div>
    </div> <!-- / .panel -->

  </div>
</div> <!-- / .row -->
