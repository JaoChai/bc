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
          <?php echo form_open_multipart('Silder/insert');?>
          <div class="form-group">
            <label>Upload Picture Silder</label>
            <input type="file" name="userfile">
            <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label>Link Path URL</label>
              <input class="form-control" name="url">
            </div>

          </div>
          <button type="submit" class="btn btn-default">บันทึก</button>
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
              <th>รูปภาพ</th>
              <th>ลิ้ง</th>
              <th>การกระทำ</th>
            </tr>
          </thead>
          <?php $num = 1;?>
          <tbody>
            <?php foreach($result as $row):?>
              <tr>
                <td><?php echo $num++;?></td>
                <td><img alt="Your uploaded image" src="<?php echo base_url('uploads/slide/'. $row->img_newname); ?>" width="100" height="100"></td>
                <td><?php echo $row->url;?></td>
                <td>
                  <?php echo form_open("Silder/delete");?>
                  <input type="hidden" name="id" value="<?php echo $row->img_id;?>">
                  <input type="hidden" name="path" value="<?php echo $row->img_path;?>">
                  <button type="submit" class="btn btn-danger"> ลบ</button>
                  <?php echo form_close();?>
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
