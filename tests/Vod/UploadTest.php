<?php

namespace BiuBiuJun\Tests\Vod;

use BiuBiuJun\QCloud\Vod\Requests\PullUploadRequest;
use BiuBiuJun\Tests\TestCase;

class UploadTest extends TestCase
{
    public function testPullUpload()
    {
        $fileUrl = 'http://online-recording-1259648581.file.myqcloud.com/1400235705/0983g8lqrr7q4el8eenb/790fc2910934cb362122ce5e1534a7dd.mp4';

        $request = new PullUploadRequest($fileUrl);
        $response = $this->getVodClient()->sendRequest($request);

        print_r($response);
    }
}
