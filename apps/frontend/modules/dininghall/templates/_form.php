<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('dininghall/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?food_id='.$form->getObject()->getFoodId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('dininghall/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'dininghall/delete?food_id='.$form->getObject()->getFoodId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['CURRENT']->renderLabel() ?></th>
        <td>
          <?php echo $form['CURRENT']->renderError() ?>
          <?php echo $form['CURRENT'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Dish']->renderLabel() ?></th>
        <td>
          <?php echo $form['Dish']->renderError() ?>
          <?php echo $form['Dish'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['JAY']->renderLabel() ?></th>
        <td>
          <?php echo $form['JAY']->renderError() ?>
          <?php echo $form['JAY'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['JJP']->renderLabel() ?></th>
        <td>
          <?php echo $form['JJP']->renderError() ?>
          <?php echo $form['JJP'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['FER']->renderLabel() ?></th>
        <td>
          <?php echo $form['FER']->renderError() ?>
          <?php echo $form['FER'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ServingSize']->renderLabel() ?></th>
        <td>
          <?php echo $form['ServingSize']->renderError() ?>
          <?php echo $form['ServingSize'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Calories']->renderLabel() ?></th>
        <td>
          <?php echo $form['Calories']->renderError() ?>
          <?php echo $form['Calories'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['TotalFat']->renderLabel() ?></th>
        <td>
          <?php echo $form['TotalFat']->renderError() ?>
          <?php echo $form['TotalFat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Cholesterol']->renderLabel() ?></th>
        <td>
          <?php echo $form['Cholesterol']->renderError() ?>
          <?php echo $form['Cholesterol'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['SaturatedFat']->renderLabel() ?></th>
        <td>
          <?php echo $form['SaturatedFat']->renderError() ?>
          <?php echo $form['SaturatedFat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Protein']->renderLabel() ?></th>
        <td>
          <?php echo $form['Protein']->renderError() ?>
          <?php echo $form['Protein'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Carbohydrate']->renderLabel() ?></th>
        <td>
          <?php echo $form['Carbohydrate']->renderError() ?>
          <?php echo $form['Carbohydrate'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Fiber']->renderLabel() ?></th>
        <td>
          <?php echo $form['Fiber']->renderError() ?>
          <?php echo $form['Fiber'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Sodium']->renderLabel() ?></th>
        <td>
          <?php echo $form['Sodium']->renderError() ?>
          <?php echo $form['Sodium'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Score']->renderLabel() ?></th>
        <td>
          <?php echo $form['Score']->renderError() ?>
          <?php echo $form['Score'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Url']->renderLabel() ?></th>
        <td>
          <?php echo $form['Url']->renderError() ?>
          <?php echo $form['Url'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['V']->renderLabel() ?></th>
        <td>
          <?php echo $form['V']->renderError() ?>
          <?php echo $form['V'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['VN']->renderLabel() ?></th>
        <td>
          <?php echo $form['VN']->renderError() ?>
          <?php echo $form['VN'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['GF']->renderLabel() ?></th>
        <td>
          <?php echo $form['GF']->renderError() ?>
          <?php echo $form['GF'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['L']->renderLabel() ?></th>
        <td>
          <?php echo $form['L']->renderError() ?>
          <?php echo $form['L'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
