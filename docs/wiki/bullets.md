# Bullets

## Overview
Exclusively styled bullets to be used as indicators or separators.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/bullets).

## HTML Example

```html
<span class="bullet bullet-dot bg-danger"></span>
<span class="bullet bullet-vertical h-40px bg-success"></span>
<span class="bullet bullet-line w-40px bg-primary"></span>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Bullets` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<span class=\"bullet bullet-dot bg-danger\"></span>
<span class=\"bullet bullet-vertical h-40px bg-success\"></span>
<span class=\"bullet bullet-line w-40px bg-primary\"></span>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Bullets`:
`bullet-dot, bullet-vertical, bullet-line`
