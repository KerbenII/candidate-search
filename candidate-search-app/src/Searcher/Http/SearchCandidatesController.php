<?php

declare(strict_types=1);

namespace App\Searcher\Http;

use App\Shared\Http\Controller\QueryController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Searcher\Application\ValueObject\SortByValueObject;
use App\Searcher\Application\ValueObject\FiltersValueObject;
use App\Searcher\Application\Query\SearchCandidatesQuery;
use App\Shared\Http\Exception\HttpBadRequestException;
use App\Searcher\Application\ValueObject\AdditionalFieldsValueObject;

final class SearchCandidatesController extends QueryController
{
    final public function search(Request $request)
    {
        if ('json' !== $request->getContentType()) {
            throw new BadRequestHttpException();
        }

        try {
            $payload = $request->toArray();
            $query = new SearchCandidatesQuery(
                $payload['query'],
                $payload['limit'],
                $payload['page'],
                SortByValueObject::fromPayload($payload['sortBy']),
                FiltersValueObject::fromPayload($payload['filters'] ?? []),
                AdditionalFieldsValueObject::fromPayload($payload['additionalFields'] ?? [])
            );
        } catch (\InvalidArgumentException $e) {
            throw new HttpBadRequestException($e);
        }

        $this->ask($query);

        return $this->json(null);
    }
}
