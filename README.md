PHP-Array-Heirarchy-Display
===========================

A quick and simple class to easily display single or multidimensional arrays in a human readable heirarchal form. Even works for PHP objects. Many customizations available to fit your needs.

<html>
<head>

<title> </title>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48664139-1', 'github.com');
  ga('send', 'pageview');

</script>

</head>
<body>

</body>
</html>


Example:
```PHP
require_once('Arrays.class.php');
$arr_func = new Array_Functions();

$arr_func->display_hierarchy($array);
$arr_func->display_hierarchy($php_object);
$arr_func->display_hierarchy($json);
```
