<div class="row">
  <div class="col-xs-12">

    <h3 class="page-header">
      รูปแบบ <small>ภาพสไลด์</small>
    </h3>

  </div>
</div> <!-- / .row -->

<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row col-lg-6">
            <div class="form-group">
              <label>Upload Picture Silder</label>
              <input type="file">
            </div>

            <div class="form-group">
              <div class="form-group">
                <label>Link Path URL</label>
                <input class="form-control">
              </div>

            </div>
                <button type="submit" class="btn btn-default">บันทึก</button>
        </div>
      </div>
    </div> <!-- / .panel -->

    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รูปภาพ</th>
              <th>ลิ้ง</th>
              <th>การกระทำ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>ขอขนาดภาพที่ โชว์ 100*100 พอ</td>
              <td>URl</td>
              <td>
                <button type="submit" class="btn btn-danger">ลบ</button>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

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
