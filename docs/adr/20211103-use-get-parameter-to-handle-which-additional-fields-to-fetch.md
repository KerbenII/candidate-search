# Use get parameter to handle which additional fields to fetch

- Status: superseded by [20211103-use-post-to-search](20211103-use-post-to-search.md)


## Context and Problem Statement

We want to return by default email, first name and last name.
Our users should have some way to fetch additional fields too.

## Decision Drivers

- Easy extendable
- Users can query only whitelisted fields
- Users should be able to fetch tags, or notes or both tags and notes


## Considered Options

- Get Parameter
- Post Parameter
- GraphQL

## Decision Outcome

Chosen option: "Get Parameter", because want to KISS (and maintaining the graphql server is an overkill here).
We are also querying for data, so as [RFC-2616 states, we should use GET](https://datatracker.ietf.org/doc/html/rfc2616#section-9.3).

### Negative Consequences

- in the future, if our search and filtering logic complicate, we may need to rewrite this to graphql.

## Pros and Cons of the Options <!-- optional -->

### Get Parameter

withAdditional[]=tags or
withAdditional[]=tags&withAdditional[]=notes

- Good, because it is simple and easy achievable
- Good, because we are only adding additional fields which we want to select.
- Good, because it is used for GETting something
- Bad, because it may stay in browser history

### Post Parameter

json body, or post field (array)

- Good, because it is simple and easy achievable
- Good, because we are only adding additional fields which we want to select.
- Good, because it may stay in browser history
- Bad, because we use POST to get :(

### GraphQL

We can just write GraphQL and fetch whatever we want.

- Good, because we can deploy GraphQL, write docs for frontend team and they are in charge of it
- Good, because it is easy extendable
- Bad, because... are we really need GraphQL to that?
- Bad, because we need to implement access control and maintain it
- Bad, because bad actor can also write query and leak our data [Plus GSM case study](https://niebezpiecznik.pl/post/fatalna-wpadka-plusa-kazdy-mogl-pobrac-dane-klientow/)
