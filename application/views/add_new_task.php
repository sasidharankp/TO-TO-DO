<?php 
	echo form_open('Dashboard_controller/add_task');
    echo form_hidden('username',$this->session->userdata('username'));
    echo form_hidden('status',1);?>
                    
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" required type="text"<?php  echo form_input('title');?>
                    <label class="mdl-textfield__label" for="title">Title</label>
                  </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" required type="text" <?php  echo form_input('description');?>
                    <label class="mdl-textfield__label" for="description">Description</label>
                  </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input datepick"<?php  echo form_input('end_date');?>
                    <label class="mdl-textfield__label" for="date">Deadline</label>
                  </div>
                    <br>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">ADD</button>
                <?php echo form_close();?>