<?php

namespace KK\CustomApi\Api;

interface DeleteDataInterface
{
    /**
     * Delete data by ID from custom table
     *
     * @param int $id
     * @return string
     */
    public function deleteDataById($id);
}
