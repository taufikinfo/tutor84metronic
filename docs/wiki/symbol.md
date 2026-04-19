# Symbol

## Overview
Standardized avatar and icon wrappers.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/symbol).

## HTML Example

```html
<div class="symbol symbol-50px symbol-circle">
    <img src="avatar.jpg" alt="image"/>
</div>
<div class="symbol symbol-50px">
    <div class="symbol-label bg-light-primary text-primary fs-2 fw-semibold">A</div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Symbol` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"symbol symbol-50px symbol-circle\">
    <img src=\"avatar.jpg\" alt=\"image\"/>
</div>
<div class=\"symbol symbol-50px\">
    <div class=\"symbol-label bg-light-primary text-primary fs-2 fw-semibold\">A</div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Symbol`:
`symbol, symbol-[size], symbol-circle, symbol-label`
