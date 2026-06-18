<?php

namespace Backend\Modules\CoreAdministration\Patients\Services;

use Backend\Modules\CoreAdministration\Patients\Repositories\PatientRepository;

class PatientService
{
    public function __construct(
        protected PatientRepository $repository
    ) {}

    public function getPatients()
    {
        return $this->repository->getAll();
    }

    public function store(array $data)
    {
        return $this->repository->create($data);
    }
}