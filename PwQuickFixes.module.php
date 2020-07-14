<?php namespace ProcessWire;
/**
 * PW Quick Fixes
 *
 * @author Bernhard Baumrock, 04.12.2019
 * @license Licensed under MIT
 * @link https://www.baumrock.com
 */
require('PWFix.php');
class PwQuickFixes extends WireData implements Module, ConfigurableModule {
  public $fixes;

  public static function getModuleInfo() {
    return [
      'title' => 'PwQuickFixes',
      'version' => '0.0.8',
      'summary' => 'Collection of PW Quick Fixes',
      'autoload' => true,
      'singular' => true,
      'icon' => 'bug',
      'requires' => [],
      'installs' => [],
    ];
  }
  public function __construct() {
    // populate defaults, which will get replaced with actual
    // configured values before the init/ready methods are called
    $this->setArray(self::$defaults);
  }

  static protected $defaults = [];
  public function getModuleConfigInputfields(array $data) {
    $inputfields = new InputfieldWrapper();
    $data = array_merge(self::$defaults, $data);

    foreach($this->getFixes() as $fix) {
      $f = wire('modules')->get('InputfieldCheckbox');
      $f->attr('name', $fix->name);
      $f->label = $fix->label;
      $f->description = $fix->description;
      $notes = [];
      if($fix->issue) $notes[] = "Related issue: [{$fix->issue}]({$fix->issue})";
      if($fix->author) $notes[] = "Fix by [{$fix->author}](https://github.com/{$fix->author}) - THX!";
      $f->notes = implode("\n", $notes);
      $checked = (array_key_exists($fix->name, $data) AND $data[$fix->name]);
      $f->attr('checked', $checked ? 'checked' : '');
      $inputfields->add($f);
    }

    return $inputfields;
  }

  public function init() {
    $this->getFixes();
  }

  public function ready() {
    $name = $this->input->get('name', 'string');
    if($this->page->id == 21 AND $name == 'PwQuickFixes') {
      if(function_exists('bd')) bd($this->fixes);
    }
  }

  /**
   * Populate array of all fixes and trigger the init() method
   */
  public function getFixes() {
    if($this->fixes) return $this->fixes;

    $fixes = [];
    $files = $this->files->find(__DIR__ . '/fixes', [
      'extensions' => ['php'],
    ]);
    foreach($files as $file) {
      $info = (object)pathinfo($file);

      // load class
      require_once($file);
      $name = $info->filename;
      $className = "\ProcessWire\\$name";
      $class = new $className();
      $class->name = $name;

      // set reference to this module
      $class->fixes = $this;

      // call init method if fix is enabled
      $name = $class->name;
      if(!!$this->{$name}) {
        $class->init();
        $class->loadAssets();
      }

      // add it to array
      $fixes[] = $class;
    }
    $this->fixes = $fixes;
    return $fixes;
  }
}
