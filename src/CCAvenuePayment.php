<?php 

namespace Samdoit\CCAvenue;

use Samdoit\CCAvenue\Utils;

/**
 * CCAvenue Laravel Wrapper Class
 *
 * This class is used to interface with Laravel and CCAvenue
 *
 * @package    Samdoit\CCAvenue
 * @subpackage API
 * @author     Samdoit Infotech <info@samdoit.com>
 */
class CCAvenuePayment
{
    private $working_key;
    private $merchant_id;
    private $access_code;
    private $amount;
    private $order_id;
    private $url;
    private $billing_name;
    private $billing_address;
    private $billing_country;
    private $billing_state;
    private $billing_city;
    private $billing_zip;
    private $billing_tel;
    private $billing_email;
    private $delivery_name;
    private $delivery_address;
    private $delivery_country;
    private $delivery_state;
    private $delivery_city;
    private $delivery_zip;
    private $delivery_tel;
    private $billing_notes;

    public function __construct( )
    {
        $this->merchant_id = config('ccavenue.merchant_id');
        $this->working_key = config('ccavenue.working_key');
        $this->access_code = config('ccavenue.access_code');
    }

    public function getWorkingKey()
    {
        return $this->working_key;
    }

    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    public function getAccessCode()
    {
        return $this->access_code;
    }

    public function setAmount( $amount )
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setOrderId( $order_id )
    {
        $this->order_id = $order_id;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setRedirectUrl( $url )
    {
        $this->url = $url;
    }

    public function getRedirectUrl()
    {
        return $this->url;
    }

    public function setBillingName( $billing_name )
    {
        $this->billing_name = $billing_name;
    }

    public function getBillingName()
    {
        return $this->billing_name;
    }

    public function setBillingAddress( $billing_address )
    {
        $this->billing_address = $billing_address;
    }

    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    public function setBillingCountry( $billing_country )
    {
        $this->billing_country = $billing_country;
    }

    public function getBillingCountry()
    {
        return $this->billing_country;
    }

    public function setBillingState( $billing_state )
    {
        $this->billing_state = $billing_state;
    }

    public function getBillingState()
    {
        return $this->billing_state;
    }

    public function setBillingCity( $billing_city )
    {
        $this->billing_city = $billing_city;
    }

    public function getBillingCity()
    {
        return $this->billing_city;
    }

    public function setBillingZip( $billing_zip )
    {
        $this->billing_zip = $billing_zip;
    }

    public function getBillingZip()
    {
        return $this->billing_zip;
    }

    public function setBillingTel( $billing_tel )
    {
        $this->billing_tel = $billing_tel;
    }

    public function getBillingTel()
    {
        return $this->billing_tel;
    }

    public function setBillingEmail( $billing_email )
    {
        $this->billing_email = $billing_email;
    }

    public function getBillingEmail()
    {
        return $this->billing_email;
    }

    public function setDeliveryName( $delivery_name )
    {
        $this->delivery_name = $delivery_name;
    }

    public function getDeliveryName()
    {
        return $this->delivery_name;
    }

    public function setDeliveryAddress( $delivery_address )
    {
        $this->delivery_address = $delivery_address;
    }

    public function getDeliveryAddress()
    {
        return $this->delivery_address;
    }

    public function setDeliveryCountry( $delivery_country )
    {
        $this->delivery_country = $delivery_country;
    }

    public function getDeliveryCountry()
    {
        return $this->delivery_country;
    }

    public function setDeliveryState( $delivery_state )
    {
        $this->delivery_state = $delivery_state;
    }

    public function getDeliveryState()
    {
        return $this->delivery_state;
    }

    public function setDeliveryCity( $delivery_city )
    {
        $this->delivery_city = $delivery_city;
    }

    public function getDeliveryCity()
    {
        return $this->delivery_city;
    }

    public function setDeliveryZip( $delivery_zip )
    {
        $this->delivery_zip = $delivery_zip;
    }

    public function getDeliveryZip()
    {
        return $this->delivery_zip;
    }

    public function setDeliveryTel( $delivery_tel )
    {
        $this->delivery_tel = $delivery_tel;
    }

    public function getDeliveryTel()
    {
        return $this->delivery_tel;
    }

    public function setBillingNotes( $billing_notes )
    {
        $this->billing_notes = $billing_notes;
    }

    public function getBillingNotes()
    {
        return $this->billing_notes;
    }

    public function billingSameAsShipping()
    {
        $this->delivery_name = $this->billing_name;
        $this->delivery_address = $this->billing_address;
        $this->delivery_country = $this->billing_country;
        $this->delivery_state = $this->billing_state;
        $this->delivery_city = $this->billing_city;
        $this->delivery_zip = $this->billing_zip;
        $this->delivery_tel = $this->billing_tel;
    }

    private function getMerchantData( )
    {
        $merchant_data= 'merchant_id='.urlencode($this->getMerchantId());
        $merchant_data .= '&amount='.urlencode($this->getAmount());
        $merchant_data .= '&order_id='.urlencode($this->getOrderId());
        $merchant_data .= '&redirect_url='.urlencode($this->getRedirectUrl());
        $merchant_data .= '&billing_cust_name='.urlencode($this->getBillingName());
        $merchant_data .= '&billing_cust_address='.urlencode($this->getBillingAddress());
        $merchant_data .= '&billing_cust_country='.urlencode($this->getBillingCountry());
        $merchant_data .= '&billing_cust_state='.urlencode($this->getBillingState());
        $merchant_data .= '&billing_cust_city='.urlencode($this->getBillingCity());
        $merchant_data .= '&billing_zip_code='.urlencode($this->getBillingZip());
        $merchant_data .= '&billing_cust_tel='.urlencode($this->getBillingTel());
        $merchant_data .= '&billing_cust_email='.urlencode($this->getBillingEmail());
        $merchant_data .= '&delivery_cust_name='.urlencode($this->getDeliveryName());
        $merchant_data .= '&delivery_cust_address='.urlencode($this->getDeliveryAddress());
        $merchant_data .= '&delivery_cust_country='.urlencode($this->getDeliveryCountry());
        $merchant_data .= '&delivery_cust_state='.urlencode($this->getDeliveryState());
        $merchant_data .= '&delivery_cust_city='.urlencode($this->getDeliveryCity());
        $merchant_data .= '&delivery_zip_code='.urlencode($this->getDeliveryZip());
        $merchant_data .= '&delivery_cust_tel='.urlencode($this->getDeliveryTel());
        $merchant_data .= '&billing_cust_notes='.urlencode($this->getBillingNotes());

        return $merchant_data;
    }

    public function getEncryptedData()
    {
        $utils = new Utils($this);
        $merchant_data = $this->getMerchantData();
        return $utils->encrypt($merchant_data, $this->getWorkingKey());
    }

    public function response($response)
    {
        $utils = new Utils($this);
        $resonse_data = $utils->decrypt($response, $this->getWorkingKey());

        $orderStatus = "";
        $decryptValues = explode('&', $response_data);
        $dataSize = sizeof($decryptValues);
    
        for($i = 0; $i < $dataSize; $i++)  {
            $information = explode('=', $decryptValues[$i]);
            if ($i==3) {
                $order_status = $information[1];
            }
        }
        $return['dataSize'] = $dataSize;
        $return['decryptValues'] = $decryptValues;
        if($orderStatus === "Success") {
            $return['status'] = "success";
        } else if($orderStatus === "Aborted") {
            $return['status'] = "pending";
        } else if($orderStatus === "Failure") {
            $return['status'] = "declined";
        } else {
            $return['status'] = "error";
        }
        return $return;
    } 
}