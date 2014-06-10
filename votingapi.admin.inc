<?php

/**
 * @file
 * Configuration forms and helper functions for VotingAPI module.
 */

/**
 * Developer tool to generate dummy votes.
 */
function votingapi_generate_votes_form() {
  $form['node_types'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Which node types should receive votes?'),
    '#options' => node_type_get_names(),
    '#default_value' => array_keys(node_type_get_names()),
  );

  $form['vote_type'] = array(
    '#type' => 'select',
    '#title' => t('What type of votes should be generated?'),
    '#options' => array(
      'percent' => t('Percentage (Fivestar style)'),
      'points' => t('Point-based (Digg style)'),
    ),
    '#default_value' => 'percent',
  );

  $form['kill_votes'] = array(
    '#type' => 'checkbox',
    '#title' => t('Delete existing votes before generating new ones.'),
    '#default_value' => FALSE,
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Do it!'),
  );
  return $form;
}

/**
 * Submit handler for votingapi_generate_votes_form.
 */
function votingapi_generate_votes_form_submit($form, &$form_state) {
  $options = array(
    'types' => $form_state['values']['node_types'],
    'kill' => $form_state['values']['kill_votes'],
  );
  require_once(drupal_get_path('module', 'votingapi') . '/votingapi.drush.inc');
  votingapi_generate_votes('node', $form_state['values']['vote_type'], $options);
}
