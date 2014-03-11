PHP-Array-Heirarchy-Display
===========================

A quick and simple class to easily display single or multidimensional arrays in a human readable heirarchal form. Even works for PHP objects and JSON strings. Many customizations available to fit your needs.

[![githalytics.com alpha](https://cruel-carlota.pagodabox.com/01d76d43eb46f35590a0d763de33ec31 "githalytics.com")](http://githalytics.com/DukeOfMarshall/PHP-Array-Heirarchy-Display)

Donate
======
[![PayPal donate button](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GBH93KNRNJ8AU "Show your appreciation with a donation")


Example:
========
```PHP
require_once('Arrays.class.php');
$arr_func = new Array_Functions();

$arr_func->display_hierarchy($array);
$arr_func->display_hierarchy($php_object);
$arr_func->display_hierarchy($json);
```

This will output something similar to:
```TEXT
total => 2
page => 1
per_page => 25
data => {
   0 => {
      uri => /videos/12341234
      name => video name
      description => 
      link => https://vimeo.com/12341234
      duration => 155
      width => 640
      height => 362
      created_time => 2012-02-06T00:59:11+00:00
      modified_time => 2012-02-09T04:07:32+00:00
      content_rating => unrated
      license => 
      privacy => {
         view => disable
         embed => whitelist
         download => 
         add => 
      } 
      pictures => {
         0 => {
            type => thumbnail
            width => 640
            height => 362
            link => https://secure-b.vimeocdn.com/ts/555/555/555716572_640.jpg
         } 
         1 => {
            type => thumbnail
            width => 295
            height => 166
            link => https://secure-b.vimeocdn.com/ts/555/555/555716572_295.jpg
         } 
         2 => {
            type => thumbnail
            width => 200
            height => 150
            link => https://secure-b.vimeocdn.com/ts/555/555/55516572_200.jpg
         } 
         3 => {
            type => thumbnail
            width => 150
            height => 88
            link => https://secure-b.vimeocdn.com/ts/555/555/555716572_150.jpg
         } 
         4 => {
            type => thumbnail
            width => 100
            height => 75
            link => https://secure-b.vimeocdn.com/ts/555/555/555716572_100.jpg
         } 
      }
   }
}
```
