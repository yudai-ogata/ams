<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * TUser Entity
 *
 * @property int $id
 * @property string $name
 * @property string $pw
 * @property bool $admin
 * @property int $t_domain_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 *
 * @property \App\Model\Entity\TDomain $t_domain
 */
class TUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'password' => true,
        'admin' => true,
        't_domain_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        't_domain' => true
    ];
  
    protected $_hidden = [
        'password'
    ];
  
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password, 'sha256');
    }
  
    protected function _setLoginAuth($password)
    {
        return (new DefaultPasswordHasher)->hash($password, 'sha256');
    }
}
