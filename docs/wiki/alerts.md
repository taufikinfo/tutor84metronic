# Alerts

## Overview
Beautiful alerts combined with icons.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/alerts).

## HTML Example

```html
<div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mb-10">
    <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"></i>
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <h4 class="fw-semibold">This is an alert</h4>
        <span>The alert body text goes here.</span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-primary"></i>
    </button>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Alerts` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mb-10\">
    <i class=\"ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0\"></i>
    <div class=\"d-flex flex-column pe-0 pe-sm-10\">
        <h4 class=\"fw-semibold\">This is an alert</h4>
        <span>The alert body text goes here.</span>
    </div>
    <button type=\"button\" class=\"position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto\" data-bs-dismiss=\"alert\">
        <i class=\"ki-duotone ki-cross fs-1 text-primary\"></i>
    </button>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Alerts`:
`alert-dismissible, bg-light-[color]`
