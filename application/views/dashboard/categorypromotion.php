<div class="row">
  <div class="col-xs-12">

    <h3 class="page-header">
      กรุณากรอกข้อมูล หมวดหมู่โปรโมชั่น
    </h3>

  </div>
</div> <!-- / .row -->

<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row col-lg-6">
          <?php echo form_open('Promotion/insert_cate');?>

              <div class="form-group">
                <label>ชื่อหมวดหมู่</label>
                <input class="form-control" name="cate">
                <?php echo form_error('cate');?>
              </div>

                <div class="form-group">
                  <label>Link</label>
                  <input class="form-control" name="linkcate">
                </div>
                <button type="submit" class="btn btn-success">บันทึก</button>
              <?php echo form_close();?>
        </div>
      </div>
    </div> <!-- / .panel -->

    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>ชื่อโปรโมชั่น</th>
              <th>ลิ้ง</th>
              <th>การกระทำ</th>
            </tr>
          </thead>
          <?php $num = 1;?>
          <tbody>
            <?php foreach($result as $row): ?>
            <tr>
              <td><?php echo $num++;?></td>
              <td></td>
              <td><?php echo $row->cate_name;?></td>
              <td>
                <a href="<?php echo site_url('Promotion/update_cate/'. $row->cate_id);?>" class="btn btn-warning">แก้ไข</a>
                <a class="btn btn-danger" href="javascript:void(0);" onclick="del(<?php echo $row->cate_id;?>);">ลบ</a>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div> <!-- / .row -->

<script type="text/javascript">

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
    window.location = url+"Promotion/delete_cate/"+id;
  })
}
</script>
