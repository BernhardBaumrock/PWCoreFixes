<?php namespace ProcessWire;
class InputfieldToggleFix extends PWFix {
  public $label = "Always toggle Inputfield when header is clicked";
  public $description = "Please see the Github issue";
  public $issue = "https://github.com/processwire/processwire/pull/169";
  public $author = "BernhardBaumrock"; // github user that provided the fix
  public function init() {
    // fix goes here
  }
}
