<?php
/**
 * Ziereis Relaunch
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwGlossary
 * @subpackage Tollwerk\TwGlossary\Domain\Repository
 * @author     Jolanta Dworczyk <jolanta@tollwerk.de>
 * @copyright  Copyright © 2019 Jolanta Dworczyk <jolanta@tollwerk.de>
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/***********************************************************************************
 *  GNU GENERAL PUBLIC LICENSE (GPLv2, Version 2, June 1991)
 *
 *  Copyright © 2019 Jolanta Dworczyk <jolanta@tollwerk.de>
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 ***********************************************************************************/

namespace Tollwerk\TwGlossary\Domain\Repository;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Entrygroup Repository
 *
 * @package    Tollwerk\TwGlossary
 * @subpackage Tollwerk\TwGlossary\Domain\Repository
 */
class EntrygroupRepository extends Repository
{

    /**
     * Find Entries by first character
     *
     * @return array
     * @throws InvalidQueryException
     */
    public function findAllEntrygroups(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
                                      ->getQueryBuilderForTable('tx_twglossary_domain_model_entrygroup');

        $queryBuilder->getRestrictions()->removeAll();

        /** @var Context $context */
        $context = GeneralUtility::makeInstance(Context::class);
        $sysLanguageUid = $context->getPropertyFromAspect('language', 'id');

        /** @var QueryBuilder */
        $query = $queryBuilder
            ->select('tx_twglossary_domain_model_entrygroup.uid', 'tx_twglossary_domain_model_entrygroup.character')
            ->addSelectLiteral('COUNT(entry.uid) AS `countEntries`')
            ->from('tx_twglossary_domain_model_entrygroup')
            ->leftJoin(
                'tx_twglossary_domain_model_entrygroup',
                'tx_twglossary_domain_model_entry',
                'entry',
                $queryBuilder->expr()->andX(
                    $queryBuilder->expr()->eq('tx_twglossary_domain_model_entrygroup.uid',
                    $queryBuilder->quoteIdentifier('entry.first_character')),
                    $queryBuilder->expr()->eq('entry.deleted', 0),
                    $queryBuilder->expr()->eq('entry.hidden', 0),
                    $queryBuilder->expr()->eq('entry.sys_language_uid', $sysLanguageUid)
                )
            )
            ->where('tx_twglossary_domain_model_entrygroup.deleted = 0')
            ->orderBy('tx_twglossary_domain_model_entrygroup.sorting', 'ASC')
            ->addOrderBy('tx_twglossary_domain_model_entrygroup.character', 'ASC')
            ->andWhere('tx_twglossary_domain_model_entrygroup.hidden = 0')
            ->groupBy('tx_twglossary_domain_model_entrygroup.uid');

        return $query->execute()->fetchAll();
    }

}
