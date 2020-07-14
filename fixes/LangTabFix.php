<?php namespace ProcessWire;
class LangTabFix extends PWFix {
  public $label = "Fix wrong lang-tab active";
  public $description = "Using RockAdminTheme the wrong (default) lang tab is active when user-lang != default";
  public $issue = "";
  public $author = "BernhardBaumrock"; // github user that provided the fix
  public function init() {
    // fix goes here
  }
}
