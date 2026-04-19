# Forms

## Overview
Extended form controls matching Metronic design standards.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/forms).

## HTML Example

```html
<div class="mb-10">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control form-control-solid" placeholder="name@example.com"/>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Forms` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"mb-10\">
    <label class=\"form-label\">Email address</label>
    <input type=\"email\" class=\"form-control form-control-solid\" placeholder=\"name@example.com\"/>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Forms`:
`form-control-solid, form-control-transparent, form-select-solid`
