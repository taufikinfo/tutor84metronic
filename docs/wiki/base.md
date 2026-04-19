# Base

## Overview
Core fundamental initialization classes and configuration.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/base).

## HTML Example

```html
<!-- Base body structure -->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">

</body>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Base` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<!-- Base body structure -->
<body id=\"kt_body\" class=\"header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed\">

</body>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Base`:
`kt_body, header-fixed, aside-enabled`
