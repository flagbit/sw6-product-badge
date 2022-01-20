<?php

declare(strict_types=1);

namespace Sschreier\ProductBadge;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;
use Shopware\Core\System\CustomField\CustomFieldTypes;

class SschreierProductBadge extends Plugin
{
    public const NUMBER_BADGES = 1;

    public function install(InstallContext $installContext): void
    {
        $customFieldSetRepository = $this->container->get('custom_field_set.repository');

        for ($i = 1; $i <= self::NUMBER_BADGES; ++$i) {
            $criteria = new Criteria();

            $criteria->addFilter(new EqualsFilter('name', 'sschreier_badges_' . $i));

            $result = $customFieldSetRepository->searchIds($criteria, $installContext->getContext());

            if (!($result->getTotal() > 0)) {
                $customFieldSetRepository->create([[
                    'name' => 'sschreier_badges_' . $i,
                    'config' => [
                        'label' => [
                            'de-DE' => 'Badge ' . $i,
                            'en-GB' => 'badge ' . $i,
                        ],
                    ],
                    'position' => $i,
                    'customFields' => [
                        [
                            'name' => 'sschreier_badges_badge' . $i . '_text',
                            'type' => CustomFieldTypes::TEXT,
                            'config' => [
                                'label' => [
                                    'de-DE' => 'Text des Badges',
                                    'en-GB' => 'text of the badge',
                                ],
                                'placeholder' => [
                                    'de-DE' => 'Text des Badges',
                                    'en-GB' => 'text of the badge',
                                ],
                                'componentName' => 'sw-field',
                                'customFieldType' => 'text',
                                'customFieldPosition' => 1,
                                'type' => 'text',
                            ],
                        ],
                        [
                            'name' => 'sschreier_badges_badge' . $i . '_backgroundcolor',
                            'type' => CustomFieldTypes::TEXT,
                            'config' => [
                                'label' => [
                                    'de-DE' => 'Hintergrundfarbe des Badges',
                                    'en-GB' => 'background color of the badge',
                                ],
                                'componentName' => 'sw-field',
                                'customFieldType' => 'colorpicker',
                                'customFieldPosition' => 2,
                                'type' => 'colorpicker',
                            ],
                        ],
                        [
                            'name' => 'sschreier_badges_badge' . $i . '_fontcolor',
                            'type' => CustomFieldTypes::TEXT,
                            'config' => [
                                'label' => [
                                    'de-DE' => 'Schriftfarbe des Badges',
                                    'en-GB' => 'font color of the badge',
                                ],
                                'componentName' => 'sw-field',
                                'customFieldType' => 'colorpicker',
                                'customFieldPosition' => 3,
                                'type' => 'colorpicker',
                            ],
                        ],
                    ],
                    'relations' => [
                        ['entityName' => 'product'],
                    ],
                ]], $installContext->getContext());
            }
        }

        parent::install($installContext);
    }

    public function postInstall(InstallContext $installContext): void
    {
        parent::postInstall($installContext);
    }

    public function update(UpdateContext $updateContext): void
    {
    }

    public function postUpdate(UpdateContext $updateContext): void
    {
    }

    public function activate(ActivateContext $activateContext): void
    {
        parent::activate($activateContext);
    }

    public function deactivate(DeactivateContext $deactivateContext): void
    {
        parent::deactivate($deactivateContext);
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        if ($uninstallContext->keepUserData()) {
            parent::uninstall($uninstallContext);

            return;
        }

        $customFieldSetRepository = $this->container->get('custom_field_set.repository');

        for ($i = 1; $i <= self::NUMBER_BADGES; ++$i) {
            $criteria = new Criteria();
            $criteria->addFilter(new EqualsFilter('name', 'sschreier_badges_' . $i));

            $result = $customFieldSetRepository->searchIds($criteria, $uninstallContext->getContext());

            if ($result->getTotal() > 0 && !$uninstallContext->keepUserData()) {
                $data = $result->getDataOfId($result->firstId());
                $customFieldSetRepository->delete([$data], $uninstallContext->getContext());
            }
        }

        parent::uninstall($uninstallContext);
    }
}
