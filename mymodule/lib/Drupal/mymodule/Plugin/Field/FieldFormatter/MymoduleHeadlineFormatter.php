<?php

/**
 * @file
 * Contains \Drupal\mymodule\Plugin\field\formatter\TextDefaultFormatter.
 */

namespace Drupal\mymodule\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'mymodule_headline' formatter.
 *
 * @FieldFormatter(
 *   id = "mymodule_headline",
 *   label = @Translation("Headline"),
 *   field_types = {
 *     "text",
 *     "text_long",
 *   },
 *   edit = {
 *     "editor" = "plain_text"
 *   }
 * )
 */
class MymoduleHeadlineFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'headline_type' => 'H3',
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, array &$form_state) {
    $element['headline_type'] = array(
      '#title' => t('Headline type'),
      '#type' => 'select',
      '#default_value' => $this->getSetting('headline_type'),
      '#options' => array(
        'H1' => 'H1', 'H2' => 'H2', 'H3' => 'H3',
      ),
      '#required' => TRUE,
    );
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();
    $summary[] = t('Type: <strong>@headline_type</strong>', array(
      '@headline_type' => $this->getSetting('headline_type')));

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#markup' => format_string('<!tag>!text</!tag>', array(
          '!tag' => strtolower($this->getSetting('headline_type')),
          '!text' => $item['safe_value'],
        )),
      );
    }

    return $elements;
  }

}
