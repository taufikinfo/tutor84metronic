# Tooltips

## Overview
Darkened tooltips for interactive contexts.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/tooltips).

## HTML Example

```html
<!-- Trigger -->
<button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
  Tooltip on top
</button>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Tooltips` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<!-- Trigger -->
<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Tooltip on top\">
  Tooltip on top
</button>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Tooltips`:
``
