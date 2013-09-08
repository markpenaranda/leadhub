<?php 
if(count($items) > 0):
foreach($items as $item): ?>
        <ul class="thumbnails">
           <li class="span12 clearfix">
    <div class="thumbnail clearfix">
      
      <div class="caption" class="pull-left">
             <?php switch ($item->status) {
              case 'planning':
                ?>   <a href="#" class="btn btn-primary icon  pull-right change-status" id="planbtn" data-value="start" data-id="<?php echo $item->_id; ?>">Start</a>
              <?php 
                break;
              
              case 'onprocess':
              ?>   
              <a href="#" class="btn btn-primary icon  pull-right change-status" data-value="done" id="planbtn" data-id="<?php echo $item->_id; ?>">Done</a>
              <?php
                break;
              case 'done' :
              ?> <?php
                break;
            }
        ?>
        
        <h4>      
            <a href="#" ><?php echo $item->title; ?></a>
          </h4>
        <input id="status" type="hidden" value="<?php echo $item->status; ?>">
        <small><b>Description: </b><?php echo $item->description; ?></small><br>
         <small ><b>Status: </b><?php
         switch ($item->status) {
           case 'planning':
              ?>
                <span class="label label-info">Planning</span>
              <?php
             break;
           case 'onprocess':
              ?>
                <span class="label label-warning">On Process</span>
              <?php
             break;
             
           case 'done':
              ?>
                <span class="label label-success">Done</span>
              <?php
             break;
           default:
             # code...
             break;
         }
         ?></small>
      </div>
    </div>
</li>
                  </ul>
<?php endforeach; 
else :
?>

<div><center><i class="icon-info-sign"></i> No Project Added Yet</center></div>

<?php endif; ?>
