<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="QCResource",
 *     description="QC resource",
 *     @OA\Xml(
 *         name="QCResource"
 *     )
 * )
 */
class QCResouce
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\QC[]
     */
    private $data;
}
