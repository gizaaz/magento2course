<?php

namespace Jisuz\TestRouting\Controller\Page;

use Magento\Cms\Helper\Page as PageHelper;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\NoSuchEntityException;


class View extends \Magento\Cms\Controller\Page\View
{
    protected $resultJsonFactory;

    protected $pageRepository;

    public function __construct(
        Context $context,
        RequestInterface $request,
        PageHelper $pageHelper,
        ForwardFactory $forwardFactory,
        JsonFactory $resultFactory,
        PageRepositoryInterface $pageRepository
    ) {
        $this->resultJsonFactory = $resultFactory;
        $this->pageRepository = $pageRepository;

        parent::__construct($context, $request, $pageHelper, $forwardFactory);
    }

    public function execute()
    {
        if ($this->getRequest()->isAjax()) {
            $data = ['status' => 'success', 'message' => 'ajax'];
            $pageId = $this->getRequest()->getParam('page_id', $this->getRequest()->getParam('id', false));
            $resultJson = $this->resultJsonFactory->create();
            try {
                $page = $this->pageRepository->getById($pageId);
                $data['title'] = $page->getTitle();
                $data['content'] = $page->getContent();
            } catch (NoSuchEntityException $e) {
                $data['status'] = 'error';
                $data['message'] = 'Not found';
            } catch (\Exception $e) {
                $data['status'] = 'error';
                $data['message'] = 'Something wrong';
            }
            $resultJson->setData($data);
            return $resultJson;
        }

        return parent::execute();
    }
}
