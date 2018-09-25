<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TContent Entity
 *
 * @property int $id
 * @property string $name
 * @property string $name_kana
 * @property string $age
 * @property bool $gender
 * @property string $tel
 * @property string $zip
 * @property string $address
 * @property string $email
 * @property string $domain
 * @property string $param
 * @property string $product_name
 * @property string $detail
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 */
class TContent extends Entity
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
        'name_kana' => true,
        'age' => true,
        'gender' => true,
        'tel' => true,
        'zip' => true,
        'address' => true,
        'email' => true,
        'domain' => true,
        'param' => true,
        'product_name' => true,
        'number1' => true,
        'number2' => true,
        'number3' => true,
        'detail1' => true,
        'detail2' => true,
        'detail3' => true,
        'detail4' => true,
        'detail5' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true
    ];
}
