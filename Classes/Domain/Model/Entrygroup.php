<?php
/**
 * Ziereis Relaunch
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwGlossary
 * @subpackage Tollwerk\TwGlossary\Domain\Model
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

namespace Tollwerk\TwGlossary\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Entry
 *
 * @package    Tollwerk\TwGlossary
 * @subpackage Tollwerk\TwGlossary\Domain\Model
 */
class Entrygroup extends AbstractEntity
{

    /**
     * Character
     *
     * @var string
     */
    protected $character = '';

    /**
     * Last modification timestamp
     *
     * @var int
     */
    protected $tstamp = 0;

    /**
     * Returns the character
     *
     * @return string $Character
     */
    public function getCharacter(): string
    {
        return $this->character;
    }

    /**
     * Sets the character
     *
     * @param string $character
     * @return void
     */
    public function setCharacter(string $character): void
    {
        $this->character = $character;
    }

    /**
     * Return the last modification timestamp
     *
     * @return int Last modification timestamp
     */
    public function getTstamp(): int
    {
        return $this->tstamp;
    }

    /**
     * Set the last  modification timestamp
     *
     * @param int $tstamp Last modification timestamp
     */
    public function setTstamp(int $tstamp): void
    {
        $this->tstamp = $tstamp;
    }
}
