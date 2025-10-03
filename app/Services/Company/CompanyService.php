<?php
namespace App\Services\Company;

use App\Exceptions\BusinessException;
use App\Models\Company;
use App\Repositories\Company\CompanyRepository;

class CompanyService
{
    public function __construct(protected CompanyRepository $companyRepository)
    {}
    
    /**
     * Get a paginated list of companies.
     *
     * @param int $page
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateCompanies(int $page, int $perPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->companyRepository->paginateCompanies($page, $perPage);
    }
    
    /**
     * Create a new company.
     *
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company
    {
        return $this->companyRepository->create($data);
    }
    
    /**
     * Get a company by ID.
     *
     * @param int $id
     * @return Company
     */
    public function getCompany(int $id): Company
    {
        return $this->companyRepository->findById($id);
    }
    
    /**
     * Update a company.
     *
     * @param array $data
     * @param int $id
     * @return Company
     */
    public function update(array $data, int $id): Company
    {
        return $this->companyRepository->update($data, $id);
    }

    public function delete(int $id)
    {
       
    }
}
