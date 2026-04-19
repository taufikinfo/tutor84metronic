# Ribbon

## Overview
Card ribbons highlighting specific items.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/ribbon).

## HTML Example

```html
<div class="card">
    <div class="card-header ribbon ribbon-top">
        <div class="ribbon-label bg-primary">Ribbon</div>
        <div class="card-title">Card Title</div>
    </div>
    <div class="card-body">
        Content
    </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Ribbon` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"card\">
    <div class=\"card-header ribbon ribbon-top\">
        <div class=\"ribbon-label bg-primary\">Ribbon</div>
        <div class=\"card-title\">Card Title</div>
    </div>
    <div class=\"card-body\">
        Content
    </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Ribbon`:
`ribbon, ribbon-top, ribbon-end, ribbon-start`
