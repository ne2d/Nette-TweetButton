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
  private $via = "";
  private $related1 = "";
  private $related2 = "";

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

  //This is the text that people will include in their Tweet when they share from your website:
  public function setText($text)
  {
    $this->text = $text;
  }

  //Suggest a default Tweet for users.
  public function setUrl($url)
  {
    $this->url = $url;
  }

  //This is the language that the button will render in on your website. People will see the Tweet dialog in their selected language for Twitter.com.
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

  //Recommend up to two Twitter accounts for users to follow after they share content from your website. These accounts could include your own, or that of a contributor or a partner.
  public function setVia($via)
  {
    $this->via = $via;
  }

  public function setRelated1($related1)
  {
    $this->related1 = $related1;
  }

  public function setRelated2($related2)
  {
    $this->related2 = $related2;
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

  private function getVia()
  {
    return $this->via;
  }

  private function getRelated1()
  {
    return $this->related1;
  }

  private function getRelated2()
  {
    return $this->related2;
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
    if($this->getVia() != "")
      $tweetdata['data-via'] = $this->getVia();
    if($this->getRelated1() != "" && $this->getRelated2() != "")
      $tweetdata['data-related'] = $this->getRelated1().':'.$this->getRelated2();

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