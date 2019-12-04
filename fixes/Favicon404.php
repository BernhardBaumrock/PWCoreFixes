<?php namespace ProcessWire;
/**
 * Other possible fixes: http://www.faviconcodegenerator.com/prevent-favicon-404-error.php
 */
class Favicon404 extends PWFix {
  public $label = "Prevent Favicon 404 error";
  public $description = "If no favicon.ico file exists, devtools will report a 404. This fix will add a dummy favicon so that the 404 error is not displayed in the devtools.";
  public function init() {
    $this->addHookAfter('Page::render', function($event) {
      $file = $this->config->paths->root."favicon.ico";
      if(is_file($file)) return;
      $html = $event->return;
      $html = str_replace(
        "</head>",
        '<link rel="icon" href="data:;base64,iVBORw0KGgo="></head>',
        $html
      );
      $event->return = $html;
    });
  }
}
