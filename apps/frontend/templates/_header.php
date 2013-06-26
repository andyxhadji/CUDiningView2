    <div class="navbar">
      <div class="navbar-inner">
        <div class="container offset6" style="text-align:center">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php url_for('homepage') ?>"><img style="margin-top:-6px" src="/images/logo-mini.png">  CU Dining View</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><?php echo link_to('Home', 'homepage') ?></li>
              <li><?php echo link_to('John Jay', 'johnjay/index') ?></li>
              <li><?php echo link_to('Ferris Booth Commons', 'ferris/index') ?></li>
              <li><?php echo link_to("JJ's Place", 'jjsplace/index') ?></li>
              <li><?php echo link_to("Contact", 'contact/index') ?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

