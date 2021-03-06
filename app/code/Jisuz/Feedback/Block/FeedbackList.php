<?php

namespace Jisuz\Feedback\Block;

use Magento\Framework\Stdlib\DateTime\Timezone;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Jisuz\Feedback\Model\ResourceModel\Feedback\Collection;
use Jisuz\Feedback\Model\ResourceModel\Feedback\CollectionFactory;
use Jisuz\Feedback\Model\ResourceModel\Feedback;

class FeedbackList extends Template
{
    const PAGE_SIZE = 5;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var Timezone
     */
    private $timezone;

    /**
     * @var Collection
     */
    private $collection;

    /**
     * @var Feedback
     */
    private $feedbackResource;

    /**
     * FeedbackList constructor.
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param Timezone $timezone
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        Timezone $timezone,
        Feedback $feedbackResource,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->timezone = $timezone;
        $this->feedbackResource = $feedbackResource;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        if (!$this->collection) {
            $this->collection = $this->collectionFactory->create();
            $this->collection->addFieldToFilter('is_active', 1);
            $this->collection->setOrder('creation_time', 'DESC');
        }
        return $this->collection;
    }

    public function getPagerHtml()
    {
        $pagerBlock = $this->getChildBlock('feedback_list_pager');
        if ($pagerBlock instanceof \Magento\Framework\DataObject) {
            /* @var $pagerBlock \Magento\Theme\Block\Html\Pager */
            $pagerBlock
                ->setUseContainer(false)
                ->setShowPerPage(false)
                ->setShowAmounts(false)
                ->setLimit($this->getLimit())
                ->setCollection($this->getCollection());
            return $pagerBlock->toHtml();
        }
        return '';
    }

    public function getLimit()
    {
        return static::PAGE_SIZE;
    }

    public function getAddFeedbackUrl()
    {
        return $this->getUrl('training_feedback/form/index');
    }

    public function getFeedbackDate($feedback)
    {
        return $this->timezone->formatDateTime($feedback->getCreationTime());
    }

    /**
     * @return string
     */
    public function getActiveFeedbackNumber()
    {
        return $this->feedbackResource->getActiveFeedbackNumber();
    }

    /**
     * @return string
     */
    public function getAllFeedbackNumber()
    {
        return $this->feedbackResource->getAllFeedbackNumber();
    }
}
