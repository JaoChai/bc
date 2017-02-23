<?php $sql = "SELECT * FROM slide";
  $query = $this->db->query($sql);
?>


<div class="mainContent clear">
  <div class="carousel_main_wrapper">
    <div class="carousel_main">

      <?php foreach($query->result() as $row): ?>

      <div class="slide" style="background-image: url('<?php echo base_url();?>uploads/slide/<?php echo $row->img_newname;?>');">
        <a href="<?php echo $row->url;?>"> </a>
      </div>

    <?php endforeach;?>


    </div>

    <div class="pager">
      <div id="pager"><a class="selected"></a></div>
    </div>

  </div>
</div>
