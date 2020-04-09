# DEPRECATION NOTICE: this package has been moved and improved at [grizz-it/validator](https://github.com/grizz-it/validator)

[![Build Status](https://travis-ci.com/ulrack/validator.svg?branch=master)](https://travis-ci.com/ulrack/validator)

# Ulrack Validator

This package contains an interface and a handful of validators. These validators
will validate a predetermined type of data against a single (or set of) rule(s).
If the type does not match it will always return true.

## Installation

To install the package run the following command:

```
composer require ulrack/validator
```

## Usage

The validators are sorted by their type they will validate against.

### Chain

Chain validators are validators which verify the outcome of multiple nested
validators against data and contain their own logic.

- [AndValidator](src/Component/Chain/AndValidator.php)
- [OrValidator](src/Component/Chain/OrValidator.php)
- [OneOfValidator](src/Component/Chain/OneOfValidator.php)

### Iterable

Iterable validators work with numeric arrays.

- [ContainsValidator](src/Component/Iterable/ContainsValidator.php)
- [ItemsValidator](src/Component/Iterable/ItemsValidator.php)
- [MaxItemsValidator](src/Component/Iterable/MaxItemsValidator.php)
- [MinItemsValidator](src/Component/Iterable/MinItemsValidator.php)
- [UniqueItemsValidator](src/Component/Iterable/UniqueItemsValidator.php)

### Logical

Logical validators are type independent logical validators.

- [AlwaysValidator](src/Component/Logical/AlwaysValidator.php)
- [ConstValidator](src/Component/Logical/ConstValidator.php)
- [EnumValidator](src/Component/Logical/EnumValidator.php)
- [IfThenElseValidator](src/Component/Logical/IfThenElseValidator.php)
- [NotValidator](src/Component/Logical/NotValidator.php)

### Numeric

Numeric validators work with numbers.

- [ExclusiveMaximumValidator](src/Component/Numeric/ExclusiveMaximumValidator.php)
- [ExclusiveMinimumValidator](src/Component/Numeric/ExclusiveMinimumValidator.php)
- [MaximumValidator](src/Component/Numeric/MaximumValidator.php)
- [MinimumValidator](src/Component/Numeric/MinimumValidator.php)
- [MultipleOfValidator](src/Component/Numeric/MultipleOfValidator.php)

### Object

Object validators verify the contents of objects.

- [DependencyValidator](src/Component/Object/DependencyValidator.php)
- [MaxPropertiesValidator](src/Component/Object/MaxPropertiesValidator.php)
- [MinPropertiesValidator](src/Component/Object/MinPropertiesValidator.php)
- [PropertiesValidator](src/Component/Object/PropertiesValidator.php)
- [RequiredValidator](src/Component/Object/RequiredValidator.php)

### Textual

Textual validators work with strings.

- [MaxLengthValidator](src/Component/Textual/MaxLengthValidator.php)
- [MinLengthValidator](src/Component/Textual/MinLengthValidator.php)
- [PatternValidator](src/Component/Textual/PatternValidator.php)

### Type

Type validators verify the type of the data. For example: whether the supplied
data is of the type string, or integer.

- [ArrayValidator](src/Component/Type/ArrayValidator.php)
- [BooleanValidator](src/Component/Type/BooleanValidator.php)
- [IntegerValidator](src/Component/Type/IntegerValidator.php)
- [NullValidator](src/Component/Type/NullValidator.php)
- [NumberValidator](src/Component/Type/NumberValidator.php)
- [ObjectValidator](src/Component/Type/ObjectValidator.php)
- [StringValidator](src/Component/Type/StringValidator.php)

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## MIT License

Copyright (c) 2019 GrizzIT

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
