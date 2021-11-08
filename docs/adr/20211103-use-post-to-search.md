# Use post to search

## Context and Problem Statement

Microsoft Internet Explorer has a maximum uniform resource locator (URL) length of 2,083 characters.
Internet Explorer also has a maximum path length of 2,048 characters.
This limit applies to both POST request and GET request URLs.

## Considered Options

- change request to POST

## Decision Outcome

Chosen option: "POST", because we want to overcome this limitation.

### Positive Consequences

- IE 11 < will work correctly
- We can encapsulate our search into ValueObject

### Negative Consequences

- We are using POST to get :(
