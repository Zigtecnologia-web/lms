<?php
namespace App\Swagger;

/**
 * @OA\Get(
 *     path="/api/v1/companies",
 *     summary="Lista todas as empresas",
 *     tags={"Companies"},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de empresas",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Empresa 1"),
 *                 @OA\Property(property="created_at", type="string", format="date-time")
 *             )
 *         )
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/v1/companies",
 *     summary="Cria uma nova empresa",
 *     tags={"Companies"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name"},
 *             @OA\Property(property="name", type="string", example="Nova Empresa")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Empresa criada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=2),
 *             @OA\Property(property="name", type="string", example="Nova Empresa"),
 *             @OA\Property(property="created_at", type="string", format="date-time")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erro de validação"
 *     )
 * )
 * 
 * @OA\Put(
 *     path="/api/v1/companies/{id}",
 *     summary="Atualiza uma empresa existente",
 *     tags={"Companies"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID da empresa",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name"},
 *             @OA\Property(property="name", type="string", example="Empresa Atualizada")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Empresa atualizada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Empresa Atualizada"),
 *             @OA\Property(property="created_at", type="string", format="date-time"),
 *             @OA\Property(property="updated_at", type="string", format="date-time")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Empresa não encontrada"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erro de validação"
 *     )
 * )
 * 
 * /**
 * @OA\Delete(
 *     path="/api/v1/companies/{id}",
 *     summary="Deleta uma empresa existente",
 *     tags={"Companies"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID da empresa",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Empresa deletada com sucesso (sem conteúdo)"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Empresa não encontrada"
 *     )
 * )
 */
class Companies
{
    // apenas documentação
}
