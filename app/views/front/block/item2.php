<?php 
foreach($items as $item): ?>
        <ul class="thumbnails">
           <li class="span12 clearfix">
    <div class="thumbnail clearfix">
      
      <div class="caption" class="pull-left">

        <h4>      
            <a href="#" ><?php echo $item->title; ?></a>
          </h4>
        <input id="status" type="hidden" value="<?php echo $item->status; ?>">
        <small><b>Description: </b><?php echo $item->description; ?></small><br>
         <small ><b>Status: </b><?php echo $item->status; ?></small>
      </div>
    </div>
</li>
                  </ul>
<?php endforeach; ?>

<script>

  $("#planbtn").click(function(){

    var datastring  = {"id" : $("#planbtn").attr("data-id"), "status" : $("#status").attr("value")};

    $.ajax({
      url : "/project/status",
      type : "post",
      data : datastring,
      success : function (data){
        console.log("success");
      }
    });
  });
</script>

