# Overlay

## Overview
Hover or static overlays for images and panels.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/overlay).

## HTML Example

```html
<div class="overlay">
    <div class="overlay-wrapper">
        <img src="..." alt="..." class="w-100 rounded"/>
    </div>
    <div class="overlay-layer bg-dark bg-opacity-50 rounded">
        <a href="#" class="btn btn-primary btn-shadow">Quick View</a>
    </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Overlay` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"overlay\">
    <div class=\"overlay-wrapper\">
        <img src=\"...\" alt=\"...\" class=\"w-100 rounded\"/>
    </div>
    <div class=\"overlay-layer bg-dark bg-opacity-50 rounded\">
        <a href=\"#\" class=\"btn btn-primary btn-shadow\">Quick View</a>
    </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Overlay`:
`overlay, overlay-wrapper, overlay-layer`
