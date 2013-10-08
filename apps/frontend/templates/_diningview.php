  <div class="tab-pane" id="hall">
      <div class="container-fluid">
        <div class="row-fluid">
		<h1 style="text-align: center;"><?php echo $hall ?> </h1>
        	<div class="offset2">
               <div class="span9">
            	 <div class="well">
                <?php if (!$me): ?>
                <div class="row-fluid">
                  <div class="span8 offset2">
         			      <div class="progress progress-success">
                    	<div class="bar" style="width:<?php echo $count ?>%">
                        </div>
                    </div>
                  </div>
                </div>
                  <?php endif; ?>

<?php if(!$foods[0]) { ?>
  <div class="row-fluid">
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>CU Dining View</h4>
  <? if ($me): ?>
  You haven't subscribed to any foods yet!
<? else: ?>
  CU has not released info for the next meal yet!
<? endif; ?>
</div>
  </div>
  </div>
      </div>
      </div>
      </div>
      </div>
      </div>
<?php } else { ?>
<? if ($number == 1): ?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#all2" data-toggle="tab">All</a></li>
  <li><a href="#vegetarian2" data-toggle="tab">Vegetarian</a></li>
  <li><a href="#vegan2" data-toggle="tab">Vegan</a></li>
  <li><a href="#glutenfree2" data-toggle="tab">Gluten Free</a></li>
  <li><a href="#locallygrown2" data-toggle="tab">Locally Grown</a></li>
</ul>
<? else: ?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#all" data-toggle="tab">All</a></li>
  <li><a href="#vegetarian" data-toggle="tab">Vegetarian</a></li>
  <li><a href="#vegan" data-toggle="tab">Vegan</a></li>
  <li><a href="#glutenfree" data-toggle="tab">Gluten Free</a></li>
  <li><a href="#locallygrown" data-toggle="tab">Locally Grown</a></li>
</ul>
<? endif; ?>
<div class="tab-content">
  <? if ($number == 1): ?>
  <div class="tab-pane active" id="all2">
  <? else: ?>
  <div class="tab-pane active" id="all">
  <? endif; ?>
    <?php include_partial('global/foodview', array('foods' => $foods, 'type' => 'all', 'number' => $number)) ?>   
  </div>
  <? if ($number == 1): ?>
  <div class="tab-pane" id="vegetarian2">
  <? else: ?>
    <div class="tab-pane" id="vegetarian">
  <? endif; ?>

    <?php $vegetarianFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getV() == 1) {
        $vegetarianFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $vegetarianFoods, 'type' => 'vegetarian', 'number' => $number)) ?>   
  </div>
  <? if ($number == 1): ?>
  <div class="tab-pane" id="vegan2">
  <? else: ?>
    <div class="tab-pane" id="vegan">
  <? endif; ?>
    <?php $veganFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getVN() == 1) {
        $veganFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $veganFoods, 'type' => 'vegan', 'number' => $number)) ?>   
  </div>

  <? if ($number == 1): ?>
  <div class="tab-pane" id="glutenfree2">
  <? else: ?>
    <div class="tab-pane" id="glutenfree">
  <? endif; ?>
    <?php $glutenfreeFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getGF() == 1) {
        $glutenfreeFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $glutenfreeFoods, 'type' => 'glutenfree', 'number' => $number)) ?>   
  </div>
  <? if ($number == 1): ?>
  <div class="tab-pane" id="locallygrown2">
  <? else: ?>
    <div class="tab-pane" id="locallygrown">
  <? endif; ?>
    <?php $locallygrownFoods = array(); ?>
    <?php foreach ($foods as $food) {  ?>
      <?php if ($food->getL() == 1) {
        $locallygrownFoods[] = $food;
      }
      ?>
   <?php } ?>
    <?php include_partial('global/foodview', array('foods' => $locallygrownFoods, 'type' => 'locallygrown', 'number' => $number)) ?>   
  </div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>
<?php }  ?>
