<?php
/**
 * Ziereis Relaunch
 *
 * @subpackage ${NAMESPACE}
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

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Entry Repository
 *
 * @package    Tollwerk\TwGlossary
 * @subpackage Tollwerk\TwGlossary\Domain\Repository
 */
class EntryRepository extends Repository
{
    /**
     * Find Entries by first character
     *
     * @param integer $filter First Character
     *
     * @return array|QueryResultInterface
     * @throws InvalidQueryException
     */
    public function findByFilter(int $filter): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('firstCharacter', $filter));

        return $query->execute();
    }

    /**
     * Find Entries with relation 0
     *
     * @return array|QueryResultInterface
     * @throws InvalidQueryException
     */
    public function findAllByEmptyFirstCharacter(): ?QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('firstCharacter', 0));

        return $query->execute();
    }

    /**
     * get entry by title
     *
     * @param string $title title
     *
     * @return array|\Tollwerk\TwGlossary\Domain\Model\Entry
     * @throws InvalidQueryException
     */
    public function findByTitle(string $title): ?\Tollwerk\TwGlossary\Domain\Model\Entry
    {
        $querySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);

        $query = $this->createQuery();
        $query->matching($query->equals('title', $title));

        return $query->execute()->getFirst();
    }
}
