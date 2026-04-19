# Separator

## Overview
Beautiful horizontal dividers.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/separator).

## HTML Example

```html
<div class="separator separator-dashed border-primary my-10"></div>
<div class="separator separator-dotted border-dark my-10"></div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Separator` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<div class=\"separator separator-dashed border-primary my-10\"></div>
<div class=\"separator separator-dotted border-dark my-10\"></div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Separator`:
`separator, separator-dashed, separator-dotted, separator-content`
