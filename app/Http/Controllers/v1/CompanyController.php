<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\Company\CompanyService;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Enums\Pagination;

class CompanyController extends Controller
{
    public function __construct(protected CompanyService $companyService)
    {}
    
    /**
     * Display a listing of companies.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $page = (int) $request->query('page', Pagination::PAGE->value);
        $perPage = (int) $request->query('per_page', Pagination::PER_PAGE->value);

        $companies = $this->companyService->paginateCompanies($page, $perPage);

        return response()->json([
            'success' => true,
            'message' => 'Lista de empresas',
            'data' => $companies,
        ], Response::HTTP_OK);
    }
    
    /**
     * Store a company.
     *
     * @param \App\Http\Requests\CreateCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateCompanyRequest $request): JsonResponse
    {
        $company = $this->companyService->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Empresa criada com sucesso',
            'data' => $company
        ], Response::HTTP_CREATED);
    }
    
    /**
     * Show a company.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $company = $this->companyService->getCompany($id);

        return response()->json([
            'success' => true,
            'message' => 'Empresa encontrada',
            'data' => $company
        ], Response::HTTP_OK);
    }
    
    /**
     * Update a company.
     *
     * @param \App\Http\Requests\UpdateCompanyRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCompanyRequest $request, int $id): JsonResponse
    {
        $company = $this->companyService->update($request->validated(), $id);

        return response()->json([
            'success' => true,
            'message' => 'Empresa atualizada com sucesso',
            'data' => $company
        ], Response::HTTP_OK);
    }
    
    /**
     * Delete a company.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Empresa deletada com sucesso',
        ], Response::HTTP_OK);
    }
}
