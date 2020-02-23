<?php namespace ProcessWire;
class SanitizerPageNameReplace extends PWFix {
  public $label = 'Add $sanitizer->pageNameReplace() method';
  public $description = "InputfieldPageName has a textarea to define character replacements but they are ignored when manually sanitizing strings via \$sanitizer->pageName(). This fix adds a \$sanitizer->pageNameReplace() method that replaces all characters before sanitization.";
  public function init() {
    $this->addHookMethod("Sanitizer::pageNameReplace", function(HookEvent $event) {
      $replacements = $event->modules->getConfig('InputfieldPageName')['replacements'];
      $str = str_replace(
        array_keys($replacements),
        array_values($replacements),
        $event->arguments(0)
      );
      $event->return = $event->object->pageName($str);
    });
  }
}
