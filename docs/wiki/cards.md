# Cards

## Overview
Flexible card components with built-in headers, toolbars, and scrollable bodies.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/cards).

## HTML Example

```html
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm btn-light">
                Action
            </button>
        </div>
    </div>
    <div class="card-body">
        Content...
    </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Cards` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"card shadow-sm\">
    <div class=\"card-header\">
        <h3 class=\"card-title\">Title</h3>
        <div class=\"card-toolbar\">
            <button type=\"button\" class=\"btn btn-sm btn-light\">
                Action
            </button>
        </div>
    </div>
    <div class=\"card-body\">
        Content...
    </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Cards`:
`card, card-header, card-title, card-toolbar, card-body`
