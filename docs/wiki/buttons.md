# Buttons

## Overview
Metronic specific button styles including light varieties and active states.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/buttons).

## HTML Example

```html
<a href="#" class="btn btn-primary d-inline-flex align-items-center">
    <i class="ki-duotone ki-plus fs-2"></i>
    Primary
</a>
<button class="btn btn-light-success">Light Success</button>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Buttons` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<a href=\"#\" class=\"btn btn-primary d-inline-flex align-items-center\">
    <i class=\"ki-duotone ki-plus fs-2\"></i>
    Primary
</a>
<button class=\"btn btn-light-success\">Light Success</button>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Buttons`:
`btn-primary, btn-light-success, btn-active-light-primary, btn-icon`
