# use Repository for sorting and pagination

## Context and Problem Statement

Our Candidate Search endpoint should sort and paginate results.
How can we achieve that?

## Considered Options

- Paginate Bundle
- Within Repository
- Service

## Decision Outcome

Chosen option: "Repository", because sorting and pagination is repository responsibility.

### Paginate Bundle

- Good, for MVC approach, but
- Bad, antipattern in hexagonal architecture

### Within Repository

- Good, because repository should query datasource and return Entities

### Service

- Good, because service is responsible for handling requests
- Bad, because service should cast that responsibility to repository
