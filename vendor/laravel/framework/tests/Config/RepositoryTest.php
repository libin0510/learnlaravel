<?php

namespace Illuminate\Tests\Config;

use PHPUnit\Framework\TestCase;
use Illuminate\Config\Repository;

class RepositoryTest extends TestCase
{
    /**
     * @var \Illuminate\Config\Repository
     */
    protected $repository;

    /**
     * @var array
     */
    protected $config;

    public function setUp()
    {
        $this->repository = new Repository($this->config = [
            'foo' => 'bar',
            'bar' => 'baz',
            'null' => null,
            'associate' => [
                'x' => 'xxx',
                'y' => 'yyy',
            ],
            'array' => [
                'aaa',
                'zzz',
            ],
        ]);

        parent::setUp();
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(Repository::class, $this->repository);
    }

    public function testHasIsTrue()
    {
        $this->assertTrue($this->repository->has('foo'));
    }

    public function testHasIsFalse()
    {
        $this->assertFalse($this->repository->has('not-exist'));
    }

    public function testGet()
    {
        $this->assertSame('bar', $this->repository->get('foo'));
    }

    public function testGetWithDefault()
    {
        $this->assertSame('default', $this->repository->get('not-exist', 'default'));
    }

    public function testSet()
    {
        $this->repository->set('key', 'value');
        $this->assertSame('value', $this->repository->get('key'));
    }

    public function testSetArray()
    {
        $this->repository->set([
            'key1' => 'value1',
            'key2' => 'value2',
        ]);
        $this->assertSame('value1', $this->repository->get('key1'));
        $this->assertSame('value2', $this->repository->get('key2'));
    }

    public function testPrepend()
    {
        $this->repository->prepend('array', 'xxx');
        $this->assertSame('xxx', $this->repository->get('array.0'));
    }

    public function testPush()
    {
        $this->repository->push('array', 'xxx');
        $this->assertSame('xxx', $this->repository->get('array.2'));
    }
}
