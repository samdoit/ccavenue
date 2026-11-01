<?php

namespace Samdoit\CCAvenue;

use InvalidArgumentException;

/**
 * CCAvenue Laravel Wrapper Class
 *
 * @package    Samdoit\CCAvenue
 * @subpackage API
 * @author     Samdoit Infotech <info@samdoit.com>
 */
class CCAvenuePayment // NOSONAR
{
    /** @var string */
    private $workingKey;

    /** @var string */
    private $merchantId;

    /** @var string */
    private $accessCode;

    /** @var string */
    private $amount = '';

    /** @var string */
    private $currency = 'INR';

    /** @var string */
    private $language = 'EN';

    /** @var string */
    private $orderId = '';

    /** @var string */
    private $url = '';

    /** @var string */
    private $cancelUrl = '';

    /** @var string */
    private $billingName = '';

    /** @var string */
    private $billingAddress = '';

    /** @var string */
    private $billingCountry = '';

    /** @var string */
    private $billingState = '';

    /** @var string */
    private $billingCity = '';

    /** @var string */
    private $billingZip = '';

    /** @var string */
    private $billingTel = '';

    /** @var string */
    private $billingEmail = '';

    /** @var string */
    private $deliveryName = '';

    /** @var string */
    private $deliveryAddress = '';

    /** @var string */
    private $deliveryCountry = '';

    /** @var string */
    private $deliveryState = '';

    /** @var string */
    private $deliveryCity = '';

    /** @var string */
    private $deliveryZip = '';

    /** @var string */
    private $deliveryTel = '';

    /** @var string */
    private $deliveryEmail = '';

    /** @var string */
    private $billingNotes = '';

    public function __construct()
    {
        $this->merchantId = (string) config('ccavenue.merchant_id');
        $this->workingKey = (string) config('ccavenue.working_key');
        $this->accessCode = (string) config('ccavenue.access_code');
    }

