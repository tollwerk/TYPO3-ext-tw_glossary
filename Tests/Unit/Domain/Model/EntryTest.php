<?php
namespace Tollwerk\TwGlossary\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Jolanta Dworczyk <jolanta@tollwerk.de>
 */
class EntryTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Tollwerk\TwGlossary\Domain\Model\Entry
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Tollwerk\TwGlossary\Domain\Model\Entry();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForIntSetsImage()
    {
        $this->subject->setImage(12);

        self::assertAttributeEquals(
            12,
            'image',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSimilarEntriesReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSimilarEntries()
        );
    }

    /**
     * @test
     */
    public function setSimilarEntriesForStringSetsSimilarEntries()
    {
        $this->subject->setSimilarEntries('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'similarEntries',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFirstCharacterReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFirstCharacter()
        );
    }

    /**
     * @test
     */
    public function setFirstCharacterForStringSetsFirstCharacter()
    {
        $this->subject->setFirstCharacter('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'firstCharacter',
            $this->subject
        );
    }
}
