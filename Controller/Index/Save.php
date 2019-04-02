<?php

namespace Biren\Crudimage\Controller\Index;

use Magento\Framework\App\Action\Context;
use Biren\Crudimage\Model\CrudimageFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Save extends \Magento\Framework\App\Action\Action
{
	/**
     * @var Crudimage
     */
    protected $_crudimage;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    public function __construct(
		Context $context,
        CrudimageFactory $crudimage,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    ) {
        $this->_crudimage = $crudimage;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }
	public function execute()
    {
        $data = $this->getRequest()->getParams();
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            try{
                $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'image']);
                $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->adapterFactory->create();
                $uploaderFactory->addValidateCallback('custom_image_upload',$imageAdapter,'validateUploadFile');
                $uploaderFactory->setAllowRenameFiles(true);
                $uploaderFactory->setFilesDispersion(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $destinationPath = $mediaDirectory->getAbsolutePath('biren/crudimage');
                $result = $uploaderFactory->save($destinationPath);
                if (!$result) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                
                $imagePath = 'biren/crudimage'.$result['file'];
                $data['image'] = $imagePath;
            } catch (\Exception $e) {
            }
        }
    	$crudimage = $this->_crudimage->create();
        $crudimage->setData($data);
        if($crudimage->save()){
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('crudimage');
        return $resultRedirect;
    }
}
