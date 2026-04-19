# Tabs

## Overview
Refined line tabs standard to Metronic style.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/tabs).

## HTML Example

```html
<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Link 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Link 2</a>
    </li>
</ul>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Tabs` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<ul class=\"nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6\">
    <li class=\"nav-item\">
        <a class=\"nav-link active\" data-bs-toggle=\"tab\" href=\"#kt_tab_pane_1\">Link 1</a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#kt_tab_pane_2\">Link 2</a>
    </li>
</ul>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Tabs`:
`nav-line-tabs, nav-line-tabs-2x`
