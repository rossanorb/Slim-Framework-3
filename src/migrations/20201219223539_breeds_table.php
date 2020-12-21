<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BreedsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $breeds = $this->table('breeds', ['id' => false, 'primary_key' => 'breed_id']);
        $breeds->addColumn('breed_id', 'biginteger', ['identity' => true]);
        $breeds->addColumn('id','string', ['limit' => 100])->addIndex(['id']);

        $breeds->addColumn('name', 'string', ['limit' => 100])->addIndex(['name']);
        $breeds->addColumn('adaptability', 'integer', ['null' => true]);
        $breeds->addColumn('affection_level', 'integer', ['null' => true] );
        $breeds->addColumn('alt_names', 'text', ['null' => true]);
        // $breeds->addColumn('cfa_url', 'text');
        $breeds->addColumn('child_friendly', 'integer', ['null' => true]);
        $breeds->addColumn('country_code', 'string', ['limit' => 2, 'null' => true]);
        $breeds->addColumn('country_codes', 'string', ['limit' => 2, 'null' => true]);
        $breeds->addColumn('description', 'text', ['null' => true]);
        $breeds->addColumn('dog_friendly', 'integer', ['null' => true]);
        $breeds->addColumn('energy_level', 'integer', ['null' => true]);
        $breeds->addColumn('experimental', 'integer', ['null' => true]);
        $breeds->addColumn('grooming', 'integer', ['null' => true]);
        $breeds->addColumn('hairless', 'integer', ['null' => true]);
        $breeds->addColumn('health_issues', 'integer', ['null' => true]);
        $breeds->addColumn('hypoallergenic', 'integer', ['null' => true]);
        // $breeds->addColumn('image_height', 'integer');
        // $breeds->addColumn('image_id', 'string', ['limit' => 100]);
        // $breeds->addColumn('image_url', 'text');
        // $breeds->addColumn('image_width', 'integer');
        $breeds->addColumn('indoor', 'integer', ['null' => true]);
        $breeds->addColumn('intelligence', 'integer', ['null' => true]);
        $breeds->addColumn('lap', 'integer', ['null' => true]);
        $breeds->addColumn('life_span', 'string',['limit' => 50, 'null' => true]);
        $breeds->addColumn('natural', 'integer', ['null' => true]);
        $breeds->addColumn('origin', 'string', ['limit' => 100, 'null' => true ]);
        $breeds->addColumn('rare', 'integer', ['null' => true]);
        $breeds->addColumn('reference_image_id', 'string', ['limit' => 100, 'null' => true ]);
        $breeds->addColumn('rex', 'integer', ['null' => true]);
        $breeds->addColumn('shedding_level', 'integer', ['null' => true]);
        $breeds->addColumn('short_legs', 'integer', ['null' => true]);
        $breeds->addColumn('social_needs', 'integer', ['null' => true]);
        $breeds->addColumn('stranger_friendly', 'integer', ['null' => true]);
        $breeds->addColumn('suppressed_tail', 'integer', ['null' => true]);
        $breeds->addColumn('temperament', 'text', ['null' => true]);
        // $breeds->addColumn('vcahospitals_url', 'text');
        // $breeds->addColumn('vetstreet_url', 'text');
        $breeds->addColumn('vocalisation', 'integer', ['null' => true]);
        $breeds->addColumn('weight_imperial', 'string', ['limit'=> 10, 'null' => true]);
        $breeds->addColumn('weight_metric', 'string', ['limit'=> 10, 'null' => true]);
        $breeds->addColumn('wikipedia_url', 'text', ['null' => true]);

        $breeds->addColumn('created_at', 'datetime', ['null' => true]);
        $breeds->addColumn('updated_at', 'datetime', ['null' => true]);
        $breeds->create();
    }
}