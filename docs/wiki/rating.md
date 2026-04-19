# Rating

## Overview
Star based rating components.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/rating).

## HTML Example

```html
<div class="rating">
    <div class="rating-label checked">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
    <div class="rating-label checked">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
    <div class="rating-label">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Rating` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"rating\">
    <div class=\"rating-label checked\">
        <i class=\"ki-duotone ki-star fs-1\"></i>
    </div>
    <div class=\"rating-label checked\">
        <i class=\"ki-duotone ki-star fs-1\"></i>
    </div>
    <div class=\"rating-label\">
        <i class=\"ki-duotone ki-star fs-1\"></i>
    </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Rating`:
`rating, rating-label, checked`
