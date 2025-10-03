<?php
namespace App\Repositories\Company;

use App\Exceptions\NotFoundException;
use App\Models\Company;

class CompanyRepository
{
    /**
     * Get a paginated list of companies.
     *
     * @param int $page
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateCompanies($page, int $perPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Company::select('id', 'name', 'created_at')
            ->orderBy('name')
            ->paginate($perPage, ['*'], 'page',  $page);
    }

    /**
     * Create a new company.
     *
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company
    {
        return Company::create($data);
    }
    
    /**
     * Find a company by ID.
     *
     * @param int $id
     * @return Company
     */
    public function findById(int $id): Company
    {
        return $company = Company::find($id)
            ?? throw new NotFoundException('Empresa não encontrada');
    }
    
    /**
     * Update a company.
     *
     * @param array $data
     * @param int $id
     * @return Company
     */
    public function update(array $data, $id): Company
    {
        $company = $this->findById($id);
        $company->update($data);
        return $company;
    }
    
    /**
     * Delete a company.
     *
     * @param Company $company
     * @return bool
     */
    public function delete(int $id): bool
    {
        $company = $this->findById($id);
        return $company->delete();
    }
}
