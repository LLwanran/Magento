<?php
    require getcwd() . '/app/Mage.php';

    $websiteId = Mage::app()->getWebsite()->getId();
    $store = Mage::app()->getStore();

    $customer = Mage::getModel("customer/customer");
    $customer->setWebsiteId($websiteId)
        ->setStore($store)
        ->setFirstname('yf')
        ->setLastname('li')
        ->setEmail('123456789@qq.com')
        ->setPassword('********');

    try{
        $customer->save();
    }
    catch (Exception $e) {
        Zend_Debug::dump($e->getMessage());
    }

    $address = Mage::getModel("customer/address");
    $address->setCustomerId($customer->getId())
        ->setFirstname($customer->getFirstname())
        ->setMiddleName($customer->getMiddlename())
        ->setLastname($customer->getLastname())
        ->setCountryId('CH')
        //->setRegionId('1') //state/province, only needed if the country is USA
        ->setPostcode('519000')
        ->setCity('Zhuhai')
        ->setTelephone('13588888888')
        ->setFax('6326920')
        ->setCompany('HB')
        ->setStreet('Qianshan')
        ->setIsDefaultBilling('1')
        ->setIsDefaultShipping('1')
        ->setSaveInAddressBook('1');

    try{
        $address->save();
    }
    catch (Exception $e) {
        Zend_Debug::dump($e->getMessage());
    }
