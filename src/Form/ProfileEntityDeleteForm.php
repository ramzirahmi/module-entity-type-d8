<?php
namespace Drupal\profile\Form;
use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a profile entity.
 *
 * @ingroup profile
 */


class ProfileEntityDeleteForm extends ContentEntityConfirmFormBase {
 /**
 * {@inheritdoc}
 */
    public function getQuestion() {
        return $this->t('Are you sure you want to delete %name entity ?', array('%name' => $this->entity->label()));
        }
 /**
  * {@inheritdoc}

 *
 * If the delete command is canceled, return to the profile list.
 */

        public function getCancelURL() {
            return new Url('entity.profile.collection');
            }
  /**
   * {@inheritdoc}

  */
            public function getConfirmText() {

                return $this->t('Delete');

                }
  /**
  * {@inheritdoc}
  *
  * Delete the entity and log the event. log() replaces the watchdog.
  */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $entity = $this->getEntity();
        $entity->delete();


        \Drupal::logger('profile')->notice('@type: deleted %title.',

            array(

                '%title' => $this->entity->label(),

            ));
        $form_state->setRedirect('entity.profile.collection');

    }
}