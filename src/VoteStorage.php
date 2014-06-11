<?php

/**
 * @file
 * Contains \Drupal\votingapi\VoteStorage.
 */

namespace Drupal\votingapi;

use Drupal\Core\Entity\EntityDatabaseStorage;

/**
 * Storage class for vote entities.
 *
 * This extends the \Drupal\entity\EntityDatabaseStorage class, adding
 * required special handling for vote entities.
 */
class VoteStorage extends EntityDatabaseStorage implements VoteStorageInterface {

}
