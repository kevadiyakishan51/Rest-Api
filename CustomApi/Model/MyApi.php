<?php

namespace KK\CustomApi\Model;

use KK\CustomApi\Api\CustomInterface;
use KK\CustomApi\Api\Data\MyApiResponseInterfaceFactory;

class MyApi implements CustomInterface
{
    /**
     * @var \KK\Form\Model\ResourceModel\Data
     */
    private $tableResource;
 
    protected $responseFactory;
    /**
     * MyApi constructor.
     *
     * @param \KK\Form\Model\ResourceModel\Data $tableResource
     */
    public function __construct(
        \KK\Form\Model\ResourceModel\Data $tableResource,
        MyApiResponseInterfaceFactory $responseFactory,
    ) {
        $this->tableResource = $tableResource;
        $this->responseFactory = $responseFactory;
    }

    /**
     * {@inheritdoc}
     */
    // public function getMessage()
    // {
    //     return "Task Done! KK's Api Run Successfully ✔️";
    // }

    /**
     * {@inheritdoc}
     */
    public function getCustomTableData()
    {
        return $this->tableResource->getCustomTableData();
    }



    /**
     * {@inheritdoc}
     */
    public function getDataById($id)
    {
        $response = $this->responseFactory->create();
        $data = $this->tableResource->getDataById($id);


        $response->setId($data['id']);
        $response->setName($data['name']);
        $response->setGender($data['gender']);
        $response->setEmail($data['email']);
        $response->setStatus($data['status']);
        $response->setFeedback($data['feedback']);


        return $response;
    }




}
