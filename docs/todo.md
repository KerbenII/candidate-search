#Proces:
## User Story: Candidate zgłasza się do oferty
    candidate/application
        SubmitApplicationCommand
        IndexApplicationCommand
            OcrService->handle

## User Story: Endpoint for a candidate search
    searcher/search
        SearchCandidatesCommand


# Brakuje:
1. Castowanie exceptionów na JSON (ExceptionListener onKernelException w Http\EventListener)
2. ReadModelów i Repozytoriów (Mysql jako abstract zaimplementowałem)


