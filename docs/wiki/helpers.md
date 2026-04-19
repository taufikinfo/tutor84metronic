# Helpers

## Overview
Custom helpers for sizes, positioning, z-index, and more.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/helpers).

## HTML Example

```html
<div class="z-index-1 position-absolute top-0 end-0 mt-5 me-5">
   Content
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Helpers` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"z-index-1 position-absolute top-0 end-0 mt-5 me-5\">
   Content
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Helpers`:
`z-index-[1-3], bgi-no-repeat, bgi-size-cover`
