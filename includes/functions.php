<?php
function slug($text){ 
  if (is_null($text)) {
    return "";
}

// Remove spaces from the beginning and from the end of the string
$text = trim($text);

// Lower case everything 
// using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
$text = mb_strtolower($text, "UTF-8");;

// Make alphanumeric (removes all other characters)
// this makes the string safe especially when used as a part of a URL
// this keeps latin characters and arabic charactrs as well
$text = preg_replace("/[^a-z0-9_\s-अ आ ए ई ऍ ऎ ऐ इ ओ ऑ ऒ ऊ औ उ ब भ च छ ड ढ फ फ़ ग घ ग़ ह 
ज झ क ख ख़ ल ळ ऌ ऴ ॡ म न ङ ञ ण ऩ ॐ प क़ र ऋ ॠ ऱ स श ष ट त
 ठ द थ ध ड़ ढ़ व य य़ ज़  ा  ि ी  ु  ू  ृ  ॄ  े  ै  ो  ौ]/u", " ", $text);

// Remove multiple dashes or whitespaces
$text = preg_replace("/[\s-]+/", " ", $text);

// Convert whitespaces and underscore to the given separator
$text = preg_replace("/[\s_]/", "-", $text);

return $text; 
}
?>