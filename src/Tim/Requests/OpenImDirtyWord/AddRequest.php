<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class AddRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord
 */
class AddRequest extends BaseRequest
{
    /**
     * AddRequest constructor.
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
        return 'v4/openim_dirty_words/add';
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
