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

          <div class="form-group">
            <label>เลือกหมวดหมู่ โปรโมชั่น</label>
            <select class="form-control">
              <option>เลือก</option>
            </select>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>ชื่อโปรโมชั่น</label>
              <input class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label>รายละเอียดย่อ</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>รายละเอียด</label>
              <textarea name="editor1" id="editor1" rows="10" cols="80">

              </textarea>

              <script>
              CKEDITOR.replace( 'editor1' );
              </script>

            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>เวลานับถอยหลัง</label>
              <div class='input-group date' id='datetimepicker5'>
                   <input type='text' class="form-control" />
                   <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
               <script type="text/javascript">
             $(function () {
                 $('#datetimepicker5').datetimepicker();
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

        </div>

      </div>

      <div class="col-md-12">
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
            <tbody>
              <tr>
                <td>1</td>
                <td>Test</td>
                <td>100*100</td>
                <td>Test</td>
                <td>
                  <a href="#" class="btn btn-primary"> <i class="fa fa-edit"></i> แก้ไข </a>
                  <a href="#" class="btn btn-danger">  <i class="fa fa-trash-o"></i> ลบ </a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
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
