<?php

namespace KK\CustomApi\Model;

use KK\CustomApi\Api\DataInterface;
use KK\Form\Model\DataFactory;
use KK\CustomApi\Api\Data\MyApiResponseInterfaceFactory;
use Magento\Framework\Webapi\Rest\Request;

class Data implements DataInterface
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
    public function saveData()
    {
        $response = $this->responseFactory->create();

        $bodyParams = $this->request->getBodyParams();

        if (!empty($bodyParams['data'])) {
            foreach ($bodyParams['data'] as $item) {
                $customModel = $this->customModelFactory->create();
                $customModel->setData($item)->save();
            }

            // $response->setMessage('Data added');
            // $response->setSuccess(true);

            return "data add successfully";
        } else {

            // $response->setMessage("Data not added");
            // $response->setSuccess(false);
            return "data not add successfully";
        }
    }

    
}
