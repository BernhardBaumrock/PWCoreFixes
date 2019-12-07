<?php namespace ProcessWire;
class ChildParentTemplateRemoval extends PWFix {
  public $label = "childTemplates and parentTemplates removal";
  public $description = "Removes a template from all template's `childTemplates` and `parentTemplates` settings when template itself is deleted.\nFixes: https://github.com/processwire/processwire-issues/issues/802";
  public function init() {
    $this->addHookAfter('Templates::delete', function($event) {
      bdb($event->arguments[0]->name);
      $templates = $event->object;
      foreach($templates as $t) {
          // child templates
          $childTemplates = $t->childTemplates;
          if($childTemplates) {
              foreach($childTemplates as $i => $tid) {
                  if(!$templates->get($tid)) {
                      unset($childTemplates[$i]);
                      $t->childTemplates = $childTemplates;
                      $t->save();
                  }
              }
          }

          // parent templates
          $parentTemplates = $t->parentTemplates;
          if($parentTemplates) {
              foreach($parentTemplates as $i => $tid) {
                  if(!$templates->get($tid)) {
                      unset($parentTemplates[$i]);
                      $t->parentTemplates = $parentTemplates;
                      $t->save();
                  }
              }
          }
      }
    });
  }
}
