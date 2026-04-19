# Rotate

## Overview
Element rotation utilities primarily used in states.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/rotate).

## HTML Example

```html
<div class="rotate">
   <i class="ki-duotone ki-down rotate-180"></i>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Rotate` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"rotate\">
   <i class=\"ki-duotone ki-down rotate-180\"></i>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Rotate`:
`rotate, rotate-90, rotate-180, rotate-270`
