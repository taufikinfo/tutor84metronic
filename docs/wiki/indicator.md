# Indicator

## Overview
Loading indicators natively implemented for buttons.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/indicator).

## HTML Example

```html
<button type="button" class="btn btn-primary" id="kt_button_1">
    <span class="indicator-label">Submit</span>
    <span class="indicator-progress">
        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Indicator` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<button type=\"button\" class=\"btn btn-primary\" id=\"kt_button_1\">
    <span class=\"indicator-label\">Submit</span>
    <span class=\"indicator-progress\">
        Please wait... <span class=\"spinner-border spinner-border-sm align-middle ms-2\"></span>
    </span>
</button>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Indicator`:
`indicator-label, indicator-progress`
