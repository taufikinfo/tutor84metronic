# Underline

## Overview
Animated underlines often used for headings.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/underline).

## HTML Example

```html
<h3 class="mb-0">
    <span class="d-inline-block position-relative ms-2">
        <span class="d-inline-block mb-2">Exclusive</span>
        <span class="d-block position-absolute w-100 h-2px bg-primary bottom-0 start-0"></span>
    </span>
</h3>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Underline` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<h3 class=\"mb-0\">
    <span class=\"d-inline-block position-relative ms-2\">
        <span class=\"d-inline-block mb-2\">Exclusive</span>
        <span class=\"d-block position-absolute w-100 h-2px bg-primary bottom-0 start-0\"></span>
    </span>
</h3>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Underline`:
``
