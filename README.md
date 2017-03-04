# ScanDir-PHP

## USE

### **Simple Use**

```php
$res = new dir_scan('folder');

$file = $res->res;

```
```php
$res = new dir_scan('folder,folder2');

$file = $res->res;

```
```php
$res = new dir_scan(array('folder','folder2'));

$file = $res->res;

```
**Output class**

```php
$res = new dir_scan('css');
```

```json
{
    "dirpr": [
        "css"
    ],
    "ext": [],
    "res": [
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
    ],
    "err": [],
    "rec": true
}
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
