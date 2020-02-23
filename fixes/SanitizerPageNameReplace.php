<?php namespace ProcessWire;
class SanitizerPageNameReplace extends PWFix {
  public $label = 'Add $sanitizer->pageNameReplace() method';
  public $description = "InputfieldPageName has a textarea to define character replacements but they are ignored when manually sanitizing strings via \$sanitizer->pageName(). This fix adds a \$sanitizer->pageNameReplace() method that replaces all characters before sanitization.";
  public $issue = 'https://github.com/processwire/processwire-issues/issues/1096';
  public function init() {
    $this->addHookMethod("Sanitizer::pageNameReplace", function(HookEvent $event) {
      $replacements = $event->modules->getConfig('InputfieldPageName')['replacements'];
      $str = str_replace(
        array_keys($replacements),
        array_values($replacements),
        mb_strtolower($event->arguments(0)) // make sure we have no Ö Ä Ü
      );
      $event->return = $event->object->pageName($str);
    });
  }
}
