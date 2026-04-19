# Carousel

## Overview
Refined carousel indicators and arrows.

For official references, please visit the [KeenThemes Documentation](https://preview.keenthemes.com/html/metronic/docs/?page=base/carousel).

## HTML Example

```html
<!-- Use standard BS5 carousel but apply custom indicators -->
<div class="carousel slide" data-bs-ride="carousel">
   <div class="carousel-indicators carousel-indicators-dots">
       <button type="button" data-bs-target="..." data-bs-slide-to="0" class="active"></button>
   </div>
</div>
```

## Usage in Adianti Platform

Here are standard ways to implement the `Carousel` component using Adianti Framework wrappers (`KHtml`, `KContainer`, `TElement`, etc.).

```php
// Adianti Framework / PHP Implementation
$element = new TElement("div"); // Or KHtml, KContainer
$element->add('<!-- Use standard BS5 carousel but apply custom indicators -->
<div class=\"carousel slide\" data-bs-ride=\"carousel\">
   <div class=\"carousel-indicators carousel-indicators-dots\">
       <button type=\"button\" data-bs-target=\"...\" data-bs-slide-to=\"0\" class=\"active\"></button>
   </div>
</div>');
```

## Relevant CSS Classes
Common Metronic classes associated with `Carousel`:
`carousel-custom, carousel-indicators-dots`
