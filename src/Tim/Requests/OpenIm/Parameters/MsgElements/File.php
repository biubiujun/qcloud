<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class File
 *
 * @package BiuBiuJun\QCloud\TimClient\Parameters\MsgElements
 */
class File extends MsgElement
{
    /**
     * File constructor.
     *
     * @param string $url
     * @param int    $fileSize
     * @param string $fileName
     * @param int    $downloadFlag
     */
    public function __construct(string $url, int $fileSize, string $fileName, int $downloadFlag)
    {
        $this->setMsgContent([
            'Url' => $url,
            'FileSize' => $fileSize,
            'FileName' => $fileName,
            'Download_Flag' => $downloadFlag,
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMFileElem';
    }
}
