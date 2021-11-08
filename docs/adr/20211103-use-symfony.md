# Use Symfony

## Context and Problem Statement

To bootstrap project and interate faster we need Framework.

## Decision Drivers

- We want DI container
- Framework should allow us to write Clean Code
- Kate from HR want to hire new people quickly

## Considered Options

- Making Own Framework
- CakePHP
- Symfony

## Decision Outcome

Chosen option: "Symfony", because has great community behind them and is "tested in the field".

### Positive Consequences

- Lots of bundles
- Enforces clean code

### Negative Consequences

- none ;)

## Pros and Cons of the Options <!-- optional -->

### Making Own Framework

- Good, because we can learn how framework internally works
- Bad, because we do not want to support framework
- Bad, well... this is awful idea

### CakePHP

- Good, because Patrick is really proficient in it
- Bad, because of an idea to mix Data Mapper and Active Record
- Bad, because of Components which are packages of logic that are shared between controllers. That is what Services should do!

### Symfony

- Good, because it has good and up to date documentation
- Good, because has really easy DI out of the box
- Bad, because... well, Patrick use Symfony only for "after hours project"

### Framework Agnostic

- Good, because we can easily decouple from Framework
- well..., but we can use Framework and stay Framework Agnostic 
