<?php namespace ProcessWire;
class Foo extends PWFix {
  public $label = "My foo label";
  public $description = "My foo description";
  public $issue = "https://github.com/processwire/processwire-issues/issues/xxx";
  public $author = "BernhardBaumrock"; // github user
  public function init() {
    // fix goes here
  }
}
