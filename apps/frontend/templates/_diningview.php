  <div class="tab-pane" id="hall">
      <div class="container-fluid">
        <div class="row-fluid">
        	<div class="offset2">
              <h1 class="offset3"><?php echo $hall ?> </h1>
               <div class="span9">
            	 <div class="well">
                <div class="row-fluid">
                  <div class="span8 offset2">
         			      <div class="progress progress-success">
                    	<div class="bar" style="width: 30%">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="alert">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Under Construction</strong> Real-time occupancy coming soon! ^ ^ ^
                    </div>
                  </div>
<?php if(!$foods[0]) { ?>
  <div class="row-fluid">
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>CU Dining View</h4>
  CU has not released info for the next meal yet!</div>
  </div>
  </div>
      </div>
      </div>
      </div>
      </div>
      </div>
<?php } else { ?>

<ul class="nav nav-tabs">
  <li class="active"><a href="#all" data-toggle="tab">All</a></li>
  <li><a href="#vegetarian" data-toggle="tab">Vegetarian</a></li>
  <li><a href="#vegan" data-toggle="tab">Vegan</a></li>
  <li><a href="#glutenfree" data-toggle="tab">Gluten Free</a></li>
  <li><a href="#locallygrown" data-toggle="tab">Locally Grown</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="all">
    <?php include_partial('global/foodview', array('foods' => $foods, 'type' => 'all')) ?>   
  </div>

  <div class="tab-pane" id="vegetarian">
    <?php $vegetarianFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getV() == 1) {
        $vegetarianFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $vegetarianFoods, 'type' => 'vegetarian')) ?>   
  </div>

  <div class="tab-pane" id="vegan">
    <?php $veganFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getVN() == 1) {
        $veganFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $veganFoods, 'type' => 'vegan')) ?>   
  </div>

  <div class="tab-pane" id="glutenfree">
    <?php $glutenfreeFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getGF() == 1) {
        $glutenfreeFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $glutenfreeFoods, 'type' => 'glutenfree')) ?>   
  </div>

  <div class="tab-pane" id="locallygrown">
    <?php $locallygrownFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getL() == 1) {
        $locallygrownFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $locallygrownFoods, 'type' => 'locallygrown')) ?>   
  </div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>
<?php }  ?>
