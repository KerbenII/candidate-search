# use-value-objects-with-input-validation

## Context and Problem Statement

Validation. Where should we validate data provided by users?
In Controller? In Command? In Service?
Should we allow bugous ValueObject to be constructed?

## Decision Drivers

- Business do not want our app to crash
- Development team want to use fail-fast approach
- We want to know why something went wrong

## Considered Options

- In Form Validation
- Value Object
- Command

## Decision Outcome

Chosen option: "We want to validate input while constructing ValueObjects".
Although many people say that ValueObject should be anemic, Martin Fowler says it's often a good idea to replace common primitives,
such as strings, with appropriate value objects. While I can represent a telephone number as a string,
turning into a telephone number object makes variables and parameters more explicit
(with type checking when the language supports it), a *natural focus for validation*,
and avoiding inapplicable behaviors (such as doing arithmetic on integer id numbers).

A Value Object must check for the consistency of its values when they are injected into the constructor.
If one of the values is invalid, a meaningful exception must be thrown.

In the future we may have add additional validators (e.g. specific for rest and web platforms), but right now
we want to iterate quick.
