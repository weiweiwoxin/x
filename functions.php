<?php
ini_set("error_reporting", "E_ALL & ~E_NOTICE");
function parseContnet($content)
{
  //解析文章 暂只是添加 h3,h4 锚点，为 <img> 添加 data-action

  //添加 h3,h4 锚点
  $ftitle = array();
  preg_match_all('/<h([3-4])>(.*?)<\/h[3-4]>/', $content, $title);
  $num = count($title[0]);

  for ($i = 0; $i < $num; $i++) {
    $f = $title[2][$i];
    $type = $title[1][$i];
    if ($type == '3') {
      $ff = '<h3 id="anchor-' . $i . '">' . $f . '</h3>';
    }
    if ($type == '4') {
      $ff = '<h4 id="anchor-' . $i . '">' . $f . '</h4>';
    }
    array_push($ftitle, $ff);
  }
  for ($i = 0; $i < $num; $i++) {
    $content = str_replace_limit($title[0][$i], $ftitle[$i], $content);
  }

  //<img> 添加 data-action
  $fimg = array();
  preg_match_all('/<img (.*?)>/', $content, $img);
  $num = count($img[0]);

  for ($i = 0; $i < $num; $i++) {
    $f = $img[1][$i];
    $ff = '<img data-action="zoom" ' . $f . '>';

    array_push($fimg, $ff);
  }
  for ($i = 0; $i < $num; $i++) {
    $content = str_replace_limit($img[0][$i], $fimg[$i], $content);
  }

  print_r($content);
}

function str_replace_limit($search, $replace, $subject, $limit = 1)
{
  if (is_array($search)) {
    foreach ($search as $k => $v) {
      $search[$k] = '`' . preg_quote($search[$k], '`') . '`';
    }
  } else {
    $search = '`' . preg_quote($search, '`') . '`';
  }

  return preg_replace($search, $replace, $subject, $limit);
}

function post_tor($content)
{
  $f = '';
  preg_match_all('/<h[3-4]>(.*?)<\/h[3-4]>/', $content, $tor_i);
  $num = count($tor_i[0]);
  for ($i = 0; $i < $num; $i++) {
    $a = '<a href="#anchor-' . $i . '">' . $tor_i[0][$i] . '</a>';
    $f = $f . $a;
  }
  $f = str_replace('<h3>', '<span class="tori">', $f);
  $f = str_replace('</h3>', '</span><br>', $f);
  $f = str_replace('<h4>', '<span class="torii">', $f);
  $f = str_replace('</h4>', '</span><br>', $f);
  if ($num == 0) {
    return '';
  } else {
    return '<a href="#main">Title</a><br>' . $f . '<a href="javascript:goToComment();">Comment</a>';
  }
}

function post_config($content)
{
  $rst = array();
  preg_match_all('/<!-- isTorTree:(.*?); -->/', $content, $isTor);
  if ($isTor[1][0] == 'on') {
    $rst['isTorTree'] = 1;
  }

  return $rst;
}

//缩略图 For Markdown by Mike.   
function img_postthumb($cid) {   
  $db = Typecho_Db::get();   
  $rs = $db->fetchRow($db->select('table.contents.text')   
    ->from('table.contents')   
    ->where('table.contents.cid=?', $cid)   
    ->order('table.contents.cid', Typecho_Db::SORT_ASC)   
    ->limit(1));   
  $final = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($rs);   
  preg_match_all("/(https?:\/\/)[^>]*?.(gif|png|jpg)/i", $final['text'], $thumbUrl);  //通过正则式获取图片地址   https?://.+\.(jpg|gif|png)
  $img_src = $thumbUrl[0][0];  //将赋值给img_src   
  $img_counter = count($thumbUrl[0]);  //一个src地址的计数器   
  switch ($img_counter > 0) {   
    case $allPics = 1:   
      echo $img_src;  //当找到一个src地址的时候，输出缩略图   
      break;   
      default:   
      echo "nopic.png";  //没找到(默认情况下)，不输出任何内容   
  };   
}  