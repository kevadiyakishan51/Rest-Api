<?php

namespace KK\CustomApi\Api;

interface CustomInterface
{
    /**
     * Get custom table data
     *
     * @return array
     */
    public function getCustomTableData();


    /**
     * Get data from custom table by ID
     *
     * @param int $id
     * @return KK\CustomApi\Api\Data\MyApiResponseInterface
     */
    public function getDataById($id);


    

}
