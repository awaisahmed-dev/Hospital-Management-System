<?php

namespace Backend\Modules\CoreAdministration\Patients\Repositories;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class PatientRepository
{
    public function getAll()
    {
        return Patient::latest()->paginate(20);
    }

    public function find($id)
    {
        return Patient::findOrFail($id);
    }

    public function create(array $data)
    {
        return Patient::create($data);
    }

    public function update($id, array $data)
    {
        $patient = $this->find($id);

        return $patient->update($data);
    }

    public function delete($id)
    {
        return Patient::destroy($id);
    }
}