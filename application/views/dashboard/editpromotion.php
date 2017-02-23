<div class="row">
  <div class="col-xs-12">

    <h3 class="page-header">
      กรุณากรอกข้อมูล โปรโมชั่น
    </h3>

  </div>
</div> <!-- / .row -->

<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-default">

      <div class="panel-body">

        <div class="row col-lg-12">
          <?php echo form_open_multipart('');?>
          <div class="form-group">
            <label>เลือกหมวดหมู่ โปรโมชั่น</label>
            <select class="form-control" name="cate">
              <option value=" ">เลือก</option>
              <?php foreach($getcate as $row): ?>
                <?php if($row->cate_id == $result->cate_id){ ?>
                <option value="<?php echo $row->cate_id;?>" selected><?php echo $row->cate_name;?></option>
                <?php }else{ ?>
                  <option value="<?php echo $row->cate_id;?>"><?php echo $row->cate_name;?></option>
                  <?php } ?>
              <?php endforeach;?>
            </select>
            <?php echo form_error('cate');?>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>ชื่อโปรโมชั่น</label>
              <input type="hidden" name="img" value="<?php echo $result->pro_newimg;?>">
              <input class="form-control" name="title" value="<?php echo $result->pro_title;?>">
              <?php echo form_error('title');?>
            </div>
          </div>

          <div class="form-group">
            <label>รายละเอียดย่อ</label>
            <textarea class="form-control" rows="3" name="sub_des"><?php echo $result->pro_sub_des;?></textarea>
            <?php echo form_error('sub_des');?>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>รายละเอียด</label>
              <textarea name="editor1" id="editor1" rows="10" cols="80">
                <?php echo $result->pro_des;?>
              </textarea>
              <?php echo form_error('editor1');?>
              <script>
              CKEDITOR.replace( 'editor1' );
              </script>

            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>เวลานับถอยหลัง</label>
              <div class='input-group date' id='datetimepicker5'>
                   <input type='text' class="form-control" name="date" value="<?php echo date('d-m-Y H:i:s', strtotime($result->pro_date));?>" />
                   <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
               <?php echo form_error('date');?>
               <script type="text/javascript">
             $(function () {
                 $('#datetimepicker5').datetimepicker({
                   format: 'D-MM-YYYY H:m:s'
                 });
             });
         </script>
            </div>
          </div>

          <div class="form-group">
            <label>อัพโหลดรูปภาพ โปรโมชั่น</label>
            <input type="file" name="userfile">
            <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
          </div>


          <button type="submit" class="btn btn-success pull-right">บันทึก</button>
          <?php echo form_close();?>
        </div>

      </div>




    </div>
  </div> <!-- / .panel -->
</div>
</div> <!-- / .row -->
