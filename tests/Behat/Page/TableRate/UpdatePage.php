<?php

declare(strict_types=1);

namespace Tests\Webgriffe\SyliusTableRateShippingPlugin\Behat\Page\TableRate;

use Sylius\Behat\Page\Admin\Crud\UpdatePage as BaseUpdatePage;

final class UpdatePage extends BaseUpdatePage implements UpdatePageInterface
{
    protected function getDefinedElements()
    {
        return array_merge(
            parent::getDefinedElements(),
            CreatePage::getCreateUpdatePageDefinedElements()
        );
    }

    public function addRate(int $rate, int $weightLimit)
    {
        $weightLimitToRateField = $this->getDocument()->findById(
            'webgriffe_sylius_table_rate_plugin_shipping_table_rate_weightLimitToRate'
        );
        $addRateButton = $weightLimitToRateField->findLink('Add');
        $addRateButton->click();
        $item = $weightLimitToRateField->find('css', '[data-form-collection=item]:last-child');
        $item->fillField('Weight limit', $weightLimit);
        $item->fillField('Rate', $rate / 100);
    }
}
