    <?php 
    $title = $_SESSION['title']; 
    $description = $_SESSION['description'];
    $status = $_SESSION['status'];
    $uid= $_SESSION['uid']; ?>
 

   <div class="demo-card-square mdl-card mdl-cell mdl-cell--3-col  mdl-cell--4-col-tablet mdl-cell--6-col-phone mdl-shadow--2dp" style="text-align:center;"> 
  <div class="mdl-card__title mdl-card--expand" style=" center center no-repeat ; ">  	
    <h2 class="mdl-card__title-text"><?php echo $title ?></h2>
  </div>
  <div class="mdl-card__supporting-text"><?php echo $description ?></div>
  <div class="mdl-card__actions mdl-card--border">
     <?php if($status==1){$sym='thumb_up';}else{$sym='thumb_down';}
    echo form_open('Dashboard_controller/status_change');
    echo form_hidden('uid',$uid);
    echo form_hidden('status',!($status));?>
   <button id="manage"class="mdl-button mdl-button--colored mdl-button--primary mdl-js-button mdl-js-ripple-effect"> 
        <a class="mdl-button--primary material-icons"><?php echo $sym; ?><a class="mdl-button--primary">
    <?php if($status==1){echo 'MARK AS COMPLETE';}
        else if($status==0){echo 'MOVE TO PENDING';}?>
    </a></a></button><?php echo form_close();?>
      
      <?php echo form_open('Dashboard_controller/delete_task'); echo form_hidden('uid',$uid);?>
      <button class="mdl-button mdl-button--colored mdl-button--accent mdl-js-button mdl-js-ripple-effect del ">
          <a class="mdl-button--accent material-icons">delete_forever<a>delete</a>
    </a></button><?php echo form_close();?>
  </div>
</div>
