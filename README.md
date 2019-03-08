<p align="center"><a href="https://dev.piedweb.com">
<img src="https://raw.githubusercontent.com/PiedWeb/piedweb-devoluix-theme/master/src/img/logo_title.png" width="200" height="200" alt="Open Source Package" />
</a></p>

# Tiny MailList Builder...

... for almost hand-held newsletter.


## Install

Using composer : [Packagist](https://packagist.org/packages/piedweb/tiny-maillist-builder)

``` bash
$ composer require piedweb/tiny-maillist-builder
```

## Usage

This example demonstrate the possible usage on a static website on the one hand (where we want
the user suscribe to our email list), and on the other hand, a dynamic server with a specific
subdomain (eg: mail-list.example.tld).

The dynamic server will host our package and a simple controller like :

``` php
include 'vendor/autoload.php';

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $list = new TinyMailListBuilder(['piedweb'], 'list');
    if ($list->add(trim($_POST['email'] ?? ''), $_POST['list'] ?? '')) {
        exit('OK');
    } else {
        exit('EVER');
    }

} else {
    header("HTTP/1.1 401 Unauthorized");
    exit('ERROR');
}

```

The static website will integrate in his front end something like :
``` javascript
import { tinyMailListBuilder } from "~/vendor/piedweb/tiny-maillist-builder/js/TinyMailListBuilder.js";

var form = document.getElementById("newsletter");
var config_list = 'piedweb';

form.addEventListener("submit", function(evt) {
    evt.preventDefault();
  form.querySelector('input[type="submit"]').value = '...';
  form.querySelector('input[type="submit"]').setAttribute('disabled', 'disabled');
    tinyMailListBuilder(form, function(text) {console.log(text);form.querySelector('input[type="submit"]').value = 'Stored !';});
}, config_list);
```
``` html
<form action="https://mailist.example.tld/" id="newsletter">
  <input type=email placeholder="contact@example.tld">
  <input type=submit >
</form>
```

## Contributing

Please see [contributing](https://dev.piedweb.com/contributing)

## Credits

- [PiedWeb](https://piedweb.com)
- [All Contributors](https://github.com/PiedWeb/:package_skake/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[![Latest Version](https://img.shields.io/github/tag/PiedWeb/TinyMailListBuilder.svg?style=flat&label=release)](https://github.com/PiedWeb/TinyMailListBuilder/tags)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)
[![Build Status](https://img.shields.io/travis/PiedWeb/TinyMailListBuilder/master.svg?style=flat)](https://travis-ci.org/PiedWeb/TinyMailListBuilder)
[![Quality Score](https://img.shields.io/scrutinizer/g/PiedWeb/TinyMailListBuilder.svg?style=flat)](https://scrutinizer-ci.com/g/PiedWeb/TinyMailListBuilder)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/PiedWeb/TinyMailListBuilder.svg?style=flat)](https://scrutinizer-ci.com/g/PiedWeb/TinyMailListBuilder/code-structure)
[![Total Downloads](https://img.shields.io/packagist/dt/piedweb/tiny-maillist-builder.svg?style=flat)](https://packagist.org/packages/piedweb/tiny-maillist-builder)
