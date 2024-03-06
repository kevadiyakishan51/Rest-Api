<?php

namespace KK\Form\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		$displayText = $observer->getData('kk_text');
		echo $displayText->getText() . " - Event </br>";
		$displayText->setText("Execute event successfully. KK's hear !!!!");

		return $this;
	}
}
