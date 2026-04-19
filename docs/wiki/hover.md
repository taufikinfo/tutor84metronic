# Hover

## Overview
Advanced CSS hover transitions for interactions.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/hover).

## HTML Example

```html
<div class="card hover-scale">
   <div class="card-body">I will scale up on hover</div>
</div>
<div class="card hover-elevate-up">
   <div class="card-body">I will move up and cast a shadow</div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Hover` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"card hover-scale\">
   <div class=\"card-body\">I will scale up on hover</div>
</div>
<div class=\"card hover-elevate-up\">
   <div class=\"card-body\">I will move up and cast a shadow</div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Hover`:
`hover-scale, hover-elevate-up, hover-elevate-down`
