<?php 
namespace App\View;

final class Template
{
  protected $template;
  protected $vars = array();

  /**
   * Template constructor.
   * @param $template
   */
  public function __construct($template)
  {
    $this->template = $template;
  }

  /**
   * get value pass to template
   * @param $key
   */
  public function __get($key)
  {
    return $this->vars[$key];
  }
  /**
   * set value pass to template
   * @param $key, value
      */
  public function __set($key, $value)
  {
    $this->vars[$key]=$value;
  }

  /**
   * convert object to string
   *
   */
  public function __toString()
  {
    extract($this->vars);
    chdir(dirname($this->template));
    ob_start();
    include basename($this->template);
    return ob_get_clean();
  }
}