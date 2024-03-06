<?php

namespace KK\CustomApi\Model;

use KK\CustomApi\Api\DeleteDataInterface;
use KK\Form\Model\DataFactory;
use KK\CustomApi\Api\Data\MyApiResponseInterfaceFactory;
use Magento\Framework\Webapi\Rest\Request;

class DeleteData implements DeleteDataInterface
{
    protected $customModelFactory;

    protected $request;

    protected $responseFactory;

    protected $data;

    public function __construct(
        MyApiResponseInterfaceFactory $responseFactory,
        DataFactory $customModelFactory,
        Request $request
    ) {
        $this->customModelFactory = $customModelFactory;
        $this->responseFactory = $responseFactory;
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteDataById($id)
    {
        $response = $this->responseFactory->create();

        try {
            $customModel = $this->customModelFactory->create();
            $customModel->load($id);

            if ($customModel->getId()) {
                $customModel->getResource()->delete($customModel);
                return "Data with ID $id deleted successfully";
            } else {
                return "Data with ID $id not found";
            }
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
