<?php

namespace KK\Form\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

  public function execute()
  {
    $textDisplay = new \Magento\Framework\DataObject(array('text' => "Kishan's"));
    $this->_eventManager->dispatch('kk_form_display_text', ['kk_text' => $textDisplay]);
    echo $textDisplay->getText();
    exit;
  }
}
