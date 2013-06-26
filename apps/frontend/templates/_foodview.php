<div class="container-fluid" style="text-align:center"><div class="row-fluid">
<?php foreach($foods as $food) { ?>


<a href="#<?php echo $food->getFOODID() ?><?php echo $type ?>" role="button" class="btn" style="width:162px;
 margin-left:8px; margin-right:8px; margin-top: 8px"; data-toggle="modal">
 <img src=<?php echo $food->getUrl() ?>><br><?php echo $food->getDish() ?></a>

 <div id="<?php echo $food->getFOODID() ?><?php echo $type ?>"
   class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $food->getDish() ?>
    </h3>
  </div>
  <div class="modal-body">
    <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>Serving Size:</td>
                    <td><?php echo $food->getServingSize() ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Calories:</td>
                    <td><?php echo $food->getCalories() ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Total Fat:</td>
                    <td><?php echo $food->getTotalFat() ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Saturated Fat:</td>
                    <td><?php echo $food->getSaturatedFat() ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Cholesterol:</td>
                    <td><?php echo $food->getCholesterol() ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Protein:</td>
                    <td><?php echo $food->getProtein() ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Carbohydrate:</td>
                    <td><?php echo $food->getCarbohydrate() ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Sodium:</td>
                    <td><?php echo $food->getSodium() ?>
                    </td>
                  </tr>
                </tbody>
              </table>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
      </div>

<?php } ?>

</div>
</div>