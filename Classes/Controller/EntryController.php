<?php

/**
 * Ziereis Relaunch
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwGlossary
 * @subpackage Tollwerk\TwGlossary\Controller
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

namespace Tollwerk\TwGlossary\Controller;

use Tollwerk\TwGlossary\Domain\Model\EntryInterface;
use Tollwerk\TwGlossary\Domain\Repository\EntrygroupRepository;
use Tollwerk\TwGlossary\Domain\Repository\EntryRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

/**
 * EntryController
 */
class EntryController extends ActionController
{
    /**
     * Entry repository
     *
     * @var EntryRepository
     */
    protected $entryRepository;

    /**
     * Entrygroup repository
     *
     * @var EntrygroupRepository
     */
    protected $entrygroupRepository;

    /**
     * Inject the entry repository
     *
     * @param entryRepository $entryRepository
     */
    public function injectEntryRepository(EntryRepository $entryRepository): void
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * Inject the entrygroup repository
     *
     * @param entryroupRepository $entrygroupRepository
     */
    public function injectEntrygroupRepository(EntrygroupRepository $entrygroupRepository): void
    {
        $this->entrygroupRepository = $entrygroupRepository;
    }

    /**
     * action list
     *
     * @param string $filter
     * @param Tollwerk\TwGlossary\Domain\Model\Entry $entry
     *
     * @return void
     * @throws InvalidQueryException
     */
    public function listAction(string $filter = null, $entry = null): void
    {
        $entrygroups         = $this->entrygroupRepository->findAllEntrygroups();
        $emptyFirstCharacter = $this->entryRepository->findAllByEmptyFirstCharacter();
        $entries             = [];
        $sortedByEntrygroup  = [];

        // Get entries by group or as a simple list
        if (!$this->settings['enableGrouping']) {
            /** @var TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $entries */
            $entries = $this->entryRepository->findAll();
        } else {

            if (!empty($this->settings['showFirstGroup']) && !$filter && count($entrygroups)) {
                $filter = $entrygroups[0]['uid'];
            }

            if ($filter !== null) {
                $entries = $this->entryRepository->findByFilter($filter);
            } else {
                foreach ($entrygroups as $entrygroup) {
                    $sortedByEntrygroup[$entrygroup['character']] = $this->entryRepository->findByFilter($entrygroup['uid']);
                }
            }
        }

        // Show first entry?
        if (!$entry) {
            if (isset($this->settings['showFirstEntry'])) {
                if (count($entries)) {
                    $entries->rewind();
                    $entry = $entries->getFirst();
                } elseif (count($sortedByEntrygroup)) {
                    foreach ($sortedByEntrygroup as $group => $groupEntries) {
                        if (count($groupEntries)) {
                            $entry = $groupEntries[0];
                            break;
                        }
                    }
                }
            }
        }


        $this->view->assign('entries', $entries);
        $this->view->assign('sortedByEntrygroup', $sortedByEntrygroup);
        $this->view->assign('entrygroups', $entrygroups);
        $this->view->assign('entriesEmptyFirstCharacter', $emptyFirstCharacter);
        $this->view->assign('filter', $filter);
        $this->view->assign('entry', $entry);
    }

    /**
     * Show a single glossary entry
     *
     * @param \Tollwerk\TwGlossary\Domain\Model\Entry $entry
     * @param string|null $filter
     */
    public function showAction(EntryInterface $entry, string $filter = null): void
    {
        $this->view->assign('entry', $entry);
        $this->view->assign('filter', $filter);
    }

    /**
     * test action, for sitemap configuration
     *
     * Sitemap action
     */
    public function sitemapAction(): void
    {
        $this->view->assign('entries', $this->entryRepository->findAll());
    }
}