    public function getWorkingKey(): string
    {
        return $this->workingKey;
    }

    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    public function getAccessCode(): string
    {
        return $this->accessCode;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setRedirectUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getRedirectUrl(): string
    {
        return $this->url;
    }

    public function setCancelUrl(string $cancelUrl): void
    {
        $this->cancelUrl = $cancelUrl;
    }

    /**
     * Falls back to the redirect URL when no cancel URL is set.
     */
    public function getCancelUrl(): string
    {
        return $this->cancelUrl !== '' ? $this->cancelUrl : $this->url;
    }

    public function setBillingName(string $billingName): void
    {
        $this->billingName = $billingName;
    }

    public function getBillingName(): string
    {
        return $this->billingName;
    }

    public function setBillingAddress(string $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    public function getBillingAddress(): string
    {
        return $this->billingAddress;
    }

    public function setBillingCountry(string $billingCountry): void
    {
        $this->billingCountry = $billingCountry;
    }

    public function getBillingCountry(): string
    {
        return $this->billingCountry;
    }

    public function setBillingState(string $billingState): void
    {
        $this->billingState = $billingState;
    }

    public function getBillingState(): string
    {
        return $this->billingState;
    }

    public function setBillingCity(string $billingCity): void
    {
        $this->billingCity = $billingCity;
    }

    public function getBillingCity(): string
    {
        return $this->billingCity;
    }

    public function setBillingZip(string $billingZip): void
    {
        $this->billingZip = $billingZip;
    }

    public function getBillingZip(): string
    {
        return $this->billingZip;
    }

    public function setBillingTel(string $billingTel): void
    {
        $this->billingTel = $billingTel;
    }

    public function getBillingTel(): string
    {
        return $this->billingTel;
    }

    public function setBillingEmail(string $billingEmail): void
    {
        $this->billingEmail = $billingEmail;
    }

    public function getBillingEmail(): string
    {
        return $this->billingEmail;
    }

    public function setDeliveryName(string $deliveryName): void
    {
        $this->deliveryName = $deliveryName;
    }

    public function getDeliveryName(): string
    {
        return $this->deliveryName;
    }

    public function setDeliveryAddress(string $deliveryAddress): void
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    public function getDeliveryAddress(): string
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryCountry(string $deliveryCountry): void
    {
        $this->deliveryCountry = $deliveryCountry;
    }

    public function getDeliveryCountry(): string
    {
        return $this->deliveryCountry;
    }

    public function setDeliveryState(string $deliveryState): void
    {
        $this->deliveryState = $deliveryState;
    }

    public function getDeliveryState(): string
    {
        return $this->deliveryState;
    }

    public function setDeliveryCity(string $deliveryCity): void
    {
        $this->deliveryCity = $deliveryCity;
    }

    public function getDeliveryCity(): string
    {
        return $this->deliveryCity;
    }

    public function setDeliveryZip(string $deliveryZip): void
    {
        $this->deliveryZip = $deliveryZip;
    }

    public function getDeliveryZip(): string
    {
        return $this->deliveryZip;
    }

    public function setDeliveryTel(string $deliveryTel): void
    {
        $this->deliveryTel = $deliveryTel;
    }

    public function getDeliveryTel(): string
    {
        return $this->deliveryTel;
    }

    /**
     * CCAvenue has no delivery email field, so this value is not sent.
     */
    public function setDeliveryEmail(string $deliveryEmail): void
    {
        $this->deliveryEmail = $deliveryEmail;
    }

    public function getDeliveryEmail(): string
    {
        return $this->deliveryEmail;
    }

    /**
     * Sent to CCAvenue as merchant_param1 and returned unchanged in the response.
     */
    public function setBillingNotes(string $billingNotes): void
    {
        $this->billingNotes = $billingNotes;
    }

    public function getBillingNotes(): string
    {
        return $this->billingNotes;
    }

    public function billingSameAsShipping(): void
    {
        $this->deliveryName    = $this->billingName;
        $this->deliveryAddress = $this->billingAddress;
        $this->deliveryCountry = $this->billingCountry;
        $this->deliveryState   = $this->billingState;
        $this->deliveryCity    = $this->billingCity;
        $this->deliveryZip     = $this->billingZip;
        $this->deliveryTel     = $this->billingTel;
        $this->deliveryEmail   = $this->billingEmail;
    }

    /**
     * @throws InvalidArgumentException When a required field is missing
     */
    private function getMerchantData(): string
    {
        $required = [
            'merchant_id'  => $this->getMerchantId(),
            'order_id'     => $this->getOrderId(),
            'amount'       => $this->getAmount(),
            'currency'     => $this->getCurrency(),
            'redirect_url' => $this->getRedirectUrl(),
            'cancel_url'   => $this->getCancelUrl(),
            'language'     => $this->getLanguage(),
        ];

        $missing = array_keys(array_filter($required, function ($value) {
            return $value === '';
        }));
        if ($missing !== []) {
            throw new InvalidArgumentException('Missing required CCAvenue fields: ' . implode(', ', $missing));
        }

        $optional = array_filter([
            'billing_name'     => $this->getBillingName(),
            'billing_address'  => $this->getBillingAddress(),
            'billing_city'     => $this->getBillingCity(),
            'billing_state'    => $this->getBillingState(),
            'billing_zip'      => $this->getBillingZip(),
            'billing_country'  => $this->getBillingCountry(),
            'billing_tel'      => $this->getBillingTel(),
            'billing_email'    => $this->getBillingEmail(),
            'delivery_name'    => $this->getDeliveryName(),
            'delivery_address' => $this->getDeliveryAddress(),
            'delivery_city'    => $this->getDeliveryCity(),
            'delivery_state'   => $this->getDeliveryState(),
            'delivery_zip'     => $this->getDeliveryZip(),
            'delivery_country' => $this->getDeliveryCountry(),
            'delivery_tel'     => $this->getDeliveryTel(),
            'merchant_param1'  => $this->getBillingNotes(),
        ], function ($value) {
            return $value !== '';
        });

        return http_build_query($required + $optional);
    }

    public function getEncryptedData(): string
    {
        if ($this->getWorkingKey() === '') {
            throw new InvalidArgumentException('CCAvenue working key is not configured (CCAVENUE_WORKING_KEY).');
        }

        $utils = new Utils();
        return $utils->encrypt($this->getMerchantData(), $this->getWorkingKey());
    }

    /**
     * @return array{status: string, orderStatus: string, data: array<string, string>, dataSize: int, decryptValues: string[]}
     */
    public function response(string $encryptedResponse): array
    {
        $utils = new Utils();
        $responseData = $utils->decrypt($encryptedResponse, $this->getWorkingKey());

        $decryptValues = $responseData === '' ? [] : explode('&', $responseData);

        $data = [];
        foreach ($decryptValues as $pair) {
            $parts = explode('=', $pair, 2);
            $data[urldecode($parts[0])] = urldecode($parts[1] ?? '');
        }

        $orderStatus = $data['order_status'] ?? '';

        if ($orderStatus === 'Success') {
            $status = 'success';
        } elseif ($orderStatus === 'Aborted') {
            $status = 'pending';
        } elseif ($orderStatus === 'Failure') {
            $status = 'declined';
        } else {
            $status = 'error';
        }

        return [
            'status'        => $status,
            'orderStatus'   => $orderStatus,
            'data'          => $data,
            'dataSize'      => count($decryptValues),
            'decryptValues' => $decryptValues,
        ];
    }
}
