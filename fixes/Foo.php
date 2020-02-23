<?php namespace ProcessWire;
class Foo extends PWFix {
  public $label = "My foo label";
  public $description = "My foo description";
  public $issue = "https://github.com/processwire/processwire-issues/issues/xxx";
  public function init() {
    $this->config->styles->add($this->url(__DIR__ . '/Foo.css'));
    $this->config->scripts->add($this->url(__DIR__ . '/Foo.js'));
    if(function_exists('bd')) bd('foo init!');
  }
}
