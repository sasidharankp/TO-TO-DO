<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TO-TO-DO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-red.min.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
</head>
<style>
    .demo-card-square.mdl-card {
        height: 320px;
    }
    
    <?php $cardcolor='#46B6AC' ?> .demo-card-square > .mdl-card__title {
        color: #fff;
        background: center center no-repeat <?php echo $cardcolor ?>;
    }
    
    .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type {
        padding-right: 0;
    }
</style>

<body>
       <dialog class="mdl-dialog" style="width:35%">
    <h4 class="mdl-dialog__title">Create New TO-TO-DO</h4>
    <div class="mdl-dialog__content">

              <?php $this->load->view('add_new_task'); ?>

    </div>
    <div class="mdl-dialog__actions">
     
      <button type="button" class="mdl-button close">Close</button>
    </div>
  </dialog>
    <!-- Simple header with fixed tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs ">
        <header class="mdl-layout__header mdl-layout__header--waterfall">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">TO-TO-DO Dashboard</span>
                <?php 	echo form_open('Login/logout');?>
                 <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" 
                 style="position: fixed; top:2%;right:4%; z-index:1;">
                            <i class="material-icons">exit_to_app</i>LOGOUT </button>
                            <?php echo form_close();?>
            </div>
            <!-- Tabs -->
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Pending TO-TO-DOs</a>
                <a href="#fixed-tab-2" class="mdl-layout__tab">Completed TO-TO-DOs</a>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">TO-TO-DO</span>
        </div>
        <main class="mdl-layout__content">
            <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                <div class="page-content">
                    <div class="mdl-grid">
                        <?php
     if (is_array($usertasks))
          {
        foreach($usertasks as $object) {
            if ($object->status == 1){
            $_SESSION['title'] = $object->title;
            $_SESSION['description'] = $object->description;
            $_SESSION['status'] = $object->status;                
            $_SESSION['uid'] = $object->uid; 
            $this->load->view('taskcard');
            }
        }
     }
       else{
                        $_SESSION['title'] = 'No TO-TO-DOs here';
                        $_SESSION['description'] = 'Please Click the + button to add new TO-TO-DOs';
                        $_SESSION['status'] = 'Add Task';
                        $_SESSION['uid'] = 'invalid task';
                        $this->load->view('taskcard');
                        }
        ?>
                    </div>
            </section>
            <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                <div class="page-content">
                    <div class="mdl-grid">
                        <?php
                   if (is_array($usertasks))
          {
        foreach($usertasks as $object) {
            if ($object->status == 0){
            $_SESSION['title'] = $object->title;
            $_SESSION['description'] = $object->description;
            $_SESSION['status'] = $object->status;
            $_SESSION['uid'] = $object->uid;
            $this->load->view('taskcard');
            }
        }
                   }
                  else{
                        $_SESSION['title'] = 'No TO-TO-DOs here';
                        $_SESSION['description'] = 'Please Click the + button to add new TO-TO-DOs';
                        $_SESSION['status'] = 'Add Task';
                        $_SESSION['uid'] = 'invalid task';
                        $this->load->view('taskcard');
                        }
        ?>

                    </div>
                </div>
            </section>
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect popup mdl-button--colored" style="position: fixed; bottom: 12%;right:4%; z-index:1;">
                <i class="material-icons">add</i>
            </button>              
            <script> 
                    var dialog = document.querySelector('dialog');
                var showDialogButton = document.querySelectorAll(".popup");
                if (!dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                for (var i = 0; i < showDialogButton.length; i++) {
                    showDialogButton[i].addEventListener('click', function () {
                        dialog.showModal();
                    });
                }

                dialog.querySelector('.close').addEventListener('click', function () {
                    dialog.close();
                });
            </script>
        </main>
        <footer class="mdl-mini-footer" style="padding:1% 1%">
            <div class="mdl-mini-footer__left-section">
                <div class="mdl-logo">TO-TO-DO</div>
                <ul class="mdl-mini-footer__link-list">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Privacy & Terms</a></li>
                </ul>
            </div>
        </footer>
        </div>
</body>

</html>