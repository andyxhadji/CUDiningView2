
<div class="container-fluid" style="text-align:center"><div class="row-fluid">
<?php foreach($foods as $food) { ?>


<a href="#<?php echo $food->getFOODID() ?><?php echo $type ?><?php echo $number ?>" role="button" class="btn" style="width:162px;
 margin-left:8px; margin-right:8px; margin-top: 8px"; data-toggle="modal">
 <img class="img-circle" src=<?php echo $food->getUrl() ?>><br><?php echo $food->getDish() ?></a>

 <div id="<?php echo $food->getFOODID() ?><?php echo $type ?><?php echo $number ?>"
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
    <?php
    $arr = $_SESSION['facebook']->getSignedRequest();
    $userId = $arr['user_id'];
    if ($userId && $_SESSION['facebook']->getUser()){ ?>
      <button class="btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
<?php
    $check = 0;
    foreach ($_SESSION['foods'] as $userFood)
    {
      if ($userFood == $food->getFOODID())
      {
        $check = 1;
      }
    }
    if ($check == 1): ?>
    <button id="food<?php echo $food->getFOODID(); echo $number ?>" type="button" onclick="subscribe(<?php echo $food->getFOODID() ?>, <?php echo $number ?>)" class="btn-inverse" data-loading-text="Hold on...">Remove from My Plate</button>
    <?php else: ?>
    <button id="food<?php echo $food->getFOODID(); echo $number ?>" type="button" onclick="subscribe(<?php echo $food->getFOODID(); ?>, <?php echo $number ?>)" class="btn-inverse" data-loading-text="Hold on...">Add to My Plate</button>
<?php endif; }
  else{ ?>
  <button style="margin-top: -17px" class="btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>

   <span>
  <fb:login-button size="large" show-faces="false" width="200" max-rows="1" ></fb:login-button>
</span>
  <?php
 
 }

 ?>
  </div>
      </div>

<?php } ?>

<script type="text/javascript">
function subscribe(food, number) {
    $.get("/dininghall/subscribe?id=" + food);
    if (document.getElementById('food' + food + number).innerHTML == 'Remove from My Plate')
    {
      document.getElementById('food' + food + number).innerHTML = 'Add to My Plate';
    }
    else
    {
      document.getElementById('food' + food + number).innerHTML = 'Remove from My Plate';
    }
    return false;
}

</script>

</div>
</div>
