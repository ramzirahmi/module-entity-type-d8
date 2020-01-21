<?php

namespace Drupal\profile\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the user entity class.
 *
 *
 * @ContentEntityType(
 *   id = "profile",
 *   label = @Translation("Profile"),
 *   handlers = {
 *     "list_builder" = "Drupal\profile\ProfileListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *     "form" = {
 *       "default" = "Drupal\profile\Form\ProfileEntityForm",
 *       "add" = "Drupal\profile\Form\ProfileEntityForm",
 *       "edit" = "Drupal\profile\Form\ProfileEntityForm",
 *       "delete" = "Drupal\profile\Form\ProfileEntityDeleteForm",
 *     },
 *   },
 *   admin_permission = "administer",
 *   base_table = "profile",
 *   data_table = "profile_field_data",
 *   translatable = TRUE,
 *   entity_keys = {
 *     "id" = "profile_id",
 *     "label" = "last_name",
 *     "langcode" = "langcode",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/profile/add",
 *     "canonical" = "/profile/{profile}",
 *     "edit-form" = "/profile/{profile}/edit",
 *     "delete-form" = "/admin/profile/{profile}/delete",
 *     "collection" = "/admin/profile",
 *   },
 * )
 */
/*
    Creation of the Profile entity class
*/
class Profile extends ContentEntityBase implements ProfileInterface {

    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields['profile_id'] = BaseFieldDefinition::create('integer')
            ->setLabel('Profile ID')
            ->setReadOnly(TRUE)
            ->setSetting('unsigned', TRUE);

        $fields['langcode'] = BaseFieldDefinition::create('language')
            ->setLabel('Language code');

        $fields['uuid'] = BaseFieldDefinition::create('uuid')
            ->setLabel('UUID')
            ->setReadOnly(TRUE);
        // Field Gender

        $fields['gender'] = BaseFieldDefinition::create('list_string')
            ->setLabel(t('Gender'))
            ->setDescription(t('The gender of the Profile entity.'))
            ->setSettings(array(
                'allowed_values' => array(
                    'female' => 'female',
                    'male' => 'male',
                ),
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -4,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'options_select',
                'weight' => -4,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        // Field Firsnt_name
        $fields['last_name'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Last Name'))
            ->setDescription(t('The last name of the Profile entity.'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 255,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        // Field First name
        $fields['first_name'] = BaseFieldDefinition::create('string')
            ->setLabel(t('First Name'))
            ->setDescription(t('The first name of the Profile entity.'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 255,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        // Field Birth Date
        $fields['birth_date'] = BaseFieldDefinition::create('datetime')
            ->setLabel(t('Birth Date'))
            ->setDescription(t('The Birth DAte of the Profile entity.'))
            ->setSetting('datetime_type','date')
            ->setRequired(TRUE)
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        // Field Birth Date
        $fields['email'] = BaseFieldDefinition::create('email')
            ->setLabel(t('Email'))
            ->setDescription(t('Your email.'))
            ->setRequired(TRUE)
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        // Entity Created
        $fields['created'] = BaseFieldDefinition::create('created')
            ->setLabel(t('Created'))
            ->setDescription(t('The time that the entity was created.'));
        //Entity Changed
        $fields['changed'] = BaseFieldDefinition::create('changed')
            ->setLabel(t('Changed'))
            ->setDescription(t('The time that the entity was last edited.'));
        return   $fields;

    }
}