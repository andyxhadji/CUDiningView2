  public function getPagerClass()
  {
    return '<?php echo isset($this->config['list']['pager_class']) ? $this->config['list']['pager_class'] : 'sfPropelPager' ?>';
<?php unset($this->config['list']['pager_class']) ?>
  }

  public function getPagerMaxPerPage()
  {
    return <?php echo isset($this->config['list']['max_per_page']) ? (integer) $this->config['list']['max_per_page'] : 20 ?>;
<?php unset($this->config['list']['max_per_page']) ?>
  }

  public function getTemplatesSpan()
  {
    return <?php echo isset($this->config['template']['span']) ? (integer) $this->config['template']['span'] : 12 ?>;
<?php unset($this->config['template']['span']) ?>
  }