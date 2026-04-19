# Tables

## Overview
Expansive table variations tailored for large datasets.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/tables).

## HTML Example

```html
<table class="table table-row-dashed table-row-gray-300 gy-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800">
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
        </tr>
    </tbody>
</table>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Tables` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<table class=\"table table-row-dashed table-row-gray-300 gy-7\">
    <thead>
        <tr class=\"fw-bold fs-6 text-gray-800\">
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
        </tr>
    </tbody>
</table>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Tables`:
`table-row-dashed, table-row-bordered, gy-[x], gs-[x]`
