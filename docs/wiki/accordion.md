# Accordion

## Overview
Enhanced Bootstrap accordions with custom icons.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/accordion).

## HTML Example

```html
<div class="accordion accordion-icon-toggle" id="kt_accordion_1">
    <div class="mb-5">
        <div class="accordion-header py-3 d-flex" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_item_1">
            <span class="accordion-icon"><i class="ki-duotone ki-arrow-right fs-4"></i></span>
            <h3 class="fs-4 fw-semibold mb-0 ms-4">The Best Template?</h3>
        </div>
        <div id="kt_accordion_1_item_1" class="fs-6 collapse show ps-10" data-bs-parent="#kt_accordion_1">
            Content goes here.
        </div>
    </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Accordion` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"accordion accordion-icon-toggle\" id=\"kt_accordion_1\">
    <div class=\"mb-5\">
        <div class=\"accordion-header py-3 d-flex\" data-bs-toggle=\"collapse\" data-bs-target=\"#kt_accordion_1_item_1\">
            <span class=\"accordion-icon\"><i class=\"ki-duotone ki-arrow-right fs-4\"></i></span>
            <h3 class=\"fs-4 fw-semibold mb-0 ms-4\">The Best Template?</h3>
        </div>
        <div id=\"kt_accordion_1_item_1\" class=\"fs-6 collapse show ps-10\" data-bs-parent=\"#kt_accordion_1\">
            Content goes here.
        </div>
    </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Accordion`:
`accordion-icon-toggle, accordion-icon`
