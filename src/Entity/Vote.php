<?php

/**
 * @file
 * Contains \Drupal\votingapi\Entity\Vote.
 */

namespace Drupal\votingapi\Entity;

use Drupal\Core\Entity\Entity;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\votingapi\VoteInterface;

/**
 * Defines the vote entity class.
 *
 * @EntityType(
 *   id = "vote",
 *   label = @Translation("Vote"),
 *   controllers = {
 *     "storage" = "Drupal\votingapi\VoteStorage"
 *   },
 *   static_cache = FALSE,
 *   render_cache = FALSE,
 *   base_table = "votingapi_vote",
 *   translatable = FALSE,
 *   entity_keys = {
 *     "id" = "vote_id",
 *     "label" = "vote_id",
 *   },
 * )
 */
class Vote extends Entity implements VoteInterface {

  public $vote_id     = NULL;
  public $entity_type = 'node';
  public $entity_id   = NULL;
  public $value_type  = 'percent';
  public $value       = NULL;
  public $tag         = 'vote';
  public $uid         = NULL; // defaults to current user
  public $vote_source = NULL; // defaults to current IP
  public $timestamp   = REQUEST_TIME;

  /**
   * {@inheritdoc}
   */
  public function postCreate(EntityStorageInterface $storage) {
    $this->uid         = isset($this->uid) ? $this->uid : \Drupal::currentUser()->id();
    $this->vote_source = isset($this->vote_source) ? $this->vote_source : \Drupal::request()->getClientIp();
  }

}
