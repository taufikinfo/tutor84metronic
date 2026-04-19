# Utilities

## Overview
Extended Bootstrap 5 utilities used throughout Metronic.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/utilities).

## HTML Example

```html
<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
  <div class="text-gray-400 fw-semibold fs-4">
    Utility Classes Showcase
  </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Utilities` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9\">
  <div class=\"text-gray-400 fw-semibold fs-4\">
    Utility Classes Showcase
  </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Utilities`:
`flex-center, min-h-[x], px-[x], text-gray-[x], fw-semibold, fs-[x]`
