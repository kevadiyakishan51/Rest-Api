<?php

namespace KK\Form\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use KK\Form\Model\DataFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Submit extends Action
{
    protected $resultPageFactory;
    protected $dataFactory;
    protected $fileUploaderFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        DataFactory $dataFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->dataFactory = $dataFactory;
        $this->fileUploaderFactory = $fileUploaderFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();
            // print_r($data);
            //     die();
                if (!empty($_FILES['uploadimag']['name'])) {
                    $uploader = $this->fileUploaderFactory->create(['fileId' => 'uploadimag']);
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $uploader->setAllowCreateFolders(true);
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(false);
                    $path = $this->_objectManager->get('Magento\Framework\App\Filesystem\DirectoryList')->getPath('media') . '/customfolder/';
                    $result = $uploader->save($path);
                    $data['uploadimag'] = 'customfolder/' . $result['file'];
                }
            if ($data) {
                $model = $this->dataFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}
