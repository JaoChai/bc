<div class="row">
  <div class="col-xs-12">

    <h3 class="page-header">
      รูปแบบ <small>รายชื่อสมาชิก</small>
    </h3>

  </div>
</div> <!-- / .row -->

<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>สมาชิก</h3>
      </div>

      <div class="panel-body">
        <?php if($result == ""){ ?>
          <center><p>ไม่มีข้อมูล</p></center>
          <?php }else{ ?>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <th>ลำดับ</th>
                  <th>ชื่อ</th>
                  <th>เบอร์โทร</th>
                  <th>อีเมล์</th>
                  <th>การกระทำ</th>
                </thead>
                <tbody>
                  <?php $num = $this->uri->segment(3)+1; ?>
                  <?php foreach($result as $row): ?>
                    <tr>
                      <td><?php echo $num++;?></td>
                      <td><?php echo $row->mem_name;?></td>
                      <td><?php echo $row->mem_tel;?></td>
                      <td><?php echo $row->mem_email;?></td>
                      <td>
                        <a href="javascript:void(0);" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="ลบ" onclick="del(<?php echo $row->mem_id;?>);"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
              <center><?php echo $links;?></center>
            </div>
            <?php } ?>
            <?php
            echo form_open('member/export',' name="form_export" ');
            ?>
            <input type="submit" class="btn btn-primary btn-lg" name="btn_export" id="btn_export" value="ออกรายงาน">
            <?php
            echo form_close();
            ?>
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
