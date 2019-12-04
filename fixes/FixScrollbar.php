<?php namespace ProcessWire;
class FixScrollbar extends PWFix {
  public $label = "Fix horizontal scrollbar in PW Admin";
  public $description = "See [PW Issue #812](https://github.com/processwire/processwire-issues/issues/812)";
  public function init() {
    $this->addHookAfter('Page::render', function($event) {
      $html = $event->return;
      $html = str_replace(
        "<div id='pw-mastheads'>",
        "<div style='overflow-x:hidden;'><div id='pw-mastheads'>",
        $html
      );
      $html = str_replace("</body>", "</div></body>", $html);
      $event->return = $html;
    });
  }
}
