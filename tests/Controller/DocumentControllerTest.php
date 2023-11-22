<?php

namespace App\Test\Controller;

use App\Entity\Document;
use App\Repository\DocumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DocumentControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private DocumentRepository $repository;
    private string $path = '/document/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Document::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Document index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'document[title]' => 'Testing',
            'document[description]' => 'Testing',
            'document[releasedate]' => 'Testing',
            'document[photo]' => 'Testing',
            'document[support]' => 'Testing',
            'document[genre]' => 'Testing',
            'document[consultation]' => 'Testing',
            'document[author]' => 'Testing',
            'document[available]' => 'Testing',
        ]);

        self::assertResponseRedirects('/document/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Document();
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setReleasedate('My Title');
        $fixture->setPhoto('My Title');
        $fixture->setSupport('My Title');
        $fixture->setGenre('My Title');
        $fixture->setConsultation('My Title');
        $fixture->setAuthor('My Title');
        $fixture->setAvailable('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Document');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Document();
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setReleasedate('My Title');
        $fixture->setPhoto('My Title');
        $fixture->setSupport('My Title');
        $fixture->setGenre('My Title');
        $fixture->setConsultation('My Title');
        $fixture->setAuthor('My Title');
        $fixture->setAvailable('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'document[title]' => 'Something New',
            'document[description]' => 'Something New',
            'document[releasedate]' => 'Something New',
            'document[photo]' => 'Something New',
            'document[support]' => 'Something New',
            'document[genre]' => 'Something New',
            'document[consultation]' => 'Something New',
            'document[author]' => 'Something New',
            'document[available]' => 'Something New',
        ]);

        self::assertResponseRedirects('/document/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getReleasedate());
        self::assertSame('Something New', $fixture[0]->getPhoto());
        self::assertSame('Something New', $fixture[0]->getSupport());
        self::assertSame('Something New', $fixture[0]->getGenre());
        self::assertSame('Something New', $fixture[0]->getConsultation());
        self::assertSame('Something New', $fixture[0]->getAuthor());
        self::assertSame('Something New', $fixture[0]->getAvailable());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Document();
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setReleasedate('My Title');
        $fixture->setPhoto('My Title');
        $fixture->setSupport('My Title');
        $fixture->setGenre('My Title');
        $fixture->setConsultation('My Title');
        $fixture->setAuthor('My Title');
        $fixture->setAvailable('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/document/');
    }
}
