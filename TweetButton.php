<?php
/**
 * TweetButton control
 *
 * @copyright Tomáš Nedvěd (ne2d) http://programator.ne2d.cz
 * @licence WTFPL - Do What The Fuck You Want To Public License 
 * @version 1.0
 */
 

class Twitter_TweetButton extends Control
{

  private $count = "vertical";
  private $text = "";
  private $url = "";
  private $language = "en";

  public function setCount($count)
  {
    switch($count)
    {
      case "vertical":
        $this->count = "vertical";
        break;
      case "horizontal":
        $this->count = "horizontal";
        break;
      case "none":
        $this->count = "none";
        break;
      default:
        $this->count = "vertical";
    }
    return $this;
  }

  public function setText($text)
  {
    $this->text = $text;
  }

  public function setUrl($url)
  {
    $this->url = $url;
  }

  public function setLanguage($lang)
  {
    switch($lang)
    {
      case "English":
        $this->language = "en";
        break;
      case "French":
        $this->language = "fr";
        break;
      case "German":
        $this->language = "de";
        break;
      case "Italian":
        $this->language = "it";
        break;
      case "Japanese":
        $this->language = "ja";
        break;
      case "Korean":
        $this->language = "ko";
        break;
      case "Russian":
        $this->language = "ru";
        break;
      case "Spanish":
        $this->language = "es";
        break;
      case "Turkish":
        $this->language = "tr";
        break;
      default:
        $this->language = "en";
    }
    return $this;
  }

  private function getCount()
  {
    return $this->count;
  }

  private function getText()
  {
    return $this->text;
  }

  private function getUrl()
  {
    return $this->url;
  }

  private function getLanguage()
  {
    return $this->language;
  }

  /*
  * Renders
  */
  public function render($args = array())
  {
    //$this->parseParams($args);
    $this->generate();
  }

  /*
  * Generating
  */
  public function generate()
  {
    $output = null;

    $tweetdata = array();
    $tweetdata['data-count'] = $this->getCount();
    if($this->getText() != "")
      $tweetdata['data-text'] = $this->getText();
    if($this->getUrl() != "")
      $tweetdata['data-url'] = $this->getUrl();
    if($this->getLanguage() != "")
      $tweetdata['data-lang'] = $this->getLanguage();

    $el = Html::el('a', $tweetdata)
      ->href('http://twitter.com/share')
      ->class('twitter-share-button')
      ->setText('Tweet');
    
    $output .= $el;
    
    $el = Html::el('script')
      ->type('text/javascript')
      ->src('http://platform.twitter.com/widgets.js')
      ->render(1);

    $output .= $el;

    echo $output;
  }
  
}