# Popovers

## Overview
Bootstrap popovers matching design scheme.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/popovers).

## HTML Example

```html
<!-- Data Attributes -->
<button type="button" class="btn btn-primary" data-bs-toggle="popover" data-bs-placement="top" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">
  Click to toggle popover
</button>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Popovers` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<!-- Data Attributes -->
<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"popover\" data-bs-placement=\"top\" title=\"Popover title\" data-bs-content=\"And here's some amazing content. It's very engaging. Right?\">
  Click to toggle popover
</button>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Popovers`:
``
