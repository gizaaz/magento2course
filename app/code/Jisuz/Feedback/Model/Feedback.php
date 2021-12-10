<?php

namespace Jisuz\Feedback\Model;

use Magento\Framework\Model\AbstractModel;
use Jisuz\Feedback\Model\ResourceModel\Feedback as ResourceModel;

class Feedback extends AbstractModel
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @var string
     */
    protected $_eventPrefix = 'training_feedback_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
