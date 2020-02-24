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

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Entry
 *
 * @package    Tollwerk\TwGlossary
 * @subpackage Tollwerk\TwGlossary\Domain\Model
 */
class Entry extends AbstractEntity implements EntryInterface
{
    /**
     * title
     * 
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $slug = '';

    /**
     * description
     * 
     * @var string
     */
    protected $description = '';

    /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;

    /**
     * similarEntries
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Tollwerk\TwGlossary\Domain\Model\Entry>
     */
    protected $similarEntries;

    /**
     * firstCharacter
     * 
     * @var string
     */
    protected $firstCharacter = '';

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage(): ?\TYPO3\CMS\Extbase\Domain\Model\FileReference
    {
        return $this->image;
    }

    /**
     * Sets the image
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image): void
    {
        $this->image = $image;
    }

    /**
     * Returns the similarEntries
     * 
     * @return ObjectStorage<\Tollwerk\TwGlossary\Domain\Model\Entry> $similarEntries
     */
    public function getSimilarEntries(): ObjectStorage
    {
        return $this->similarEntries;
    }

    /**
     * Sets the similarEntries
     * 
     * @param ObjectStorage<\Tollwerk\TwGlossary\Domain\Model\Entry> $similarEntries
     * @return void
     */
    public function setSimilarEntries(Entry $similarEntries): void
    {
        $this->similarEntries = $similarEntries;
    }

    /**
     * Returns the firstCharacter
     * 
     * @return string $firstCharacter
     */
    public function getFirstCharacter(): string
    {
        return $this->firstCharacter;
    }

    /**
     * Sets the firstCharacter
     * 
     * @param string $firstCharacter
     * @return void
     */
    public function setFirstCharacter(string $firstCharacter): void
    {
        $this->firstCharacter = $firstCharacter;
    }
}
