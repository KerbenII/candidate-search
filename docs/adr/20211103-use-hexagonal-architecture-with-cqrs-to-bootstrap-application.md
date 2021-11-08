# Use Hexagonal Architecture with CQRS to bootstrap application

## Context and Problem Statement


We want to use multiple datasources in our application. Our stakeholders don't exclude the possibility to create mobile app
or use another search system in the future.

## Decision Drivers

- We should be able to add a new platform (e.g. mobile app) with ease
- Stockholders may decide in the future to use external search engine (for example Algolia)

## Considered Options

- MVC
- DDD
- CQRS
- Hexagonal

## Decision Outcome

Chosen option: "CQRS and Haxagonal", because CQRS allows us to use relational datasource for writing and search engine for reading.
Hexagonal architecture allows us to easily replace different "blocks of code" which is crucial while bootstrapping project.

## Pros and Cons of the Options <!-- optional -->

### MVC

Simple Model View Controller architecture
- Good, because we do not need to think about abstraction, so can iterate faster.
- Good, because we just install framework and have it.
- Bad, because it is hard to preserve abstraction layer. For example is date formatting a task for view or model?

### DDD

Domain Driven Design

- Good, because we are software one-to-one how it operates in real world.
- Bad, because we need to determine The Ubiquitous Language and the Domain, which will probably change as we grow (as a start-up).
- [Our project contains less than 30 user stories, so is too simply to develop DDD](https://thedomaindrivendesign.io/why-use-domain-driven-design/).

### CQRS

Command and Query Responsibility Segregation

- Good, because we need to read and write from different databases.
- Good, because we can optimize data schemes.
- Good, because we can scale read and write model independently.
- Bad, because we need to create abstraction layer (more time to code).

### Hexagonal

The Hexagonal Architecture promotes the separation of concerns by encapsulating logic in different layers of the application.
This enables a higher level of isolation, testability and control over your business specific code.
Each layer of the application has a strict set of responsibilities and requirements.

- Good, because if we do it right we will be able to easily change/switch providers
- Good, because we can switch to microservices easily to scale better
- Bad, because we need to create abstraction layer (more time to code).
