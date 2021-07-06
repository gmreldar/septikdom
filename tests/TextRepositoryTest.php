<?php

use App\Models\Text;
use App\Repositories\TextRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TextRepositoryTest extends TestCase
{
    use MakeTextTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TextRepository
     */
    protected $textRepo;

    public function setUp()
    {
        parent::setUp();
        $this->textRepo = App::make(TextRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateText()
    {
        $text = $this->fakeTextData();
        $createdText = $this->textRepo->create($text);
        $createdText = $createdText->toArray();
        $this->assertArrayHasKey('id', $createdText);
        $this->assertNotNull($createdText['id'], 'Created Text must have id specified');
        $this->assertNotNull(Text::find($createdText['id']), 'Text with given id must be in DB');
        $this->assertModelData($text, $createdText);
    }

    /**
     * @test read
     */
    public function testReadText()
    {
        $text = $this->makeText();
        $dbText = $this->textRepo->find($text->id);
        $dbText = $dbText->toArray();
        $this->assertModelData($text->toArray(), $dbText);
    }

    /**
     * @test update
     */
    public function testUpdateText()
    {
        $text = $this->makeText();
        $fakeText = $this->fakeTextData();
        $updatedText = $this->textRepo->update($fakeText, $text->id);
        $this->assertModelData($fakeText, $updatedText->toArray());
        $dbText = $this->textRepo->find($text->id);
        $this->assertModelData($fakeText, $dbText->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteText()
    {
        $text = $this->makeText();
        $resp = $this->textRepo->delete($text->id);
        $this->assertTrue($resp);
        $this->assertNull(Text::find($text->id), 'Text should not exist in DB');
    }
}
