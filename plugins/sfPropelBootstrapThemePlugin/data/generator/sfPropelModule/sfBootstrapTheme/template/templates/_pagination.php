<div class="pagination pagination-centered">
  <ul>
    <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1" title="[?php echo __('First page', array(), 'sf_admin') ?]"><i class="icon-fast-backward"></i></a></li>

    <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]" title="[?php echo __('Previous page', array(), 'sf_admin') ?]"><i class="icon-backward"></i></a></li>

  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
      <li class="active disabled"><a href="#">[?php echo $page ?]</a></li>
    [?php else: ?]
      <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a></li>
    [?php endif; ?]
  [?php endforeach; ?]

    <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]" title="[?php echo __('Next page', array(), 'sf_admin') ?]"><i class="icon-forward"></i></a></li>

    <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]" title="[?php echo __('Last page', array(), 'sf_admin') ?]"><i class="icon-fast-forward"></i></a></li>
  </ul>
</div>
