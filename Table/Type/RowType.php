<?php
/*
 * This file is part of the Swoopaholic Component package.
 *
 * (c) Danny Dörfel <danny@swoopaholic.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Swoopaholic\Component\Table\Type;

use Swoopaholic\Component\Table\TableInterface;
use Swoopaholic\Component\Table\TableView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RowType extends BaseType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array('state' => 'active'));
        $resolver->setAllowedValues(array('state' => array('active', 'success', 'warning', 'danger')));
    }

    public function buildView(TableView $view, TableInterface $table, array $options)
    {
        parent::buildView($view, $table, $options);

        $view->vars['attr'] = array();

        if ($options['state']) {
            $view->vars['attr']['class'] = $options['state'];
        }
    }


    public function getName()
    {
        return 'row';
    }
}
