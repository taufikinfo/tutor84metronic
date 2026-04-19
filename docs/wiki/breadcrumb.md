# Breadcrumb

## Overview
Custom breadcrumbs separated by dots or chevrons.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/breadcrumb).

## HTML Example

```html
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Library</li>
</ul>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Breadcrumb` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<ul class=\"breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1\">
    <li class=\"breadcrumb-item text-muted\">
        <a href=\"../../demo1/dist/index.html\" class=\"text-muted text-hover-primary\">Home</a>
    </li>
    <li class=\"breadcrumb-item\">
        <span class=\"bullet bg-gray-400 w-5px h-2px\"></span>
    </li>
    <li class=\"breadcrumb-item text-dark\">Library</li>
</ul>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Breadcrumb`:
`breadcrumb-separatorless, breadcrumb-dot`
