<?php
namespace Sirius\Support\Traits;

use Sirius\Support\Repository;
use Sirius\Support\Contracts\Repository as RepostoryContract;

/**
 * @internal
 */
trait InteractsWithConfig
{
    /**
     * @var Repository
     */
    protected $repository;

    /**
     * Set the repository.
     *
     * @param Repository|array|null $repository
     */
    protected function setRepository($repository)
    {
        $this->repository = $repository ?$this->ensureRepository($repository) : new Repository();
    }

    /**
     * Get the Repository.
     *
     * @return Repository repository object
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Convert a repository array to a Repository object with the correct fallback.
     *
     * @param array $repository
     *
     * @return Repository
     */
    protected function prepareRepository(array $repository)
    {
        $repository = new Repository($repository);

        return $repository;
    }

  /**
   * Ensure a Repository instance.
   *
   * @param null|array|Repository $repository
   *
   * @return Repository repository instance
   *
   * @throw  LogicException
   */
  protected function ensureRepository( $repository ) {
    if ( $repository === null ) {
      return new Repository();
    }

    if ( $repository instanceof RepostoryContract ) {
      return $repository;
    }

    if ( is_array( $repository ) ) {
      return new Repository( $repository );
    }

    throw new \LogicException( 'A repository should either be an array or a Flysystem\Repository object.' );
  }
}
