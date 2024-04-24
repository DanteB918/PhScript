# PhScript
Composer package to write JavaScript using PHP.

[See more on the composer website](https://packagist.org/packages/dantebradshaw/phscript)

## Installation

Run this to install the package:
```
composer require dantebradshaw/phscript
```

## Example

```html
    <!--Consider the following HTML -->
    <form>
        <input type="text" name="test" />
        <input type="text" id="text" />
        <input type="submit" />
    </form>
```
```php
    <?php
        $script = new \DanteB\App\PhScript;

        $script->startScript(); // <script>

        $script->select('#text')->console()->end(); // console.log(document.querySelector('#text'));

        $changeEvent = $script->console('this')->string(); // console.log(document.querySelector(this)) <- but saved as a PHP string

        $script->select('#text')->listener('change', $changeEvent); // document.querySelector('#text').addEventListener('change', console.log(document.querySelector(this)));

        $eachEvent = $script->select('#text')->alert('An alert for every input!')->string(); // alert(document.querySelector('#text')) <- but saved as a PHP string

        $script->selectAll("input[type='text']")->forEach($eachEvent); // document.querySelectorAll("input[type='text']").forEach(function () { alert('An alert for every input!') });

        $script->endScript(); // </script>
    ?>
```

results in javascsript running without ever really needing to write any javascript. Of course, you'll want to put the scripts in the `<head>` or end of `<body>` in the document as you would a normal JS file.
