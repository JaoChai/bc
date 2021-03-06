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
          <?php echo form_open_multipart('Promotion/insert');?>
          <div class="form-group">
            <label>เลือกหมวดหมู่ โปรโมชั่น</label>
            <select class="form-control" name="cate">
              <option value=" ">เลือก</option>
              <?php foreach($getcate as $row): ?>
                <option value="<?php echo $row->cate_id;?>"><?php echo $row->cate_name;?></option>
              <?php endforeach;?>
            </select>
            <?php echo form_error('cate');?>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>ชื่อโปรโมชั่น</label>
              <input class="form-control" name="title">
              <?php echo form_error('title');?>
            </div>
          </div>

          <div class="form-group">
            <label>รายละเอียดย่อ</label>
            <textarea class="form-control" rows="3" name="sub_des"></textarea>
            <?php echo form_error('sub_des');?>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>รายละเอียด</label>
              <textarea name="editor1" id="editor1" rows="10" cols="80">

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
                   <input type='text' class="form-control" name="date" />
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

      <div class="col-md-12">
        <?php if($result == ""){ ?>
          <center><p>ไม่มีข้อมูล</p></center>
          <?php }else{ ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ลำดับ</th>
                <th>หมวดหมู่</th>
                <th>รูปโปรโมชั่น</th>
                <th>ชื่อโปรโมชั่น</th>
                <th>การกระทำ</th>
              </tr>
            </thead>
            <?php $num = 1;?>
            <tbody>
              <?php foreach($result as $row): ?>
              <tr>
                <td><?php echo $num++;?></td>
                <td><?php echo $row->cate_name;?></td>
                <td><img alt="Your uploaded image" src="<?php echo base_url('uploads/promotion/'. $row->pro_newimg); ?>" width="100" height="100"></td>
                <td><?php echo $row->pro_title;?></td>
                <?php echo form_open("Promotion/delete");?>
                <td>
                  <a href="<?php echo site_url('Promotion/update/'. $row->pro_id);?>" class="btn btn-primary"> <i class="fa fa-edit"></i> แก้ไข </a>
                        <input type="hidden" name="id" value="<?php echo $row->pro_id;?>">
                        <input type="hidden" name="path" value="<?php echo $row->pro_imgpath;?>">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> ลบ</button>
                </td>
                <?php echo form_close();?>
              </tr>
            <?php endforeach;?>
            </tbody>
          </table>
        </div>
        <?php } ?>
      </div>



    </div>
  </div> <!-- / .panel -->
</div>
</div> <!-- / .row -->

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function del(id){
  var url="<?php echo base_url();?>";
  //window.location = url+"category/delete/"+del;
  swal({
    title: 'ต้องการลบรายการหรือไม่',
    type: 'warning',
    showCancelButton: true,
    cancelButtonText: 'ยกเลิก',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ตกลง'
  }).then(function () {
    window.location = url+"member/delete/"+id;
  })
}
</script>
