<?php
namespace Tollwerk\TwGlossary\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Jolanta Dworczyk <jolanta@tollwerk.de>
 */
class EntryControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Tollwerk\TwGlossary\Controller\EntryController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Tollwerk\TwGlossary\Controller\EntryController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllEntriesFromRepositoryAndAssignsThemToView()
    {

        $allEntries = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $entryRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $entryRepository->expects(self::once())->method('findAll')->will(self::returnValue($allEntries));
        $this->inject($this->subject, 'entryRepository', $entryRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('entries', $allEntries);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenEntryToView()
    {
        $entry = new \Tollwerk\TwGlossary\Domain\Model\Entry();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('entry', $entry);

        $this->subject->showAction($entry);
    }
}
