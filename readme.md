# Kirby decimal field

Decimal form field for kirby.

## Installation

`git submodule add https://github.com/iksi/KirbyDecimalField.git site/fields/decimal`  
Or place a `decimal` folder in `/site/fields` with the repository’s contents.

## Usage

You can define the decimal field in your blueprint as follows:

```YAML
price:
  label: Price
  type: decimal
  places: 2
  icon: euro
```