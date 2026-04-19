# Badges

## Overview
Badges with extended sizing, outlines, and varying border radiuses.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/badges).

## HTML Example

```html
<span class="badge badge-light-primary">Primary</span>
<span class="badge badge-circle badge-success">5</span>
<span class="badge badge-square badge-danger">Hot</span>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Badges` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<span class=\"badge badge-light-primary\">Primary</span>
<span class=\"badge badge-circle badge-success\">5</span>
<span class=\"badge badge-square badge-danger\">Hot</span>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Badges`:
`badge-light-[color], badge-circle, badge-square, badge-outline`
