<?php

/**
 *  Observer to manipulate the layout of blocks
 */
class ProxiBlue_CatalogListFilters_Model_Observer {

    public function core_block_abstract_prepare_layout_before(Varien_Event_Observer $observer) {
        try {
            $block = $observer->getEvent()->getBlock();
            if($block instanceof Mage_Catalog_Block_Product_List) {
                if($block->getProductLimit()){
                    $toolbar = $block->getToolbarBlock();
                    $block->setToolbarBlockName($toolbar->getNameInLayout());
                    $toolbar->setData('_current_limit', $block->getProductLimit());
                }    
            }
        } catch (Exception $e) {
            mage::logException($e);
        }
        return $this;
    }

}
