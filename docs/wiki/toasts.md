# Toasts

## Overview
Fixed position toast notifications.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/toasts).

## HTML Example

```html
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="ki-duotone ki-abstract-23 fs-2 text-success me-3"><span class="path1"></span><span class="path2"></span></i>
        <strong class="me-auto">Keenthemes</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Toasts` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"toast show\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">
    <div class=\"toast-header\">
        <i class=\"ki-duotone ki-abstract-23 fs-2 text-success me-3\"><span class=\"path1\"></span><span class=\"path2\"></span></i>
        <strong class=\"me-auto\">Keenthemes</strong>
        <small>11 mins ago</small>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"toast\" aria-label=\"Close\"></button>
    </div>
    <div class=\"toast-body\">
        Hello, world! This is a toast message.
    </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Toasts`:
``
