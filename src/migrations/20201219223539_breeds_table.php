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
        $breeds->addColumn('id','string', ['limit' => 100]);

        $breeds->addColumn('name', 'string', ['limit' => 100])->addIndex(['name']);
        $breeds->addColumn('adaptability', 'integer');
        $breeds->addColumn('affection_level', 'integer');
        $breeds->addColumn('alt_names', 'text');
        $breeds->addColumn('cfa_url', 'text');
        $breeds->addColumn('child_friendly', 'integer');
        $breeds->addColumn('country_code', 'string', ['limit' => 2]);
        $breeds->addColumn('country_codes', 'string', ['limit' => 2]);
        $breeds->addColumn('description', 'text');
        $breeds->addColumn('dog_friendly', 'integer');
        $breeds->addColumn('energy_level', 'integer');
        $breeds->addColumn('experimental', 'integer');
        $breeds->addColumn('grooming', 'integer');
        $breeds->addColumn('hairless', 'integer');
        $breeds->addColumn('health_issues', 'integer');
        $breeds->addColumn('hypoallergenic', 'integer');
        $breeds->addColumn('image_height', 'integer');
        $breeds->addColumn('image_id', 'string', ['limit' => 100]);
        $breeds->addColumn('image_url', 'text');
        $breeds->addColumn('image_width', 'integer');
        $breeds->addColumn('indoor', 'integer');
        $breeds->addColumn('intelligence', 'integer');
        $breeds->addColumn('lap', 'integer');
        $breeds->addColumn('life_span', 'string',['limit' => 50]);
        $breeds->addColumn('natural', 'integer');
        $breeds->addColumn('origin', 'string', ['limit' => 100]);
        $breeds->addColumn('rare', 'integer');
        $breeds->addColumn('reference_image_id', 'string', ['limit' => 100]);
        $breeds->addColumn('rex', 'integer');
        $breeds->addColumn('shedding_level', 'integer');
        $breeds->addColumn('short_legs', 'integer');
        $breeds->addColumn('social_needs', 'integer');
        $breeds->addColumn('stranger_friendly', 'integer');
        $breeds->addColumn('suppressed_tail', 'integer');
        $breeds->addColumn('temperament', 'text');
        $breeds->addColumn('vcahospitals_url', 'text');
        $breeds->addColumn('vetstreet_url', 'text');
        $breeds->addColumn('vocalisation', 'integer');
        $breeds->addColumn('weight_imperial', 'integer');
        $breeds->addColumn('weight_metric', 'integer');
        $breeds->addColumn('wikipedia_url', 'text');

        $breeds->addColumn('created_at', 'datetime');
        $breeds->addColumn('updated_at', 'datetime');
        $breeds->create();
    }
}