<?php

namespace Jisuz\Feedback\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Feedback extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'training_feedback_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('training_feedback', 'feedback_id');
        $this->_useIsObjectNew = true;
    }

    /**
     * @return string
     */
    public function getActiveFeedbackNumber(): string
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
            ->from('training_feedback', new \Zend_Db_Expr('COUNT(*)'))
            ->where('is_active = ?', \Jisuz\Feedback\Model\Feedback::STATUS_ACTIVE);

        return $adapter->fetchOne($select);
    }

    /**
     * @return string
     */
    public function getAllFeedbackNumber(): string
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
            ->from('training_feedback', new \Zend_Db_Expr('COUNT(*)'));

        return $adapter->fetchOne($select);
    }
}
