<?php

    namespace Models;

    use Core\Model;

    /**
     * @property int $id ID відгуку
     * @property int $userId Автор відгуку
     * @property string $comment Текст відгуку
     * @property int $rating Рейтинг відгуку
     * @property string $date Дата створення відгуку
     */

    class Reviews extends Model
    {
        public static $table_name = 'reviews';

        public static function find_by_product_id($product_id)
        {
            return self::find_by_condition(['product_id' => $product_id]);
        }
    }

?>