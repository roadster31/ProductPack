<?php
/*************************************************************************************/
/*                                                                                   */
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*************************************************************************************/

namespace ProductPack;

use Propel\Runtime\Connection\ConnectionInterface;
use Thelia\Install\Database;
use Thelia\Module\BaseModule;

class ProductPack extends BaseModule
{
    /** @var string */
    const DOMAIN_NAME = 'productpack';

    public function postActivation(ConnectionInterface $con = null)
    {
        $database = new Database($con);

        $database->insertSql(null, [ __DIR__ . '/Config/thelia.sql' ]);
    }
}
