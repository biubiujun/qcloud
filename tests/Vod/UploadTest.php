<?php

namespace BiuBiuJun\Tests\Vod;

use BiuBiuJun\QCloud\Vod\Requests\ConfirmEventsRequest;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\MediaProcessTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\TranscodeTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\ProcessMediaRequest;
use BiuBiuJun\QCloud\Vod\Requests\PullEventsRequest;
use BiuBiuJun\QCloud\Vod\Requests\PullUploadRequest;
use BiuBiuJun\Tests\TestCase;

class UploadTest extends TestCase
{
    public function testPullUpload()
    {
        $fileUrl = 'http://online-recording-1259648581.file.myqcloud.com/1400235705/0983g8lqrr7q4el8eenb/790fc2910934cb362122ce5e1534a7dd.mp4';

        $request = new PullUploadRequest($fileUrl);
        $response = $this->getVodClient()->sendRequest($request);

//        var_dump($response);
        $this->assertTrue($response->isSuccessful());
    }

    public function testPullEvents()
    {
        $request = new PullEventsRequest();
        $response = $this->getVodClient()->sendRequest($request, [
            'timeout' => 10,
        ]);

//        var_dump($response->getContent());
        $this->assertTrue($response->isSuccessful());
    }

    public function testConfirmEvents()
    {
        $request = new ConfirmEventsRequest([
            '8077366951669081316',
        ]);
        $response = $this->getVodClient()->sendRequest($request);

//        var_dump($response->getContent());
//        exit;
        $this->assertTrue($response->isSuccessful());
    }

    public function testProcessMedia()
    {
        $request = new ProcessMediaRequest(5285890797839092257);

        $transcodeTaskSet = new TranscodeTaskInput(230);
        $mediaProcessTask = new MediaProcessTaskInput();
        $mediaProcessTask->setTranscodeTaskSet([$transcodeTaskSet]);

        $request->setMediaProcessTask($mediaProcessTask);

        $response = $this->getVodClient()->sendRequest($request);

        print_r($response);
    }
}
