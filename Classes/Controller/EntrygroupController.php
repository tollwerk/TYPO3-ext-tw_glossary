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


use Tollwerk\TwGlossary\Domain\Repository\EntryRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class EntrygroupController extends ActionController
{
    /**
     * Entry repository
     *
     * @var EntryRepository
     */
    protected $entryRepository;

    /**
     * Inject the entry repository
     *
     * @param entryRepository $entryRepository
     */
    public function injectEntryRepository(EntryRepository $entryRepository): void
    {
        $this->entryRepository = $entryRepository;
    }








}
