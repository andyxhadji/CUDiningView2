<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?> 
[?php use_stylesheet('<?php echo $this->params['css'] ?>', 'first') ?] 
<?php elseif(!isset($this->params['css'])): ?> 
[?php use_stylesheet('/sfPropelBootstrapThemePlugin/css/bootstrap.min.css', 'first') ?] 
[?php use_stylesheet('/sfPropelBootstrapThemePlugin/css/bootstrap-responsive.min.css', 'first') ?]
[?php use_javascript('/sfPropelBootstrapThemePlugin/js/jquery-1.8.1.min.js') ?] 
[?php use_javascript('/sfPropelBootstrapThemePlugin/js/bootstrap.min.js') ?] 
[?php use_javascript('/sfPropelBootstrapThemePlugin/js/bootstrap-collapse.js') ?] 
<?php endif; ?>