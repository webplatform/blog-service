<?php

/**
 * Use PHP to read and serve a file for us
 *
 * Since we want to serve static files from a
 * PHP-FPM handler from a remote server, we need
 * a way to get the file hosted on the app server
 * and be proxyed for us.
 *
 * This helper file is meant to be used by a rewrite
 * frunction from NGINX/Apache to ask for a file
 * e.g. file.php?f=path/to/file.png  and serve it
 * as if it was the file itself; also providing
 * appropriate HTTP headers and also favorize caching.
 *
 * To use in NGINX, make a rewrite location like so:
 * <code>
 *    location ~* .(gif|jpg|jpeg|png|ico|js|css)$ {
 *      expires max;
 *      add_header Pragma public;
 *      add_header Cache-Control "public, must-revalidate, proxy-revalidate";
 *      rewrite ^/(.*)$ /file.php?f=$1;
 *    }
 * </code>
 */

$f = (isset($_GET['f']))?$_GET['f']:null;

// http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
$status = '404 Not found';
$filesize = null;
$filetype = null;
$fileextension = null;
$fileinfo = null;
$file = '';

$fileTypes['image']['png'] = 'image/png';
$fileTypes['image']['jpg'] = 'image/jpeg';
$fileTypes['image']['gif'] = 'image/gif';
$fileTypes['text']['css'] = 'text/css';
$fileTypes['text']['html'] = 'text/html';
$fileTypes['text']['js'] = 'text/javascript';

if($f !== null) {
  $path = dirname(__FILE__).'/'.$f;
  $fileextension =  substr(strrchr($path, "."), 1);
  if(is_readable($path)) {
    $status = '200 OK';
    $info = new finfo(FILEINFO_MIME);
    $filetype = $info->file($path);
    $file = file_get_contents($path);
    $filesize = filesize($path);
    if(!!preg_match('/css/', $fileextension)) {
      $filetype = $fileTypes['text']['css'];
    }
    if(!!preg_match('/js/', $fileextension)) {
      $filetype = $fileTypes['text']['js'];
    }
  }
}

header('HTTP/1.1 '.$status);
if(is_numeric($filesize)) {
  header('X-Foo-Length: '.$filesize);
  header('Content-Length: '.$filesize);
}
if(is_string($filetype)) {
  header('Content-Type: '.$filetype);
}
header('X-Foo-Extension: '.$fileextension);
header('X-Requested-file: '.$path);

echo $file;
