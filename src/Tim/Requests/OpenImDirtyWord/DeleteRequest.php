<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class DeleteRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\OpenImDirtyWord
 */
class DeleteRequest extends BaseRequest
{
    /**
     * DeleteRequest constructor.
     *
     * @param array $dirtyWordsList
     */
    public function __construct(array $dirtyWordsList)
    {
        $this->setDirtyWordsList($dirtyWordsList);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/openim_dirty_words/delete';
    }

    /**
     * @param array $dirtyWordsList
     *
     * @return $this
     */
    public function setDirtyWordsList(array $dirtyWordsList)
    {
        $this->setParameter('DirtyWordsList', $dirtyWordsList);

        return $this;
    }
}
