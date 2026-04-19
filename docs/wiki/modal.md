# Modal

## Overview
Custom modal styling with specific alignments.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/modal).

## HTML Example

```html
<!-- Standard Bootstrap Modal with Metronic classes -->
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modal title</h3>
                <!-- Close button -->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
        </div>
    </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Modal` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<!-- Standard Bootstrap Modal with Metronic classes -->
<div class=\"modal fade\" tabindex=\"-1\" id=\"kt_modal_1\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h3 class=\"modal-title\">Modal title</h3>
                <!-- Close button -->
                <div class=\"btn btn-icon btn-sm btn-active-light-primary ms-2\" data-bs-dismiss=\"modal\" aria-label=\"Close\">
                    <i class=\"ki-duotone ki-cross fs-1\"><span class=\"path1\"></span><span class=\"path2\"></span></i>
                </div>
            </div>
        </div>
    </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Modal`:
`modal-dialog-centered`
