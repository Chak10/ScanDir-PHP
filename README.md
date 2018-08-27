# ScanDir-PHP

## USE

```php
function __construct($dir = null, $ext = null, $rec = true) {}
```

### **Simple Use**

```php
$res = new dir_scan('folder');

$file = $res->res;

/* OR */

$file = (new dir_scan('folder'))->res;

```


**Output class**

```php
$res = new dir_scan('css');
```

```text
object(dir_scan)[1]
  public 'dirpr' => 
    string 'css' (length=3)
  public 'ext' => 
    array (size=0)
      empty
  public 'res' => 
    array (size=22)
      0 => string 'css\bootstrap\bootstrap-datetimepicker-standalone.css' (length=53)
      1 => string 'css\bootstrap\bootstrap-datetimepicker.css' (length=42)
      2 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.eot' (length=52)
      3 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.svg' (length=52)
      4 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.ttf' (length=52)
      5 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.woff' (length=53)
      6 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.woff2' (length=54)
      7 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.eot' (length=52)
      8 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.svg' (length=52)
      9 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.ttf' (length=52)
      10 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.woff' (length=53)
      11 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.woff2' (length=54)
      12 => string 'css\bootstrap\bootstrap-datetimepicker-standalone.css' (length=53)
      13 => string 'css\bootstrap\bootstrap-datetimepicker.css' (length=42)
      14 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.eot' (length=52)
      15 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.svg' (length=52)
      16 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.ttf' (length=52)
      17 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.woff' (length=53)
      18 => string 'css\bootstrap\fonts\glyphicons-halflings-regular.woff2' (length=54)
      19 => string 'css\sprite-white.css' (length=20)
      20 => string 'css\sprite.css' (length=14)
      21 => string 'css\table.css' (length=13)
```

### **Advanced (Search only files with a certain extension)**

```php
$res = new dir_scan('folder','ico');

$file = $res->res;

```
```php
$res = new dir_scan('folder','ico,php');

$file = $res->res;

```
```php
$res = new dir_scan('folder',array('ico','php'));

$file = $res->res;

```
### **Advanced (Recursive)**

**Case 1**

```php
$res = new dir_scan('folder');

$file = $res->res;

```

```json
[
    "css\\bootstrap\\bootstrap-datetimepicker-standalone.css",
    "css\\bootstrap\\bootstrap-datetimepicker.css",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.eot",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.svg",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.ttf",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.woff",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.woff2",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.eot",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.svg",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.ttf",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.woff",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.woff2",
    "css\\bootstrap\\bootstrap-datetimepicker-standalone.css",
    "css\\bootstrap\\bootstrap-datetimepicker.css",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.eot",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.svg",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.ttf",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.woff",
    "css\\bootstrap\\fonts\\glyphicons-halflings-regular.woff2",
    "css\\sprite-white.css",
    "css\\sprite.css",
    "css\\table.css"
]
```
--------------------------------------------------------------

**Case 2**

```php
$res = new dir_scan('folder',null,false);

$file = $res->res;

```

```json
[
    "css\\sprite-white.css",
    "css\\sprite.css",
    "css\\table.css"
]
```
