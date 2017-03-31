<?php
namespace Design_Patterns\Adapter;

/**
 * @package Design_Patterns\Adapter
 */
interface ThirdPartyInterface
{
    public function processThirdParty($text);
}

class ThirdPartyService implements ThirdPartyInterface
{
    protected $service;

    public function processThirdParty($text)
    {
        $this->service = new ThirdParty();
        return $this->service->processData($text);
    }
}

class ThirdParty
{
    protected $data;

    public function processData($data)
    {
        $this->data = $data;
        return ucwords($this->data);
    }
}

$obj = new ThirdPartyService();
echo $obj->processThirdParty('dummy text to process');