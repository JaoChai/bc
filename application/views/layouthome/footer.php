<div class="clear"></div>
<br />



<div class="footer_background">

  <div class="footercontent clear">
    <br />
    <div class="float_right footerlink">
      <ul>
        <li><div class="copyright"><a href="http://www.casino1988.net/" rel="nofollow" target="_blank" title="&copy;2017 Casino1988 สงวนลิขสิทธิ์| 18+">&copy;2017 Casino1988</a></div></li>
      </ul>
    </div>
    <style>
    .footerlink {
      height: auto;
      line-height: normal;
    }
    .footerlink ul li {
      line-height: 24px;
    }
    .footerlink ul li a{
      font-size: 12px;
    }
    </style>

    <div class="footerlink">
      <ul>
        <li><a href="#">การันตีความปลอดภัย</a></li><li>|</li>
        <li><a href="#">การจ่ายเงิน</a></li><li>|</li>
        <li><a href="#">กฎกติกา</a></li><li>|</li>
        <li><a href="#">วีไอพีคลับ</a></li><li>|</li>
        <li><a href="#">ข้่าวประชาสัมพันธ์</a></li><li>|</li>
        <li><a href="#">แนะสถานทีท่องเที่ยว</a></li><li>|</li>
        <li><a href="#">บทความ</a></li><li>|</li>
        <li><a href="#">แผนผังเว็บไซต์</a></li><li>|</li>
      </ul>
    </div>


    <script>
    function adjust_live_chat_v2() {
      $("div.live_chat_v2").css('top', $(window).scrollTop() + $(window).height() / 2 + "px");
    }

    function adjust_live_chat_v3() {
      if ($(window).scrollTop() > 200) {
        $("div.live_chat_v2").css('top', '25px');
        $("div.live_chat_v2").css('position', 'fixed');
      }
      else {
        $("div.live_chat_v2").css('top', '156px');
        $("div.live_chat_v2").css('position', 'fixed');
      }
    }

    function close_livechat() {
      $("div.live_chat_v2").hide();
      $.cookie("livechat", 1);
    }
    $(function () {
      //var chromeFix_livechat = ($.cookie("livechat")) ? parseInt($.cookie("livechat")) : 0;
      var chromeFix_livechat = 0;
      if (chromeFix_livechat < 1) {
        $("div.live_chat_v2").show();
      }
      if (($.browser.msie && $.browser.version == 6)) {
        $(window).bind("scroll load", adjust_live_chat_v2);
      }
      else {
        $(window).bind("scroll load", adjust_live_chat_v3);
      }

      var livechat_timeout;
      $("div.live_chat_v2 .slider").hover(function () {
        $("div.live_chat_v2 .slider").animate({ right: 0 }, 500);
        clearTimeout(livechat_timeout);
      }, function () {
        clearTimeout(livechat_timeout);
        livechat_timeout = setTimeout(function () {
          $("div.live_chat_v2 .slider").animate({ right: "-150px" }, 500);
        }, 500);
      });
    });

    $(window).load(function () {
      $("div.live_chat_v2 .no_slider").css("top", $("div.live_chat_v2 .slider").height());
    })
    </script>

    <style>
    div.live_chat_v2 {
      position: fixed;
      *position: fixed;
      right: 0px;
      top: 200px;
      z-index: 2000;
      display: none;
    }

    div.live_chat_v2 .slider {
      position: absolute;
      right: -150px;
      width: 221px;
      z-index:2;
    }

    div.live_chat_v2 .no_slider {
      position: absolute;
      right: 0;
      width: 71px;
    }

    div.live_chat_v2 div {
      position: relative;
    }

    div.live_chat_v2 div span {
      position: absolute;
    }

    div.live_chat_v3 {
      position: fixed;
      *position: fixed;
      right: 0;
      top: 200px;
      z-index: 2001;
    }

    .noborder {
      border: none;
    }
    </style>

  <!-- Tab Right !-->

    <div class="live_chat_v2 clear" >
      <div class="slider">
        <img src="<?php echo base_url();?>assets/home/_static/footer/livechat/img/th-thc4ca.png" usemap="#livechat_map" class="noborder" />
        <span class="move_up" style="top: 176px; left: 114px; color: white; font-size: 11px;"></span>
        <map name="livechat_map" class="noborder">
          <area shape="rect" coords="79, 243, 211, 277" href="#" class="noborder login_change">
          <area shape="rect" coords="79, 127, 211, 160" href="#" type="register" class="noborder login_remove">
          <area shape="rect" coords="95, 0, 200, 118" href="#" class="noborder">
          <area shape="rect" coords="77, 323, 220, 364" href="#" class="noborder login_change">
          <area shape="rect" coords="79, 204, 211, 238" href="#" class="noborder login_change">
        </map>
      </div>
    </div>

  <!-- End Tab Right !-->

<div class="clear" />
<div class="event_footer"></div>

</body>

</html>
