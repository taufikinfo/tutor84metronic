# Page Loading

## Overview
Full page loading overlay used between transitions.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/page-loading).

## HTML Example

```html
<!-- In Body -->
<div class="page-loader flex-column bg-dark bg-opacity-25">
    <span class="spinner-border text-primary" role="status"></span>
    <span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Page Loading` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<!-- In Body -->
<div class=\"page-loader flex-column bg-dark bg-opacity-25\">
    <span class=\"spinner-border text-primary\" role=\"status\"></span>
    <span class=\"text-gray-800 fs-6 fw-semibold mt-5\">Loading...</span>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Page Loading`:
`page-loader, page-loading`
