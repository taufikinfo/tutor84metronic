# Pulse

## Overview
Pulsing rings used for active states or notifications.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/pulse).

## HTML Example

```html
<a href="#" class="btn btn-icon btn-light pulse pulse-success">
    <i class="ki-duotone ki-notification-on fs-2"></i>
    <span class="pulse-ring border-5"></span>
</a>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Pulse` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<a href=\"#\" class=\"btn btn-icon btn-light pulse pulse-success\">
    <i class=\"ki-duotone ki-notification-on fs-2\"></i>
    <span class=\"pulse-ring border-5\"></span>
</a>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Pulse`:
`pulse, pulse-[color], pulse-ring`
