# Pagination

## Overview
Enhanced pagination controls with outlines and circle styles.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/pagination).

## HTML Example

```html
<ul class="pagination pagination-circle">
    <li class="page-item previous disabled"><a href="#" class="page-link"><i class="previous"></i></a></li>
    <li class="page-item active"><a href="#" class="page-link">1</a></li>
    <li class="page-item"><a href="#" class="page-link">2</a></li>
    <li class="page-item next"><a href="#" class="page-link"><i class="next"></i></a></li>
</ul>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Pagination` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<ul class=\"pagination pagination-circle\">
    <li class=\"page-item previous disabled\"><a href=\"#\" class=\"page-link\"><i class=\"previous\"></i></a></li>
    <li class=\"page-item active\"><a href=\"#\" class=\"page-link\">1</a></li>
    <li class=\"page-item\"><a href=\"#\" class=\"page-link\">2</a></li>
    <li class=\"page-item next\"><a href=\"#\" class=\"page-link\"><i class=\"next\"></i></a></li>
</ul>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Pagination`:
`pagination-circle, pagination-outline`
