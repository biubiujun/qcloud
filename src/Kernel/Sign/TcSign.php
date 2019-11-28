<?php

namespace BiuBiuJun\QCloud\Kernel\Sign;

class TcSign
{
    /**
     * @var string
     */
    protected $secretId;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var string
     */
    protected $service;

    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $algorithm = 'TC3-HMAC-SHA256';

    /**
     * @var string
     */
    protected $tc3Request = 'tc3_request';

    /**
     * @var string
     */
    protected $credentialScope;

    public function __construct(string $secretId, string $secretKey)
    {
        $this->secretId = $secretId;
        $this->secretKey = $secretKey;
    }

    public function sign(array $body, string $host, array $query = [], string $method = 'POST')
    {
        $this->timestamp = time();
        $this->date = date('Y-m-d', $this->timestamp);
        $this->service = explode('.', $host)[0] ?? '';
        $this->credentialScope = "{$this->date}/{$this->service}/{$this->tc3Request}";

        [$canonicalRequest, $signedHeaders] = $this->buildCanonicalRequest($body, $host, $query, $method);
        $stringToSign = $this->buildStringToSign($canonicalRequest);
        $signature = $this->buildSignString($stringToSign);

        return [
            'Authorization' => sprintf('%s Credential=%s/%s, SignedHeaders=%s, Signature=%s',
                $this->algorithm,
                $this->secretId,
                $this->credentialScope,
                $signedHeaders,
                $signature
            ),
            'Content-Type' => 'application/json; charset=utf-8',
            'Host' => $host,
            'X-TC-Timestamp' => $this->timestamp,
        ];
    }

    /**
     * @param string $stringToSign
     *
     * @return string
     */
    public function buildSignString(string $stringToSign)
    {
        $secretDate = hash_hmac('sha256', $this->date, "TC3{$this->secretKey}", true);
        $secretService = hash_hmac('sha256', $this->service, $secretDate, true);
        $secretSigning = hash_hmac('sha256', $this->tc3Request, $secretService, true);

        return hash_hmac('sha256', $stringToSign, $secretSigning);
    }

    /**
     * @param string $canonicalRequest
     *
     * @return string
     */
    public function buildStringToSign(string $canonicalRequest)
    {
        return implode("\n", [
            $this->algorithm,
            $this->timestamp,
            $this->credentialScope,
            hash('sha256', $canonicalRequest),
        ]);
    }

    /**
     * @param array  $body
     * @param string $host
     * @param array  $query
     * @param string $method
     *
     * @return array
     */
    public function buildCanonicalRequest(array $body, string $host, array $query = [], string $method = 'POST')
    {
        [$canonicalHeaders, $signedHeaders] = $this->buildHeaderString([
            'content-type' => 'application/json; charset=utf-8',
            'host' => $host,
        ]);

        return [
            implode("\n", [
                $method,
                '/',
                http_build_query($query),
                $canonicalHeaders,
                $signedHeaders,
                hash('sha256', json_encode($body)),
            ]),
            $signedHeaders,
        ];
    }

    /**
     * @param $headers
     *
     * @return array
     */
    protected function buildHeaderString($headers)
    {
        ksort($headers);
        $canonicalHeaders = '';
        $signedHeaders = [];
        foreach ($headers as $key => $value) {
            $canonicalHeaders .= "{$key}:{$value}\n";
            $signedHeaders[] = $key;
        }

        return [$canonicalHeaders, implode(';', $signedHeaders)];
    }
}
